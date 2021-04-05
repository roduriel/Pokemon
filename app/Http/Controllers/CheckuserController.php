<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Session;

class CheckuserController extends Controller
{
    public function Check(Request $request)
    {
        if(Auth::check()){
            if (Session::has('finderSession')) {
                Session::forget('finderSession');
                $finderSession = Session::put('finderSession', 'Prueba de que lees mi session');
                $getfinderSession = Session::get('finderSession');
            } else {
                $finderSession = Session::put('finderSession', 'Prueba de que lees mi session');
                $getfinderSession = Session::get('finderSession');
            }

            return response()->json([
                'session' => true,
                'var'     => $getfinderSession
            ]);
        }else{
            return response()->json([
                'session' => false
            ]);
        }

        
    }
    
}
