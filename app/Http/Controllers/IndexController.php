<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Client;
use App\Insider;
use App\Project;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
       
        $data = [];


        if (Gate::allows('is_admin')) 
        {
            return redirect('/admin-dashboard');
        }

        if (Gate::allows('is_insider')) 
        {
            return redirect('/insdier/edit-info');
        }

        if (Gate::allows('is_client_active')) 
        {
            $client = Client::where('user_id', $user->id)->get()->first();
            
            $data['insidersCount'] = Insider::where('client_id', $client->id)->get()->count();
            $data['projectsCount'] = Project::where('client_id', $client->id)->get()->count();

            $userDetail = Client::where('user_id', $user->id)->get()->first();
            $data['userDetail'] = $userDetail;
            return view('index', $data);

        } else 
        {
            return view('clients.account-activation' , ['user'=> $user]);
        }

        
    }
}
