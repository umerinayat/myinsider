<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsidersToken extends Model
{
    protected $fillable = [
        'client_id', 'insider_id', 'token', 'isExpire'
    ];

    public static function setInsiderToken ($client_id, $insider_id, $tokenStr, $isExpire=false) 
    {
        $insiderToken = InsidersToken::create([
            'client_id' => $client_id,
            'insider_id' => $insider_id,
            'token' => $tokenStr,
            'isExpire' =>$isExpire
        ]);

        return $insiderToken;
    }
}
