@extends('layouts.app')

@section('content')
<main class="container" id="content">
    <section class="header"><h1>Contact us</h1></section>
    <form method="POST" action="{{ url('contact') }}" class="form-contact">
        @csrf
        @if ($errors->has('warning'))<div class="alert alert-danger">{{ $errors->first('warning') }}</div>@endif
        @if ($success)<div class="alert alert-success">{{ $success }}</div>@endif
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" value="{{ old('email', $from ?? '') }}" class="form-control">
            <span class="errors">{{ $errors->first('email') }}</span><br>
        </div>
        <div class="form-group">
            <label for="message">Message: </label><br>
            <textarea id="message" name="message" class="form-control">{{ old('message', $message ?? '') }}</textarea>
            <span class="errors">{{ $errors->first('message') }}</span><br>
        </div>
        <input type="submit" value="Submit Message" class="btn">
    </form>
</main>
@endsection