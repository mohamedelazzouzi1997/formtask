@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('styles')

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center mb-10">
        <div class="col-md-8 mb-5">
            <form action="{{ route('filter') }}" class="form-group" method="get">
                @csrf
                <div class="row my-5 justify-content-center">
                    <div class="col-md-6">
                        <label for="date_start">FROM</label>
                        <input type="date" class="form-control" name="date_start" id="date_start" required>
                    </div>
                    <div class="col-md-6">
                        <label for="date_end">TO</label>
                        <input type="date" class="form-control" name="date_end" id="date_end" required>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <h1>Form Submited Chart</h1>
                    <div>
                        {!! $chart->container() !!}
                    </div>


                </div>

            </div>
        </div>
    </div>


    <div class="row mx-auto text-center">
        <table class="table table-bordered mt-5">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">phone</th>
              <th scope="col">country</th>
              <th scope="col">city</th>
              <th scope="col">referral</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($datas as $data )
            <tr>
              <td>{{ $data->firstName }}</td>
              <td>{{ $data->lastName }}</td>
              <td>{{ $data->phone }}</td>
              <td>{{ $data->country }}</td>
              <td>{{ $data->city }}</td>
              <td>{{ $data->firstName }}</td>
              <td>{{ $data->referal }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
{!! $chart->script() !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charse t="utf-8"></script>

@endsection