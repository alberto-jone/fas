@extends('layouts.app')

@section('title', 'Search for ' . $term)

@section('description', 'Search results for ' . e($term))

@section('content')
<main class="container search" id="content">

    <section class="header">
        <form action="{{ url('search') }}" method="get" class="form-search">
            <label for="search"><span>Search for: </span></label>
            <input type="text" name="term" value="{{ $term }}"
                   id="search" placeholder="Enter search term"
            /><input type="submit" value="Search" class="btn btn-search" />
        </form>
        @if ($term) <p><b>Matches found:</b> {{ $count }}</p> @endif
    </section>

    <section class="grid">
        @include('article-summaries')
    </section>

    @include('pagination')

</main>
@endsection