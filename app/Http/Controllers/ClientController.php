<?php
namespace App\Http\Controllers;

use App\User;
use App\Contact;
use App\Address;
use App\Company;
use App\Client;
use App\SCountry;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClientAccountActivated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{

    // ------ CONSTRUCTOR ------
    public function __construct(Client $client)
    {
        $this->middleware('auth');
        $this->middleware('verified');
        //$this->middleware('can:is_active');
        $this->middleware('can:is_admin');
        $this->client = $client;

       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        $clients = $this->client->orderBy('id', 'DESC')->get();
        
        $clientsArr = [];
        foreach($clients as $client) 
        {   
            $client->user = User::where('id', $client->user_id)->get()[0];
            $client->contact = Contact::where('id', $client->contact_id)->get()[0];
            $client->address = Address::where('id', $client->address_id)->get()[0];
            $client->company = Company::where('id', $client->company_id)->get()[0];
            
            array_push($clientsArr, $client);
        }

        $data['clients'] = $clientsArr;

        return view('clients.index', $data);
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

        return view('clients.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\StoreClient $request)
    {

        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'is_active' => $request->input('is_active', false) === 'on' ? true : false
        ]);

        $clientContact = Contact::create([
            'telephone_number' => $request->input('telephone_number', NULL),
            'mobile_number' => $request->input('mobile_number', NULL),
            'fax_number' => $request->input('fax_number', NULL),
        ]);

        $companyContact = Contact::create([
            'telephone_number' => $request->input('c_telephone_number', NULL),
            'mobile_number' => $request->input('c_mobile_number', NULL),
            'fax_number' => $request->input('c_fax_number', NULL),
            
        ]);

        $clientAddress = Address::create([
            'street_address' => $request->input('street_address', NULL),
            'additional_address' => $request->input('additional_address', NULL),
            'city' => $request->input('city', NULL),
         
            'zip_code' => $request->input('zip_code', NULL),
            'country' => $request->input('country', NULL),
        ]);

        $companyAddress = Address::create([
            'street_address' => $request->input('c_street_address', NULL),
            'additional_address' => $request->input('c_additional_address', NULL),
            'city' => $request->input('c_city', NULL),
           
            'zip_code' => $request->input('c_zip_code', NULL),
            'country' => $request->input('c_country', NULL),
        ]);

        $company = Company::create([
            'company_name' => $request->input('company_name', NULL),
            'contact_id' => $companyContact->id,
            'address_id' => $companyAddress->id
        ]);
        
            
        $client = Client::create([
            'user_id' => $user->id,
            'title' => $request['title'],
            'company_id' => $company->id,
            'contact_id' => $clientContact->id,
            'address_id' => $clientAddress->id,
        ]);

        return redirect()->action('ClientController@show', ['client' => $client->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $data = [];
        $client->user = User::where('id', $client->user_id)->get()[0];
        $client->contact = Contact::where('id', $client->contact_id)->get()[0];
        $client->address = Address::where('id', $client->address_id)->get()[0];
        $client->company = Company::where('id', $client->company_id)->get()[0];
        
        $client->company->contact = Contact::where('id', $client->company->contact_id)->get()[0];
        $client->company->address = Address::where('id', $client->company->address_id)->get()[0];

        $data['client'] = $client;
        // updated resourse feedback script
        $data['script'] =  
        $this->scripts = "<script> 
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: `$client->title. $client->user->first_name $client->user->last_name Data Updated Successfully`,
                showConfirmButton: false,
                timer: 1500
                })
                </script>
            "; 

        return view('clients.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $data = [];

    
        $data['countries'] = SCountry::$countries;

        $client->user = User::where('id', $client->user_id)->get()[0];
        $client->contact = Contact::where('id', $client->contact_id)->get()[0];
        $client->address = Address::where('id', $client->address_id)->get()[0];
        $client->company = Company::where('id', $client->company_id)->get()[0];
        
        $client->company->contact = Contact::where('id', $client->company->contact_id)->get()[0];
        $client->company->address = Address::where('id', $client->company->address_id)->get()[0];

        $data['client'] = $client;

        return view('clients.edit', $data);

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {

        $data = [];

        $user = User::where('id', $client->user_id)->get()->first();

        $this->validate(
            $request,
            [
                'email' => 'required|string|email|max:255|unique:users,email,'.$user->id.',id',

                'title' => 'required',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',

            ]
        );

        $clientContact = Contact::where('id', $client->contact_id)->first();
        $clientAddress = Address::where('id', $client->address_id)->first();

        $clientCompany = Company::where('id', $client->company_id)->first();
        $clientCompanyContact = Contact::where('id', $clientCompany->contact_id)->first();
        $clientCompanyAdress = Address::where('id', $clientCompany->address_id)->first();

        $isBeforeActive =  $user->is_active;

        $user->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'is_active' => $request->input('is_active', false) === 'on' ? true : false
        ]);



        $clientContact->update([
            'telephone_number' => $request->input('telephone_number', NULL),
            'mobile_number' => $request->input('mobile_number', NULL),
            'fax_number' => $request->input('fax_number', NULL),
            
        ]);

        $clientCompanyContact->update([
            'telephone_number' => $request->input('c_telephone_number', NULL),
            'mobile_number' => $request->input('c_mobile_number', NULL),
            'fax_number' => $request->input('c_fax_number', NULL),
            
        ]);

        $clientAddress->update([
            'street_address' => $request->input('street_address', NULL),
            'additional_address' => $request->input('additional_address', NULL),
            'city' => $request->input('city', NULL),
            'zip_code' => $request->input('zip_code', NULL),
            'country' => $request->input('country', NULL),
        ]);

        $clientCompanyAdress->update([
            'street_address' => $request->input('c_street_address', NULL),
            'additional_address' => $request->input('c_additional_address', NULL),
            'city' => $request->input('c_city', NULL),
           
            'zip_code' => $request->input('c_zip_code', NULL),
            'country' => $request->input('c_country', NULL),
        ]);

        $clientCompany->update([
            'company_name' => $request->input('company_name', NULL),
        ]);
        
        $client->update([
            'title' => $request['title'],
        ]);
        
        if(!$isBeforeActive) 
        {
          // sending client activated email
          Mail::to($user->email)->send(new ClientAccountActivated($client->title .'. '. $user->first_name .' '. $user->last_name ));
        }

        return redirect()->action('ClientController@show', ['client' => $client->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $user = User::where('id', $client->user_id)->get()->first();

        $clientContact = Contact::where('id', $client->contact_id)->first();
        $clientAddress = Address::where('id', $client->address_id)->first();

        $clientCompany = Company::where('id', $client->company_id)->first();
        $clientCompanyContact = Contact::where('id', $clientCompany->contact_id)->first();
        $clientCompanyAdress = Address::where('id', $clientCompany->address_id)->first();

        $client->delete();
        $clientContact->delete();
        $clientAddress->delete();
        $clientCompany->delete();
        $clientCompanyContact->delete();
        $clientCompanyAdress->delete();
        $user->delete();

        return redirect('/clients');
    }


}
