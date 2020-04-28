<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street_address', 'city', 'zip_code', 'country', 'additional_address',
    ];
}
