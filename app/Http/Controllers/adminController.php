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

        $datas = Form::latest()->paginate(5); //table data

        if($request->has('date_start') || $request->has('date_end')){

            $startDate = $request->date_start ?? Carbon::now();
            $endDate = $request->date_end ?? Carbon::now();

            $chartdata = Form::selectRaw('DATE(created_at) as x, COUNT(*) as y') // chart data
                    ->groupBy('x')
                    ->whereDate('created_at', '>=', $startDate)
                    ->whereDate('created_at', '<=', $endDate)
                    ->get();

            $chartReferal=  Form::select('referal')
                    ->selectRaw('count(referal) as counts')
                    ->whereDate('created_at', '>=', $startDate)
                    ->whereDate('created_at', '<=', $endDate)
                    ->groupBy('referal')
                    ->get();

        }else{
            $chartdata = Form::selectRaw('DATE(created_at) as x, COUNT(*) as y') // chart data
                    ->groupBy('x')
                    ->where('created_at', '>', Carbon::now()->subYear())
                    ->get();

            $chartReferal=  Form::select('referal')
                    ->selectRaw('count(referal) as counts')
                    ->where('created_at', '>', Carbon::now()->subYear())
                    ->groupBy('referal')
                    ->get();
        }

        $chart = new FormChart;
        $chart->labels($chartdata->pluck('x'));
        $chart->dataset('Submited Form', 'bar', $chartdata->values())->backgroundColor('rgba(5,8,240,.5)');

        $chart2 = new FormChart;
        $chart2->labels($chartReferal->pluck('referal'));
        $chart2->dataset('Referral', 'bar', $chartReferal->pluck('counts'))->backgroundColor('rgba(5,250,240,.5)');

        return view('admin.dashboard',compact('datas','chart','chart2'));
    }

    public function formReject($id){

        $form = Form::find($id);
        $form->update([
            'is_confirmed' => 0
        ]);
                // dd($form);
        if($form){
            Mail::to($form->email)->send(new FormMail('Rejected'));
            session()->flash('status','the form was rejected successfully');
            return back();
        }
            session()->flash('status','something went wrong');
            return back();
    }


    public function formAccept($id){

        $form = Form::find($id);
        $form->update([
           'is_confirmed' => 1
        ]);
        if($form){
            Mail::to($form->email)->send(new FormMail('Rejected'));
            session()->flash('status','the form was accepted successfully');
            return back();
        }
            session()->flash('status','something went wrong');
            return back();
    }

    public function formDelete($id){
        $form = Form::find($id)->delete();
        if($form){
            session()->flash('status','the form was deleted successfully');
            return back();
        }
            session()->flash('status','something went wrong');
            return back();
    }
}
