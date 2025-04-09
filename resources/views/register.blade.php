@extends('layouts.app')

@section('title', 'Register')
@section('description', 'Register for Creative Folk')

@section('content')
<main class="container" id="content">

    <section class="header">
        <h1>Register</h1>
    </section>
    <form method="POST" action="{{ url('register') }}" class="form-membership">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">Please correct errors</div>
        @endif

        <div class="form-group">
            <label for="forename">Forename: </label>
            <input type="text" name="forename" value="{{ old('forename', $member->forename ?? '') }}" id="forename" class="form-control">
            <div class="errors">{{ $errors->first('forename') }}</div>
        </div>

        <div class="form-group">
            <label for="surname">Surname: </label>
            <input type="text" name="surname" value="{{ old('surname', $member->surname ?? '') }}" id="surname" class="form-control">
            <div class="errors">{{ $errors->first('surname') }}</div>
        </div>

        <div class="form-group">
            <label for="email">Email address: </label>
            <input type="email" name="email" value="{{ old('email', $member->email ?? '') }}" id="email" class="form-control">
            <div class="errors">{{ $errors->first('email') }}</div>
        </div>

        <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" class="form-control">
            <div class="errors">{{ $errors->first('password') }}</div>
        </div>

        <div class="form-group">
            <label for="confirm">Confirm Password: </label>
            <input type="password" name="confirm" id="confirm" class="form-control">
            <div class="errors">{{ $errors->first('confirm') }}</div>
        </div>

        <input type="submit" class="btn btn-primary" value="Register">
    </form>

</main>
@endsection