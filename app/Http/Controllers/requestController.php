<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\sms_credit_request;
use App\Models\sms_billing;

class requestController extends Controller
{
    //
    /////Display Record Request Function/////
    public function index(){
        
        /*
        $data = DB::select("select * from sms_billing");
        $data = sms_credit_request::all();
        $data = sms_credit_request::where('status', 0)->get();
        $data = sms_credit_request::where('status', 0)->paginate(2);
        */

        /////check if user exist//////
        if(! Session::has('user')){
            return redirect('/');
        }
        /////end of check if user exist//////

        $data = sms_credit_request::orderBy('id', 'desc')->paginate(20);
        return view("/request", ['data'=>$data]);

    }
    /////End of Display Record Request Function/////
}
