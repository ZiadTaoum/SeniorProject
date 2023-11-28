<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function adminlogin(Request $request){
        $incomingFields = $request->validate([
            "adminLoginName" => "required",
            "adminLoginPassword" => "required",
            "adminLoginEmail"=> ["required"]
        ]);

        if(auth()->attempt(['name' => $incomingFields["adminLoginName"], 'email' => $incomingFields["adminLoginEmail"], 
        'password' => $incomingFields["adminLoginPassword"]])){

            $request ->session() ->regenerate();

            return redirect('/');
        }
        else{
            return view("home");
        }
    }

    public function adminlogout(){

        auth() ->logout();
        return redirect("/");
    }
}
