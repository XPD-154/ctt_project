<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    ////index page function////
    public function login(){

        if(Session::has('user')){

            $staff = Session::get('user');

            if($staff==$_ENV['CROSSTEE_REQ_MAIL']){

                return redirect('/form');

            }elseif($staff==$_ENV['CROSSTEE_AUTH_MAIL']){
                
                return redirect('/record');
            }
            
        }
        
        return view("/index");
    }
    ////end of index page function////

    ////login request function////
    public function loginReq(Request $request){
        
        ////credentials and validation/////
        $reqEmail = $_ENV['CROSSTEE_REQ_MAIL'];
        $reqPass = $_ENV['CROSSTEE_REQ_PASS'];

        $authEmail = $_ENV['CROSSTEE_AUTH_MAIL'];
        $authPass = $_ENV['CROSSTEE_AUTH_PASS'];

        $checkField = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        ////end of credentials and validation/////

        ////requesting staff login////
        if ($checkField['email']==$reqEmail && $checkField['password']==$reqPass){

            /*set session for user*/
            $request->session()->put('user', $checkField['email']);
            
            /*set message for successful log in*/
            $message = "Successfully Logged in";

            $request->session()->flash('message', $message);

            return redirect('/form');

        }
        ////end of requesting staff login////
        
        ////authorizing staff login////
        elseif($checkField['email']==$authEmail && $checkField['password']==$authPass){

            /*set session for user*/
            $request->session()->put('user', $checkField['email']);
            
            /*set message for successful log in*/
            $message = "Successfully Logged in";

            $request->session()->flash('message', $message);

            return redirect('/record');
        }
        ////end of authorizing staff login////
        
        $message = "Check the log in username and password";

        $request->session()->flash('message', $message);

        return redirect('/');
    }
    ////end of login request function////

    ////function to logout////
    public function logout(Request $request){

        $request->session()->forget('user');

        $message = "Successfully Logged out";

        $request->session()->flash('message', $message);

        return redirect('/');
    }
    ////end of function to logout////
}
