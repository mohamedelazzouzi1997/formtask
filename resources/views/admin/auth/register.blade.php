@extends('layouts.app')

@section('title')

@endsection

@section('styles')

@endsection

@section('content')
<div class="container">
<div class="row">
    <div class="d-flex justify-content-center align-items-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="bg-secondary p-4 mt-5" action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Name @error('name')<span class="text-danger">{{ $message }}</span>@enderror </label>
                <input type="text" name="name" class="form-control" />
            </div>
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
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password Confirmation</label>
                <input type="password" name="password_confirmation" id="form2Example2" class="form-control" />
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
        </form>
    </div>
</div>
</div>
@endsection

@section('scripts')

@endsection
