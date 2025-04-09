@extends('layouts.app')

@section('title', $member->forename . ' ' . $member->surname)
@section('description', e($member->forename) . ' ' . e($member->surname) . ' on Creative Folk')

@section('content')
<main class="container" id="content">
    <section class="header">
        <h1>{{ $member->forename }} {{ $member->surname }}</h1>
        <p class="member"><b>Member since:</b> {{ $member->joined->format('F d, Y') }}</p>
        @if ($member->picture)
            <img src="{{ asset('uploads/' . $member->picture) }}" alt="{{ $member->forename }}"><br>
        @else
            <img src="{{ asset('uploads/member.png') }}" alt="" class="profile"><br>
        @endif
        @if ($success) <div class="alert alert-success">{{ $success }}</div> @endif
        @if (session('id') == $member->id)
            <nav class="member-options">
                <a href="{{ url('work') }}" class="btn btn-primary">Add work</a>
                <a href="{{ url('member-edit-profile') }}" class="btn btn-primary">Edit profile</a>
                <a href="{{ url('member-edit-picture') }}" class="btn btn-primary">Profile picture</a>
            </nav>
        @endif
    </section>
    <section class="grid">
        @include('article-summaries')
    </section>
</main>
@endsection