@extends('layouts.app')

@section('title', 'Update profile')
@section('description', 'Update profile for Creative Folk')

@section('content')
<main class="container" id="content">

    <section class="header"><h1>Update profile</h1></section>
    <form method="POST" action="{{ url('member-edit-profile') }}" class="form-membership">
        @csrf

        @if ($errors->has('message'))
            <div class="alert alert-danger">{{ $errors->first('message') }}</div>
        @endif

        <div class="form-group">
            <label for="forename">Forename: </label>
            <input type="text" name="forename" value="{{ old('forename', $member->forename ?? '') }}" id="forename" class="form-control" />
            <span class="errors">{{ $errors->first('forename') }}</span><br>
        </div>

        <div class="form-group">
            <label for="surname">Surname: </label>
            <input type="text" name="surname" value="{{ old('surname', $member->surname ?? '') }}" id="surname" class="form-control" />
            <span class="errors">{{ $errors->first('surname') }}</span><br>
        </div>

        <div class="form-group">
            <label for="email">Email address: </label>
            <input type="email" name="email" value="{{ old('email', $member->email ?? '') }}" id="email" class="form-control" />
            <span class="errors">{{ $errors->first('email') }}</span><br>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">update</button>
        </div>

    </form>
</main>
@endsection