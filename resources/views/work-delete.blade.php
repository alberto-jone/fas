@extends('layouts.app')

@section('title', 'Delete image')

@section('content')
<main class="container" id="content">
    <section class="header"><h1>Delete Article</h1></section>
    <form action="{{ url('work-delete/' . $article->id) }}" method="POST" class="form-membership">
        @csrf
        <p>Click confirm to delete the article: <i>{{ $article->title }}</i></p>
        <input type="submit" name="delete" value="confirm" class="btn btn-primary" />
        <a href="{{ url('member/' . session('id')) }}" class="btn btn-danger">cancel</a>
    </form>
</main>
@endsection