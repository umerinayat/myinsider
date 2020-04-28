<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insider extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'first_name', 'last_name', 'email', 
        'date_of_birth', 'national_id_number', 'language', 
        'notes', 'client_id',
        'company_id', 'contact_id', 'address_id',
        'user_id'
    ];
}
