@extends('layouts.app')

@section('title')
@endsection

@section('styles')
@endsection

@section('content')

    <div class="container">
        <div class="row mx-auto my-5 justify-content-center">
            <div class="mx-auto my-5">
                <a class="btn btn-primary mx-2" href="{{ url('login') }}">admin login</a>
                <a class="btn btn-primary mx-2" href="{{ url('register') }}">admin register</a>
                <a class="btn btn-primary mx-2" href="{{ url('/links') }}">Referral Links For test</a>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('status'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('status') }}
                </div>
            @endif
            <form action="{{ route('send.form.file') }}" method="post" class="bg-secondary p-3 mb-5" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="lastName">csv file data</label>
                        <input type="file" class="form-control" name="file_data" placeholder="csv">
                </div>
                    <button type="submit" class="btn btn-primary btn-block my-3">Send</button>
            </form>
        </div>
        <form action="{{ route('send.form') }}" method="post" class="bg-secondary mt-5 p-3">
            @csrf
            <input type="hidden" name="referal" value="{{ $Referral_Link }}">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="fistName">First Name</label>
                    <input type="text" class="form-control" name="firstName" placeholder="Fist Name">
                </div>
                <div class="form-group col-md-12">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                </div>
                <div class="form-group col-md-12">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Date of birth</label>
                    <input type="date" class="form-control" name="dateOfBirth">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCity">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="phone">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputZip">Country</label>
                    <input type="text" class="form-control" name="country" placeholder="country">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputZip">City</label>
                    <input type="text" class="form-control" name="city" placeholder="city">
                </div>
            </div>
            <div class="row">
            </div>
            <button type="submit" class="btn btn-primary btn-block my-3">Send</button>
        </form>
    </div>
@endsection

@section('scripts')
@endsection
