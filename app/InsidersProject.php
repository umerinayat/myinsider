<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\InsiderProjectEnd;
use App\Mail\InsiderProjectStart;


class InsidersProject extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'insider_id',  
    ];

    // add insider to project
    public static function addInsiderToProject($insiderId, $projectId) 
    {
       $insiderProject = InsidersProject::create([
            'project_id' => $projectId,
            'insider_id' => $insiderId,
        ]);

        return $insiderProject;
        
    }

    // update insiders of project
    public static function updateInsiderToProject($insidersIdsArr, $project, $isProjectCompleted, $isSendProjectInfo, $isSendNewProjectInfo, $insidersProjectIds)
    {
       

        foreach($insidersIdsArr as $insiderId)
        {

            $insiderProject = InsidersProject::where('project_id', $project->id)->where('insider_id', $insiderId)->get();

            
            $insider = Insider::where('id', $insiderId)->get()->first();
            $user = User::where('id', $insider->user_id)->get()->first();
            $insider->user = $user;

            $projectDetail = new \stdClass;
            $projectDetail->insider = $insider;
            $projectDetail->projectName = $project->project_name;
            $projectDetail->projectDescription = $project->project_description;
            $projectDetail->projectStartDate = $project->project_start_date;

            if (count($insiderProject) > 0) {

                InsidersProject::create([
                    'project_id' => $project->id,
                    'insider_id' => $insiderId,
                ]);


                if ($isProjectCompleted) 
                {
                    $projectDetail->projectEndDate = $project->project_end_date;
                    
                    // sending project end email
                    if  ($isSendProjectInfo) {
                        Mail::to($user->email)->send(new InsiderProjectEnd($projectDetail));
                    }
                   
                }   else {
                     // sending project start email
                    if ($isSendProjectInfo) {
                        Mail::to($user->email)->send(new InsiderProjectStart($projectDetail));
                    }
                    
                }

            } else {
                // to send email to newly added insiders to the project
               
                InsidersProject::create([
                    'project_id' => $project->id,
                    'insider_id' => $insiderId,
                ]);

                if ($isProjectCompleted) 
                {
                    $projectDetail->projectEndDate = $project->project_end_date;
                    
                    // sending project end email
                    if  ($isSendProjectInfo || $isSendNewProjectInfo) { 
                        Mail::to($user->email)->send(new InsiderProjectEnd($projectDetail));
                    }   
                   
                }   else {
                     // sending project start email
                    if  ($isSendProjectInfo || $isSendNewProjectInfo) { 
                        Mail::to($user->email)->send(new InsiderProjectStart($projectDetail));
                    }
                     
                }

            }

        }

        foreach($insidersProjectIds as $pid) {
            InsidersProject::where('id', $pid)->get()[0]->delete();
        }

        return true;
    
    }

     // delete insiders of project
     public static function deleteInsidersProject($project)
     {
         $insidersProject = InsidersProject::where('project_id',$project->id)->get();
         foreach($insidersProject as $insiderProject) 
         {
            $insiderProject->delete();
         }

        return true;
    }
}
