<?php

namespace App\Http\Controllers;

use App\InsidersProject;
use App\Project;
use App\Insider;
use App\User;
use App\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\InsiderProjectStart;
use App\Mail\InsiderProjectEnd;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // ------ CONSTRUCTOR ------
    public function __construct(Project $project)
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('can:is_active');
        $this->middleware('can:is_clientOrAdmin');
        $this->project = $project;

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
            $projects = $this->project->orderBy('id', 'DESC')->get();
        } else if ($user->user_type == 'client') {
            $projects = $this->project->where('client_id', $client->id)->orderBy('id', 'DESC')->get();
        } else {
            $projects  = [];
        }

        $data['projects'] = $projects;

        return view('projects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];

        $insiders = Insider::orderBy('id', 'DESC')->get();

        $updatedInsiders = [];
        foreach ($insiders as $insider) 
        {   
            $insider->user = User::where('id', $insider->user_id)->get()->first();

            array_push($updatedInsiders, $insider);
        }

        $data['insiders'] = $updatedInsiders;

        return view('projects.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\StoreProject $request)
    {   
        
        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->get()->first();



        $isProjectCompleted = false;

        if ( $request['is_project_completed'] === 'on' )
        {

            
            $startDate = strtotime( $request['project_start_date'] );
            $mysqlStartDate = date( 'Y-m-d H:i', $startDate );
            $endDate = strtotime( $request['project_end_date'] );
            $mysqlEndDate = date( 'Y-m-d H:i', $endDate );

            $project = Project::create([
                'project_name' => $request['project_name'],
                'project_description' => $request['project_description'],
                'is_project_completed' => $request['is_project_completed'] === 'on' ? true : false,
                'project_start_date' => $mysqlStartDate,
                'project_end_date' => $mysqlEndDate,
                'commit' => $request['commit'],
                'client_id' => $client->id,
            ]);

            $isProjectCompleted = true;

        } 
        else
        {

            $startDate = strtotime( $request['project_start_date'] );
            $mysqlStartDate = date( 'Y-m-d H:i', $startDate );
            
            $project = Project::create([
                'project_name' => $request['project_name'],
                'project_description' => $request['project_description'],
                'project_start_date' =>  $mysqlStartDate,
                'client_id' => $client->id,
            ]);

            $isProjectCompleted = false;
        }

       
        $isSendProjectInfo = $request['is_send_project_info']  === 'on' ? true : false; 
        
    

        if ( isset ( $request['insiders'] ) ) 
        {
            $insidersIdsArr = $request['insiders'];
            foreach($insidersIdsArr as $insiderId)
            {
                
                $insider = Insider::where('id', $insiderId)->get()->first();
                $user = User::where('id', $insider->user_id)->get()->first();
                $insider->user = $user;
    
                $projectDetail = new \stdClass;
                $projectDetail->insider = $insider;
                $projectDetail->projectName = $project->project_name;
                $projectDetail->projectDescription = $project->project_description;
                $projectDetail->projectStartDate = $project->project_start_date;
    
                
                if(InsidersProject::addInsiderToProject($insiderId, $project->id)) 
                {
                    
                    if(!$isProjectCompleted) 
                    {
                        // sending project start email
                        if ($isSendProjectInfo) {
                
                            Mail::to($user->email)->send(new InsiderProjectStart($projectDetail));
                        }
                        
                    }
                    else
                    {
                        $projectDetail->projectEndDate = $project->project_end_date;
                        // sending project start email
                        if ($isSendProjectInfo) {
                           
                            Mail::to($user->email)->send(new InsiderProjectEnd($projectDetail));
                        }
                        
                    }
                }
                
            }
        }
       
      

        return redirect('/projects');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {   
        $data = [];

        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->get()->first();

        if ($project->client_id === $client->id || $user->user_type === 'admin') 
        {
                    $insidersProject = InsidersProject::where('project_id',$project->id)
                                ->orderBy('id', 'DESC')->get();
            $insiders = [];
            foreach($insidersProject as $insiderProject) 
            {
                array_push($insiders, Insider::where('id', $insiderProject->insider_id)->get()->first());
            }

            $insidersArr = [];
            foreach($insiders as $insider) 
            {   
                $insider->user = User::where('id', $insider->user_id)->get()[0];
                array_push($insidersArr, $insider);
            }

            $data['insiders'] = $insidersArr;
            
            
            $data['project'] = $project; 

            return view('projects.show', $data);
        } else {
            return redirect('/projects');
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $data = [];

        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->get()->first();

        if ($project->client_id === $client->id || $user->user_type === 'admin') 
        {
            $insidersProject = InsidersProject::where('project_id',$project->id)
                                ->orderBy('id', 'DESC')->get();
      
            $insiders = Insider::orderBy('id', 'DESC')->get();
        
            $updatedInsiders = [];
            foreach($insiders as $insider) 
            {
                $insider->user = User::where('id', $insider->user_id)->get()->first();

                foreach($insidersProject as $insiderProject)
                {
                    if($insiderProject->insider_id === $insider->id) 
                    {
                        $insider->isPartOfProject = true;
                        break;
                    }
                }

                if(!isset($insider->isPartOfProject)) {
                    $insider->isPartOfProject = false;
                }

                array_push($updatedInsiders, $insider);
            }
       
            $data['insiders'] =  $updatedInsiders;
            $data['project'] = $project; 

            return view('projects.edit', $data);
        } else {
            return redirect('/projects');
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\UpdateProject $request, Project $project)
    {

        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->get()->first();

        if ($project->client_id === $client->id || $user->user_type === 'admin') 
        {

            $isProjectCompleted = false;

            if ( $request['is_project_completed'] === 'on' )
            {

                $startDate = strtotime( $request['project_start_date'] );
                $mysqlStartDate = date( 'Y-m-d H:i', $startDate );
                $endDate = strtotime( $request['project_end_date'] );
                $mysqlEndDate = date( 'Y-m-d H:i', $endDate );

                $project->update([
                    'project_name' => $request['project_name'],
                    'project_description' => $request['project_description'],
                    'is_project_completed' => $request['is_project_completed'] === 'on' ? true : false,
                    'project_start_date' =>  $mysqlStartDate,
                    'project_end_date' =>  $mysqlEndDate,
                    'commit' => $request['commit']
                ]);
                $isProjectCompleted = true;
            } 
            else
            {
                $startDate = strtotime( $request['project_start_date'] );
                $mysqlStartDate = date( 'Y-m-d H:i', $startDate );

                $project->update([
                    'project_name' => $request['project_name'],
                    'project_description' => $request['project_description'],
                    'is_project_completed' => 0,
                    'project_start_date' =>$mysqlStartDate,
                    'project_end_date' => null,
                ]);

                $isProjectCompleted = false;
            }

            $isSendProjectInfo = $request['is_send_project_info']  === 'on' ? true : false;
            

            
            $isSendNewProjectInfo = $request['is_send_project_info_new'] === 'on' ? true : false;
            
            
            
            $insidersProject = InsidersProject::where('project_id', $project->id)->get();
            $insidersProjectIds = $insidersProject->pluck('id');
            
            if ( isset ($request['insiders']) ) 
            {
                $insidersIdsArr = $request['insiders'];

                InsidersProject::updateInsiderToProject($insidersIdsArr, $project, $isProjectCompleted, $isSendProjectInfo, $isSendNewProjectInfo, $insidersProjectIds);
            } else {
                foreach ($insidersProject as $inP) {
                    $inP->delete();
                }
            }

           
        
            return redirect()->action('ProjectController@show', ['project' => $project->id]);

        } else {
            return redirect('/projects');
        }

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
  
        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->get()->first();
        
        if ($project->client_id === $client->id || $user->user_type === 'admin') 
        {
            
            InsidersProject::deleteInsidersProject($project);
            $project->delete();

            return redirect('/projects');

        } else {
            return redirect('/projects');
        }

    }
}
