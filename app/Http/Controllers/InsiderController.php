<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\InsiderCreated;
use App\Mail\InsiderInformationPursuant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Contact;
use App\Address;
use App\Company;
use App\Client;
use App\Insider;
use App\SCountry;
use App\InsidersToken;

use Response;

use PDF;


class InsiderController extends Controller
{

    // ------ CONSTRUCTOR ------
    public function __construct(Insider $insider)
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('can:is_active');
        $this->middleware('can:is_clientOrAdmin');
        $this->insider = $insider; 
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->get()->first();
        
        if ($user->user_type == 'admin') {
            $insiders = $this->insider->orderBy('id', 'DESC')->get();
        } else if ($user->user_type == 'client') {
            $insiders = $this->insider->where('client_id', $client->id)->orderBy('id', 'DESC')->get();
        } else {
            $insiders  = [];
        }
        
        $insidersArr = [];
        foreach($insiders as $insider) 
        {   
            $insider->user = User::where('id', $insider->user_id)->get()[0];
            $insider->contact = Contact::where('id', $insider->contact_id)->get()[0];
            $insider->address = Address::where('id', $insider->address_id)->get()[0];
            $insider->company = Company::where('id', $insider->company_id)->get()[0];
            
            array_push($insidersArr, $insider);
        }

        $data['insiders'] = $insidersArr;

        return view('insiders.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];

        $data['countries'] = SCountry::$countries;

        return view('insiders.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\StoreInsider $request)
    {


        // add User after data validation pass
        $password = Str::random(8);
        $password .= '_' . \explode('@', $request['email'])[0];

        // creating insider token

        $iuser = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($password),
            'is_active' => false,
            'user_type' => 'insider'
        ]);

        $insiderContact = Contact::create([
            'telephone_number' => $request->input('telephone_number', NULL),
            'mobile_number' => $request->input('mobile_number', NULL),
            'fax_number' => $request->input('fax_number', NULL),
           
        ]);

        $insiderCompanyContact = Contact::create([
            'telephone_number' => $request->input('c_telephone_number', NULL),
            'mobile_number' => $request->input('c_mobile_number', NULL),
            'fax_number' => $request->input('c_fax_number', NULL),
        ]);

        $insiderAddress = Address::create([
            'street_address' => $request->input('street_address', NULL),
            'additional_address' => $request->input('additional_address', NULL),
            'city' => $request->input('city', NULL),
            
            'zip_code' => $request->input('zip_code', NULL),
            'country' => $request->input('country', NULL),
        ]);

        $insiderCompanyAddress = Address::create([
            'street_address' => $request->input('c_street_address', NULL),
            'additional_address' => $request->input('c_additional_address', NULL),
            'city' => $request->input('c_city', NULL),
           
            'zip_code' => $request->input('c_zip_code', NULL),
            'country' => $request->input('c_country', NULL),
        ]);

        $insiderCompany = Company::create([
            'company_name' => $request->input('company_name', NULL),
            'contact_id' => $insiderCompanyContact->id,
            'address_id' => $insiderCompanyAddress->id
        ]);
        
        // client who adding the insider into the database
        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->get()->first();

        $client->user = $user;
        $client->contact = Contact::where('id', $client->contact_id)->get()[0];
        $client->address = Address::where('id', $client->address_id)->get()[0];
        $client->company = Company::where('id', $client->company_id)->get()[0];
        
        $client->company->contact = Contact::where('id', $client->company->contact_id)->get()[0];
        $client->company->address = Address::where('id', $client->company->address_id)->get()[0];
        
       

        if ($request['date_of_birth'] !== null) {
            $birthDate = strtotime( $request['date_of_birth'] );
            $mysqlBirthDate = date( 'Y-m-d', $birthDate );
        } else {
            $mysqlBirthDate = NULL;
        }

        $insider = Insider::create([
            'client_id' => $client->id,
            'title' => $request['title'],
            'date_of_birth' => $mysqlBirthDate,
            'national_id_number' => $request->input('national_id_number', NULL),
            'notes' => $request->input('notes', NULL),
            'language' => $request['language'],
            'user_id' => $iuser->id,
            'company_id' => $insiderCompany->id,
            'contact_id' => $insiderContact->id,
            'address_id' => $insiderAddress->id,
        ]);

        $insiderToken = InsidersToken::setInsiderToken($client->id, $insider->id , md5(rand(1, 10) . microtime()));

        $insider->company = $insiderCompany;
        $iuser->password = $password;
        $insider->user = $iuser;
        $insider->token = $insiderToken;

        $insiderLang = $insider->language;

        // send email in german
        if ($insiderLang === 'german')
        {

            $email = new \stdClass;
            $email->subject = 'Aufnahme in die Insiderliste';    

            $pdfFileNamesArr = [];

            $pdfFile1 = new \stdClass;
            $pdfFile1->name = $this->pdf($insider, $client, 'emails.insiders.insider-privacy-policy-de');
            $pdfFile1->headers = [
                'mime' => 'application/pdf', // Optional
                'as' => 'Datenschutz-Bestimmungen.pdf', // Optional
            ];

            array_push($pdfFileNamesArr, $pdfFile1);
            // sending email to insider
            sleep(1);
            $pdfFile2 = new \stdClass;
            $pdfFile2->name = $this->pdf($insider, $client, 'emails.insiders.Information-pursuant-pdf-de');
            $pdfFile2->headers = [
                'mime' => 'application/pdf', // Optional
                'as' => 'Aufnahme-in-eine-Insiderliste.pdf', // Optional
            ];
            array_push($pdfFileNamesArr, $pdfFile2);

          
            Mail::to($insider->user->email)->send(new InsiderCreated($email, $insider, $client, $pdfFileNamesArr, 'emails.insiders.insider-created-email-notification-de'));
            
            
        }
        // send email in english 
        else if ($insiderLang === 'english')
        {   
            $email = new \stdClass;
            $email->subject = 'Enrollment into the Insider list';   

            $pdfFileNamesArr = [];

            $pdfFile1 = new \stdClass;
            $pdfFile1->name = $this->pdf($insider, $client, 'emails.insiders.insider-privacy-policy-en');
            $pdfFile1->headers = [
                'mime' => 'application/pdf', // Optional
                'as' => 'privacy-policy.pdf', // Optional
            ];

            array_push($pdfFileNamesArr, $pdfFile1);
            // sending email to insider
            sleep(1);
            $pdfFile2 = new \stdClass;
            $pdfFile2->name = $this->pdf($insider, $client, 'emails.insiders.Information-pursuant-pdf-en');
            $pdfFile2->headers = [
                'mime' => 'application/pdf', // Optional
                'as' => 'information-pursuant.pdf', // Optional
            ];
            array_push($pdfFileNamesArr, $pdfFile2);
            
            Mail::to($insider->user->email)->send(new InsiderCreated($email, $insider, $client, $pdfFileNamesArr, 'emails.insiders.insider-created-email-notification-en'));
            
        }   

        return redirect()->action('InsiderController@show', ['insider' => $insider->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Insider  $insider
     * @return \Illuminate\Http\Response
     */
    public function show(Insider $insider)
    {
        $data = [];

        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->get()->first();
        
        if ($insider->client_id === $client->id || $user->user_type === 'admin') 
        {
            $insider->user = User::where('id', $insider->user_id)->get()[0];
            $insider->contact = Contact::where('id', $insider->contact_id)->get()[0];
            $insider->address = Address::where('id', $insider->address_id)->get()[0];
            $insider->company = Company::where('id', $insider->company_id)->get()[0];

            $insider->company->contact = Contact::where('id', $insider->company->contact_id)->get()[0];
            $insider->company->address = Address::where('id', $insider->company->address_id)->get()[0];
                
            $data['insider'] = $insider;

            return view('insiders.show', $data);
        } else {
            return redirect('/insiders');
        }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Insider  $insider
     * @return \Illuminate\Http\Response
     */
    public function edit(Insider $insider)
    {
        $data = [];
        
        $data['countries'] = SCountry::$countries;

        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->get()->first();

      
        if ($insider->client_id === $client->id || $user->user_type === 'admin') 
        {
            $insider->user = User::where('id', $insider->user_id)->get()[0];
            $insider->contact = Contact::where('id', $insider->contact_id)->get()[0];
            $insider->address = Address::where('id', $insider->address_id)->get()[0];
            $insider->company = Company::where('id', $insider->company_id)->get()[0];

            $insider->company->contact = Contact::where('id', $insider->company->contact_id)->get()[0];
            $insider->company->address = Address::where('id', $insider->company->address_id)->get()[0];
                
            $data['insider'] = $insider;

            return view('insiders.edit', $data);
        } else {
            return redirect('/insiders');
        }

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Insider  $insider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insider $insider)
    {   
       
        // client who adding the insider into the database
        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->get()->first();

        if ($insider->client_id === $client->id || $user->user_type === 'admin') 
        {
            $user = User::where('id', $insider->user_id)->get()[0];


            $this->validate(
                $request,
                [
                'title' => 'required',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'. $user->id .',id',
                'language' => 'required',
            ]);



            $insiderContact = Contact::where('id', $insider->contact_id)->first();
            $insiderAddress = Address::where('id', $insider->address_id)->first();
    
            $insiderCompany = Company::where('id', $insider->company_id)->first();
            $insiderCompanyContact = Contact::where('id', $insiderCompany->contact_id)->first();
            $insiderCompanyAdress = Address::where('id', $insiderCompany->address_id)->first();

            $user->update([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'email' => $request['email'],
                'is_active' => false
            ]);
    
           
            //
            $insiderContact->update([
                'telephone_number' => $request->input('telephone_number', NULL),
                'mobile_number' => $request->input('mobile_number', NULL),
                'fax_number' => $request->input('fax_number', NULL),
                
            ]);

            $insiderCompanyContact->update([
                'telephone_number' => $request->input('c_telephone_number', NULL),
                'mobile_number' => $request->input('c_mobile_number', NULL),
                'fax_number' => $request->input('c_fax_number', NULL),
            ]);

            $insiderAddress->update([
                'street_address' => $request->input('street_address', NULL),
                'additional_address' => $request->input('additional_address', NULL),
                'city' => $request->input('city', NULL),
              
                'zip_code' => $request->input('zip_code', NULL),
                'country' => $request->input('country', NULL),
            ]);

            $insiderCompanyAdress->update([
                'street_address' => $request->input('c_street_address', NULL),
                'additional_address' => $request->input('c_additional_address', NULL),
                'city' => $request->input('c_city', NULL),
             
                'zip_code' => $request->input('c_zip_code', NULL),
                'country' => $request->input('c_country', NULL),
            ]);

            $insiderCompany->update([
                'company_name' => $request->input('company_name', NULL),
            ]);
            
            if ($request['date_of_birth'] !== null) {
                $birthDate = strtotime( $request['date_of_birth'] );
                $mysqlBirthDate = date( 'Y-m-d', $birthDate );
            } else {
                $mysqlBirthDate = NULL;
            }

            $insider->update([
                'title' => $request['title'],
                'date_of_birth' => $mysqlBirthDate,
                'national_id_number' => $request->input('national_id_number', NULL),
                'notes' => $request->input('notes', NULL),
                'language' => $request['language'],
            ]);

            return redirect()->action('InsiderController@show', ['insider' => $insider->id]);
        } else {
            return redirect('/insiders');
        }
        
      
        
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Insider  $insider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insider $insider)
    {
     
        // client who added the insider into the database
        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->get()->first();
     
        if ($insider->client_id === $client->id || $user->user_type === 'admin') 
        {
            $iuser = User::where('id', $insider->user_id)->get()->first();
            $insiderContact = Contact::where('id', $insider->contact_id)->first();
            $insiderAddress = Address::where('id', $insider->address_id)->first();
    
            $insiderCompany = Company::where('id', $insider->company_id)->first();
            $insiderCompanyContact = Contact::where('id', $insiderCompany->contact_id)->first();
            $insiderCompanyAdress = Address::where('id', $insiderCompany->address_id)->first();
            
            $insider->delete();
            $insiderContact->delete();
            $insiderAddress->delete();
            $insiderCompany->delete();
            $insiderCompanyContact->delete();
            $insiderCompanyAdress->delete();
            $iuser->delete();

            return redirect('/insiders');

        } else {
            return redirect('/insiders');
        }
    }


    // make dompdf wrapper
    public function pdf($insider, $client, $pdfTemplate)
    {

        $pdf = PDF::loadView($pdfTemplate, ['insider' => $insider, 'client' => $client]);
        $pdfName = time() . '_' . $insider->id . '.pdf';
        $pdf->save(storage_path($pdfName));

        return $pdfName;
    }


}
