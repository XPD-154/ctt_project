<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\sms_billing;
use App\Models\sms_credit_request;

class formController extends Controller
{
    //

    ////display requesting form page function////
    public function index(){
        
        //return DB::select("select * from sms_billing");

        /////check if user exist//////
        if(! Session::has('user')){
            return redirect('/');
        }
        /////end of check if user exist//////

        $data = sms_billing::all();
        
        return view("/form", ['data'=>$data]);

    }
    ////end of display requesting form page function////

    ////submit of request data function////
    public function enterData(Request $request){

        /////check if user exist//////
        if(! Session::has('user')){
            return redirect('/');
        }
        /////end of check if user exist//////

        /////get date and time stamp/////
        date_default_timezone_set('Africa/Lagos');
        $now_date = date('Y-m-d');
        $timestamp = date('Y-m-d H:i:s');
        /////end of get date and time stamp/////

        ////credentails and validation////
        $staff = Session::get('user');

        $checkField = $request->validate([
            'account' => 'required',
            'amount' => 'required'
        ]);
        ////end of credentails and validation////

        ////submit data////
        $sms_request = new sms_credit_request();
        $sms_request->account = $checkField['account'];
        $sms_request->credit_amount = $checkField['amount'];
        $sms_request->requesting_staff = $staff;
        $sms_request->updated_on = $timestamp;
        $sms_request->save();

        $message = "Data submitted";
        ////end of submit data////

        $request->session()->flash('message', $message);

        return redirect('/form');
    }
    ////end of submit of request data function////
}
