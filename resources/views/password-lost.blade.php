@extends('layouts.app')

@section('title', 'Password Reset')

@section('content')
<main class="container" id="content">
    @if ($sent == false)
        <form method="POST" action="{{ url('password-lost') }}" class="form-membership">
            @csrf
            <h1>Forgot your password?</h1>
            <label for="email">Enter your email address: </label>
            <input type="text" name="email" id="email" class="form-control"><br>
            <input type="submit" name="submit" value="Send email to reset password" class="btn">
            <span class="errors">{{ $error }}</span><br>
        </form>
    @else
        <p>If your address is registered, we will email instructions to reset your password.</p>
    @endif
</main>
@endsection