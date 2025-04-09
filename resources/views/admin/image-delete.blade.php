@extends('admin.layouts.app')

@section('content')
<main class="container admin" id="content">
    <form action="{{ url('admin/image-delete/' . $article->id) }}" method="POST" class="narrow">
        @csrf
        <h1>Delete Image</h1>
        <p>Click confirm to delete the image:</p>
        <p><img src="{{ asset('uploads/' . $article->image_file) }}" alt="{{ $article->image_alt }}"></p>
        <input type="submit" name="delete" value="confirm" class="btn btn-primary" />
        <a href="{{ url('admin/article/' . $article->id) }}" class="btn btn-danger">cancel</a>
    </form>
</main>
@endsection