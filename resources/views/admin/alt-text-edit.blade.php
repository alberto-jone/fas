@extends('admin.layouts.app')

@section('content')
<main class="container admin" id="content">
    <form action="{{ url('admin/alt-text-edit/' . $article->id) }}" method="POST" class="narrow">
        @csrf
        <h1>Update Alt Text</h1>

        @if ($errors->has('message')) <div class="alert alert-danger">{{ $errors->first('message') }}</div> @endif

        <div class="form-group">
            <label for="image_alt">Alt text: </label>
            <input type="text" name="image_alt" id="image_alt" value="{{ old('image_alt', $article->image_alt) }}" class="form-control">
            <span class="errors">{{ $errors->first('alt') }}</span>
        </div>

        <div class="form-group">
            <input type="submit" name="delete" value="Update" class="btn btn-primary btn-save">
        </div>
        <img src="{{ asset('uploads/' . $article->image_file) }}" alt="{{ $article->image_alt }}">

    </form>
</main>
@endsection