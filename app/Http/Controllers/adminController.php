<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Mail\FormMail;
use App\Charts\FormChart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class adminController extends Controller
{
    //

    public function index(Request $request){


        $Form_Data = Form::latest()->paginate(5); //table data

        //checking if the filter form is submited

        if($request->has('date_start') || $request->has('date_end')){

            $Filter_Date_From = $request->date_start ?? Carbon::now();
            $Filter_Date_To = $request->date_end ?? Carbon::now();

            //select colume created_at between two date from the form table
            $chartData = Form::selectRaw('DATE(created_at) as created, COUNT(*) as created_count') // chart data
                    ->groupBy('created')
                    ->whereDate('created_at', '>=', $Filter_Date_From)
                    ->whereDate('created_at', '<=', $Filter_Date_To)
                    ->get();

            //select colume referal between two date from the form table
            $chartReferal=  Form::select('referal')
                    ->selectRaw('count(referal) as counts')
                    ->whereDate('created_at', '>=', $Filter_Date_From)
                    ->whereDate('created_at', '<=', $Filter_Date_To)
                    ->groupBy('referal')
                    ->get();

            $File_Data_Chart=  Form::selectRaw('sum(sales) as sales_Count,referal as origin')
                    ->whereDate('created_at', '>=', $Filter_Date_From)
                    ->whereDate('created_at', '<=', $Filter_Date_To)
                    ->groupBy('referal')
                    ->get();

        }else{
            //select colume created_at from the form table
            $chartData = Form::selectRaw('DATE(created_at) as created, COUNT(*) as created_count') // chart data
                    ->groupBy('created')
                    ->where('created_at', '>', Carbon::now()->subYear())
                    ->get();
            // dd($chartdata);
            //select colume referal from the form table
            $chartReferal=  Form::select('referal')
                    ->selectRaw('count(referal) as counts')
                    ->where('created_at', '>', Carbon::now()->subYear())
                    ->groupBy('referal')
                    ->get();

            $File_Data_Chart=  Form::selectRaw('sum(sales) as sales_Count ,referal as origin')
                    ->where('created_at', '>', Carbon::now()->subYear())
                    ->groupBy('referal')
                    ->get();
        }
        // dd($File_Data_Chart);
        //create new chart for submited form by created_at
        $created_chart = new FormChart;
        $created_chart->labels($chartData->pluck('created'));
        $created_chart->dataset('Submited Form', 'bar', $chartData->pluck('created_count'))->backgroundColor('rgba(5,8,240,.5)');

        //create new chart for Referral links
        $referralChart = new FormChart;
        $referralChart->labels($chartReferal->pluck('referal'));
        $referralChart->dataset('Referral Links', 'bar', $chartReferal->pluck('counts'))->backgroundColor('rgba(5,250,240,.5)');

        //create new chart for Referral sales
        $Sales_chart = new FormChart;
        $Sales_chart->labels($File_Data_Chart->pluck('origin'));
        $Sales_chart->dataset('Referral Sales', 'bar', $File_Data_Chart->pluck('sales_Count'))->backgroundColor('rgba(5,20,240,.5)');
        return view('admin.dashboard',compact('Form_Data','created_chart','referralChart','Sales_chart'));
    }

    //function for reject a form
    public function rejectForm($id){

        $form = Form::find($id);
        $form->update([
            'is_confirmed' => 0
        ]);

        if($form){
            Mail::to($form->email)->send(new FormMail('Rejected'));
            session()->flash('status','the form was rejected successfully');
            return back();
        }
            session()->flash('status','something went wrong');
            return back();
    }

    //function for accept a form

    public function acceptForm($id){

        $form = Form::find($id);
        $form->update([
           'is_confirmed' => 1
        ]);

        if($form){
            Mail::to($form->email)->send(new FormMail('Accepted'));
            session()->flash('status','the form was accepted successfully');
            return back();
        }
            session()->flash('status','something went wrong');
            return back();
    }

    // hard delete a form
    public function deleteForm($id){
        //Select raw from form table by id and hard delete it
        $form = Form::find($id)->delete();
        if($form){
            session()->flash('status','the form was deleted successfully');
            return back();
        }
            session()->flash('status','something went wrong');
            return back();
    }
}
