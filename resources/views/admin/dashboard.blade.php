@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('styles')

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center mb-10">
        @if (Session::has('status'))
            <div class="alert alert-primary" role="alert">
                {{ Session::get('status') }}
            </div>
        @endif
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
                        {!! $created_chart->container() !!}
                    </div>


                </div>
                <div class="card-body">

                    <h1>Referral Chart</h1>
                    <div>
                        {!! $referralChart->container() !!}
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
              <th scope="col">actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Form_Data as $data )
            <tr>
              <td>{{ $data->id }}</td>
              <td>{{ $data->firstName }}</td>
              <td>{{ $data->lastName }}</td>
              <td>{{ $data->phone }}</td>
              <td>{{ $data->country }}</td>
              <td>{{ $data->city }}</td>
              <td>{{ $data->referal }}</td>
              <td>
                @if ($data->is_confirmed)
                    <form class="d-inline"  action="{{ route('form.reject',$data->id) }}" method="post">
                        @csrf
                        <button type="submit"  class="btn btn-warning">Reject <i class="fa-solid fa-xmark"></i></button>
                    </form>
                @else
                    <form class="d-inline" action="{{ route('form.accept',$data->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">Accept <i class="fa-solid fa-check"></i></button>
                    </form>
                    <form class="d-inline"  action="{{ route('form.reject',$data->id) }}" method="post">
                        @csrf
                        <button type="submit"  class="btn btn-warning">Reject <i class="fa-solid fa-xmark"></i></button>
                    </form>

                @endif
                  <a href="{{ route('form.delete',$data->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $Form_Data->links() }}
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! $created_chart->script() !!}
{!! $referralChart->script() !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charse t="utf-8"></script>

@endsection
