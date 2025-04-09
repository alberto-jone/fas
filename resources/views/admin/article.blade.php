@extends('admin.layouts.app')

@section('content')

<form action="{{ url('admin/article/' . $article->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <main class="container admin" id="content">

        <h1>Edit Article</h1>
        @if ($errors->has('warning')) <div class="alert alert-danger">{{ $errors->first('warning') }}</div> @endif

        <div class="admin-article">
            <section class="image">
                @if (!$article->image_file)
                    <label for="image">Upload image</label>
                    <div class="form-group image-placeholder">
                        <input type="file" name="image" class="form-control-file" id="image"><br>
                        <span class="errors">{{ $errors->first('image_file') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="image_alt">Alt text: </label>
                        <input type="text" name="image_alt" id="image_alt" value="{{ old('image_alt') }}" class="form-control">
                        <span class="errors">{{ $errors->first('image_alt') }}</span>
                    </div>
                @else
                    <label>Image:</label>
                    <img src="{{ asset('uploads/' . $article->image_file) }}">
                    <p class="alt"><strong>Alt text:</strong> {{ $article->image_alt }}</p>
                    <a href="{{ url('admin/alt-text-edit/' . $article->id) }}" class="btn btn-secondary">Edit alt text</a>
                    <a href="{{ url('admin/image-delete/' . $article->id) }}" class="btn btn-secondary">Delete image</a><br>
                @endif
            </section>

            <section class="text">
                <div class="form-group">
                    <label for="title">Title: </label>
                    <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" class="form-control">
                    <span class="errors">{{ $errors->first('title') }}</span>
                </div>

                <div class="form-group">
                    <label for="summary">Summary: </label>
                    <textarea name="summary" id="summary" class="form-control">{{ old('summary', $article->summary) }}</textarea>
                    <span class="errors">{{ $errors->first('summary') }}</span>
                </div>

                <div class="form-group">
                    <label for="article-content">Content: </label>
                    <textarea name="content" id="article-content" class="form-control">{{ old('content', $article->content) }}</textarea>
                    <span class="errors">{{ $errors->first('content') }}</span>
                </div>

                <div class="form-group">
                    <label for="member_id">Author: </label>
                    <select name="member_id" id="member_id">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" @if ($article->member_id == $author->id) selected @endif>
                                {{ $author->forename }} {{ $author->surname }}</option>
                        @endforeach
                    </select>
                    <span class="errors">{{ $errors->first('author') }}</span>
                </div>

                <div class="form-group">
                    <label for="category">Category: </label>
                    <select name="category_id" id="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($article->category_id == $category->id) selected @endif>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    <span class="errors">{{ $errors->first('category') }}</span>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="published" value="1" class="form-check-input" id="published" @if ($article->published) checked @endif>
                    <label for="published" class="form-check-label">Published</label>
                </div>

                <input type="submit" name="update" value="save" class="btn btn-primary">
            </section>

        </div></main>
</form>
@endsection