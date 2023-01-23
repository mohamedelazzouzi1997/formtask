@extends('layouts.app')

@section('title')

@endsection

@section('styles')

@endsection

@section('content')
<div class="container">
    <div class="row mx-auto my-5 justify-content-center">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <a class="btn btn-primary " href="{{ url('/form?referral=Fabebook') }}">Fabebook</a>
                <a class="btn btn-danger" href="{{ url('/form?referral=Instagrame') }}">Instagrame</a>
                <a class="btn btn-warning" href="{{ url('/form?referral=Twitter') }}">Twitter</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
