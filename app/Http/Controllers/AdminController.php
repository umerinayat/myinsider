<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Client;
use App\Insider;
use App\Project;
use App\Contact;
use App\Address;
use App\Company;

use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function __construct () 
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('can:is_admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        $data['clientsCount'] = Client::get()->count();
        $data['insidersCount'] = Insider::get()->count();
        $data['projectsCount'] = Project::get()->count();


        return view('index', $data);
    }

    public function viewAll ()
    {
        $data = [];

        $admins = User::where('user_type', 'admin')->orderBy('id', 'desc')->get();
        
        $data['admins'] = $admins;

        return view('admins.index', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'is_active' => true,
            'user_type' => 'admin'
        ]);

        $clientContact = Contact::create([
            'mobile_number' => '________',
        ]);
        $companyContact = Contact::create([]);

        $clientAddress = Address::create([]);
        $companyAddress = Address::create([]);

        $company = Company::create([
            'company_name' => '________',
            'contact_id' => $companyContact->id,
            'address_id' => $companyAddress->id
        ]);
        
         
        // add client after data validation pass
        $client = Client::create([
            'user_id' => $user->id,
            'title' => 'Mr',
            'company_id' => $company->id,
            'contact_id' => $clientContact->id,
            'address_id' => $clientAddress->id,
        ]);


        return redirect()->action('AdminController@viewAll');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['admin'] = User::where('id', $id)->get()->first();

        return view('admins.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $admin = User::where('id', $id)->get()->first();

        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$admin->id.',id',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'is_active' => true,
            'user_type' => 'admin'
        ]);


        return redirect()->action('AdminController@viewAll');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::where('id', $id)->get()->first();

        $admin->delete();

        return redirect()->action('AdminController@viewAll');
    }

} 
