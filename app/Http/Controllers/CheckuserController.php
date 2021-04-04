<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CheckuserController extends Controller
{
    public function Check(Request $request)
    {
        if(Auth::check()){
            return response()->json([
                'session' => true
            ]);
        }else{
            return response()->json([
                'session' => false
            ]);
        }

        
    }
    
}
