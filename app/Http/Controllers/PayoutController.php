<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayoutController extends Controller
{
    public function payouts_list(){
        return view("backend.payout.payouts");
    }

    public function payout_request(){
        return view("backend.payout.payout_request");
    }

    public function payout($id){
        return view("backend.payout.payout");
    }

    public function payout_reject($id){
        return view("backend.payout.payout_reject");
    }
    public function rejected_payout(){
        return view("backend.payout.rejected_payout");
    }
}
