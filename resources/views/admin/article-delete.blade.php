@extends('admin.layouts.app')

@section('content')

<main class="container admin" id="content">
    <form action="{{ url('admin/article-delete/' . $article->id) }}" method="POST" class="narrow">
        @csrf
        <h1>Delete Article</h1>

        @if ($warning) <div class="alert alert-danger">{{ $warning }}</div> @endif

        <p>Click confirm to delete the article: <em>{{ $article->title }}</em></p>
        <input type="submit" name="delete" value="confirm" class="btn btn-primary" />
        <a href="{{ url('admin/articles') }}" class="btn btn-danger">cancel</a>
    </form>
</main>
@endsection