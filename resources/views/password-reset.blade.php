@extends('layouts.app')

@section('title', 'Update Password')

@section('content')
<main class="container" id="content">
    <section class="header"><h1>Reset Password</h1></section>
    <form method="POST" action="{{ url('?token=' . $token) }}" class="form-membership">
        @csrf
        @if ($errors->has('message'))
            <div class="alert alert-danger">{{ $errors->first('message') }}</div>
        @endif
        <div class="form-group">
            <label for="password">Enter Your New Password:</label>
            <input type="password" name="password" id="password" class="form-control">
            <span class="errors">{{ $errors->first('password') }}</span><br>
        </div>
        <div class="form-group">
            <label for="confirm">Confirm Your Password:</label>
            <input type="password" name="confirm" id="confirm" class="form-control">
            <span class="errors">{{ $errors->first('confirm') }}</span><br>
        </div>
        <input type="submit" value="Submit New Password" class="btn">
    </form>
</main>
@endsection