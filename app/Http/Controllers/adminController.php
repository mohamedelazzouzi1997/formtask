<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Charts\FormChart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class adminController extends Controller
{
    //

    public function index(Request $request){

        if($request->has('date_start') || $request->has('date_end')){

            $startDate = $request->date_start ?? Carbon::now();
            $endDate = $request->date_end ?? Carbon::now();
            $chartdata = Form::selectRaw('DATE(created_at) as x, COUNT(*) as y') // chart data
                    ->groupBy('x')
                    ->whereDate('created_at', '>=', $startDate)
                    ->whereDate('created_at', '<=', $endDate)
                    ->get();

        }else{
            $chartdata = Form::selectRaw('DATE(created_at) as x, COUNT(*) as y') // chart data
                    ->groupBy('x')
                    ->where('created_at', '>', Carbon::now()->subYear())
                    ->get();
        }

        $chart = new FormChart;
        $chart->labels($chartdata->pluck('x'));
        $chart->dataset('Submited Form', 'bar', $chartdata->values());


        $datas = Form::latest()->get(); //table data
        return view('admin.dashboard',compact('datas','chart'));
    }
}
