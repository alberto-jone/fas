@extends('layouts.app')

@section('title', 'Page not found')
@section('description', 'Sorry, we could not find that page')

@section('content')
<main class="container" id="content">
    <h1>Sorry! We cannot find that page.</h1>
    <p>Try the <a href="{{ url('/') }}">home page</a> or email us
        <a href="mailto:hello@eg.link">hello@eg.link</a></p>
</main>
@endsection