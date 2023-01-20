@extends('layouts.app')

@section('title')

@endsection

@section('styles')

@endsection

@section('content')
<div class="container">
<div class="row">
    <div class="d-flex justify-content-center align-items-center">
        <form class="bg-secondary p-4 mt-5" action="{{ route('login') }}" method="post">
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Email address @error('email')<span class="text-danger">{{ $message }}</span>@enderror </label>
                <input type="email" name="email" class="form-control" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password</label>
                <input type="password" name="password" id="form2Example2" class="form-control" />
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
        </form>
    </div>
</div>
</div>
@endsection

@section('scripts')

@endsection
