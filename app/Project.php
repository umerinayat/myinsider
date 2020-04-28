<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_name', 'project_description', 'is_project_completed',
        'project_start_date', 'project_end_date',  'commit', 'client_id',
    ];
}
