@extends('layouts.app')

@section('title', $category->name . ' on Creative Folk')
@section('description', e($category->description))

@section('content')
<main class="container" id="content">
    <section class="header">
        <h1>{{ $category->name }}</h1>
        <p>{{ $category->description }}</p>
    </section>
    <section class="grid">
        @include('article-summaries')
    </section>
</main>
@endsection