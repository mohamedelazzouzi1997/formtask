<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class formController extends Controller
{
    //

    public function index(Request $request){
        $referral = $request->referral;
        return view('client.form',compact('referral'));
    }
    public function store(Request $request){

        $all = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'dateOfBirth' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'referal' => 'required',
        ]);

        $form = Form::Create($all);

        if($form){
            session()->flash('status','form submited successfully');
            return back();
        }else{
            session()->flash('status','something went wrong');
            return back();
        }
    }
}
