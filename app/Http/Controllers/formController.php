<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class formController extends Controller
{
    //

    public function index(Request $request){

        $Referral_Link = $request->referral;//get the referral from the link

        return view('client.form',compact('Referral_Link'));
    }
    public function store(Request $request){

        //validating data from the form
        $all = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'dateOfBirth' => 'required',
            'phone' => 'numeric|required',
            'country' => 'required',
            'city' => 'required',
            'referal' => 'required',
        ]);

        $form = Form::Create($all); //store form data to database

        if($form){
            session()->flash('status','form submited successfully');
            return back();
        }else{
            session()->flash('status','something went wrong');
            return back();
        }
    }
}
