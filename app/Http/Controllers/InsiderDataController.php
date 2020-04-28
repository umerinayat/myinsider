<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\InsiderCreated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\InsidersToken;

use App\User;
use App\Contact;
use App\Address;
use App\Company;
use App\Client;
use App\Insider;
use App\SCountry;
use Response;

use PDF;

class InsiderDataController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         
    }

    public function showInfo($token)
    {
        $data = [];

        
        $tokens = InsidersToken::where('token', $token)->get();

        if ( count ($tokens) > 0 )
        {
            $token = $tokens[0];

            
            $insider = Insider::where('id', $token->insider_id)->get()->first();
            $user = User::where('id', $insider->user_id)->get()[0];
    
            $insider->user = $user;
            $insider->contact = Contact::where('id', $insider->contact_id)->get()[0];
            $insider->address = Address::where('id', $insider->address_id)->get()[0];
            $insider->company = Company::where('id', $insider->company_id)->get()[0];
    
            $insider->company->contact = Contact::where('id', $insider->company->contact_id)->get()[0];
            $insider->company->address = Address::where('id', $insider->company->address_id)->get()[0];
            
            $insider->token = $token;

            $data['insider'] = $insider;
    
            return view('insiders.insiderData.show', $data);

        } 
        else
        {
            return redirect('/');
        }

       
    }

    public function editInfo($token)
    {
        $tokens = InsidersToken::where('token', $token)->get();

       
        if ( count ($tokens) > 0 ) 
        {
            $token = $tokens[0];

            $data = [];
            $data['countries'] = SCountry::$countries;

            $insider = Insider::where('id', $token->insider_id)->get()->first();
            $user = User::where('id', $insider->user_id)->get()[0];

            $insider->user = $user;
            $insider->contact = Contact::where('id', $insider->contact_id)->get()[0];
            $insider->address = Address::where('id', $insider->address_id)->get()[0];
            $insider->company = Company::where('id', $insider->company_id)->get()[0];

            $insider->company->contact = Contact::where('id', $insider->company->contact_id)->get()[0];
            $insider->company->address = Address::where('id', $insider->company->address_id)->get()[0];
            
            $insider->token = $token;
            
            $data['insider'] = $insider;

            return view('insiders.insiderData.edit', $data);
        } 
        else 
        {
            return redirect('/');
        }
    }

    public function updateInfo(Request $request, $token)
    {

        $tokens = InsidersToken::where('token', $token)->get();

        if ( count ($tokens) > 0 )
        {
            $token = $tokens[0];

            $insider = Insider::where('id', $token->insider_id)->get()->first();
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
    
            // Need to add Client Data Validator

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
                'company_name' => $request->input('company_name', NULL)
            ]);

            if ($request['date_of_birth'] !== null) {
                $birthDate = strtotime( $request['date_of_birth'] );
                $mysqlBirthDate = date( 'Y-m-d', $birthDate );
            } else {
                $mysqlBirthDate = NULL;
            }
            
                
            // add client after data validation pass
            $insider->update([
                'title' => $request['title'],
                'date_of_birth' => $mysqlBirthDate,
                'national_id_number' => $request->input('national_id_number', NULL),
                'notes' => $request->input('notes', NULL),
                'language' => $request['language'],
            ]);

            return redirect()->action('InsiderDataController@showInfo', [
                'token' => $token->token      
            ]); 

            // end if
        }
        else 
        {
            return redirect('/');
        }
     
        
        

    }
}
