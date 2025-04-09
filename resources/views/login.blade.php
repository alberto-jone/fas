@extends('layouts.app')

@section('title', 'Log In')
@section('description', 'Log in to your Creative Folk account')

@section('content')
<main class="container" id="content">

    <section class="header">
        <h1>Log in</h1>
    </section>
    <form method="POST" action="{{ url('login') }}" class="form-membership">
        @csrf
        @if ($success) <div class="alert alert-success">{{ $success }}</div> @endif
        @if ($errors->has('message')) <div class="alert alert-danger">{{ $errors->first('message') }}</div> @endif

        <div class="form-group">
            <label for="email">Email </label>
            <input type="text" name="email" id="email" value="{{ old('email', $email ?? '') }}" class="form-control">
            <div class="errors">{{ $errors->first('email') }}</div>
        </div>

        <div class="form-group">
            <label for="password">Password </label>
            <input type="password" name="password" id="password" class="form-control">
            <div class="errors">{{ $errors->first('password') }}</div>
        </div>

        <input type="submit" class="btn btn-primary" value="Log in"><br>
        <p><a href="{{ url('password-lost') }}">Lost password?</a></p>
    </form>

</main>
@endsection