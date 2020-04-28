<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppLanguageController extends Controller
{

    public function setAppLocale(Request $request) {
        
        session(['locale' => $request['locale']]);
        \App::setLocale($request['locale']);

        return redirect()->back();
    }
}
