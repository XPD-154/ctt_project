<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\sms_credit_request;
use App\Models\sms_billing;


class recordController extends Controller
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

        $data = sms_credit_request::where('status', 0)->orderBy('id', 'desc')->paginate(10);
        return view("/record", ['data'=>$data]);

    }
    /////End of Display Record Request Function/////

    /////Edit Request Function/////
    public function editReq(Request $request, sms_credit_request $edit){

        /////check if user exist//////
        if(! Session::has('user')){
            return redirect('/');
        }
        /////end of check if user exist//////

        return view("/edit", ['data'=>$edit]);
    }
    /////End of Edit Request Function/////

    /////Approval/Rejection Function/////
    public function sumitReq(Request $request){

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

        /////credentials/////
        $staff = Session::get('user');
        $id = $request['id'];
        $account = strval($request['account']);
        $amount = floatval($request['amount']);
        /////end of credentials/////

        /////Approval submittion/////
        if(isset($request['approved'])){

            /////update billing table/////
            $billing_query = sms_billing::select('balance')->where('account', $account)->first();
            $billing_acct_balance = floatval($billing_query['balance']);

            $new_acct_balance = $amount + $billing_acct_balance;
            
            $sms_billing = sms_billing::where('account', $account)->first();
            $sms_billing->balance = $new_acct_balance;
            $sms_billing->updated_on = $timestamp;

            $sms_billing->save();
            /////end of update billing table/////

            /////update request table/////
            $sms_request = sms_credit_request::find($id);

            $sms_request->approval_status = 'approved';
            $sms_request->status = 1;
            $sms_request->authorizing_staff = $staff;
            $sms_request->before_balance = $billing_acct_balance;
            $sms_request->after_balance = $new_acct_balance;
            $sms_request->updated_on = $timestamp;

            $sms_request->save();
            /////end of update request table/////

            /////flash message/////
            $message = "Request Approve";
            $request->session()->flash('message', $message);
            /////end of flash message/////

            return redirect('/record');

        }
        /////end of Approval submittion/////
        
        /////Rejection submittion/////
        elseif(isset($request['rejected'])){

            /////update request table/////
            $sms_request = sms_credit_request::find($id);

            $sms_request->approval_status = 'rejected';
            $sms_request->status = 1;
            $sms_request->authorizing_staff = $staff;
            $sms_request->updated_on = $timestamp;

            $sms_request->save();
            /////end of update request table/////

            /////flash message/////
            $message = "Request Rejected";
            $request->session()->flash('message', $message);
            /////end of flash message/////

            return redirect('/record');

        }
        /////end of Rejection submittion/////

    }
    /////End of Approval/Rejection Function/////
}
