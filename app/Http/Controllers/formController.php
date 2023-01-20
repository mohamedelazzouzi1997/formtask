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

        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'dateOfBirth' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
        ]);

        $form = Form::Create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'dateOfBirth' => $request->dateOfBirth,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'referal' =>$request->referral ?? null,
        ]);
        if($form){
            session()->flash('status','form submited successfully');
            return back();
        }else{
            session()->flash('status','something went wrong');
            return back();
        }
    }
}
