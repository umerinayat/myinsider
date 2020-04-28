<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Contact;
use App\Address;
use App\Company;
use App\Client;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string','max:255'],
            'last_name' => ['required', 'string','max:255'],
            'title' => ['required'],
            'mobile_number' => ['required'],
            'company_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {  
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        // Need to add Client Data Validator

        $clientContact = Contact::create([
            'mobile_number' => $data['mobile_number']
        ]);
        $companyContact = Contact::create([]);

        $clientAddress = Address::create([]);
        $companyAddress = Address::create([]);

        $company = Company::create([
            'company_name' => $data['company_name'],
            'contact_id' => $companyContact->id,
            'address_id' => $companyAddress->id
        ]);
        
         
        // add client after data validation pass
        $client = Client::create([
            'user_id' => $user->id,
            'title' => $data['title'],
            'company_id' => $company->id,
            'contact_id' => $clientContact->id,
            'address_id' => $clientAddress->id,
        ]);

        return $user;
    }
}
