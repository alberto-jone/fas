@extends('layouts.app')

@section('title', 'Edit article')

@section('content')
    <form action="{{ url('work/' . $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <main class="container" id="content">
            <h1>Create &amp; Edit Your Work:</h1>
            @if ($errors->has('message'))
                <div class="alert alert-danger">{{ $errors->first('message') }}</div>
            @endif

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
                            <input type="text" name="image_alt" id="image_alt" value="" class="form-control">
                            <span class="errors">{{ $errors->first('image_alt') }}</span>
                        </div>
                    @else
                        <label>Image:</label>
                        <img src="{{ asset('uploads/' . $article->image_file) }}" alt="{{ $article->image_alt }}">
                        <p class="alt"><strong>Alt text:</strong> {{ $article->image_alt }}</p>
                    @endif
                </section>

                <section class="text">
                    <div class="form-group">
                        <label for="title">Title: </label>
                        <input type="text" name="title" id="title" value="{{ $article->title }}" class="form-control">
                        <span class="errors">{{ $errors->first('title') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="summary">Summary: </label>
                        <textarea name="summary" id="summary" class="form-control">{{ $article->summary }}</textarea>
                        <span class="errors">{{ $errors->first('summary') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="article-content">Content: </label>
                        <textarea name="content" id="article-content" class="form-control">{{ $article->content }}</textarea>
                        <span class="errors">{{ $errors->first('content') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="category">Category: </label>
                        <select name="category_id" id="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if ($article->category_id == $category->id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <span class="errors">{{ $errors->first('category') }}</span>
                    </div>

                    <input type="hidden" name="member_id" value="{{ session('id') }}" />
                    <span class="errors">{{ $errors->first('member') }}</span>

                    <input type="submit" name="update" value="save" class="btn btn-primary">
                    @if ($article->id)
                        <a href="{{ url('work-delete/' . $article->id) }}" class="btn btn-danger">delete</a>
                    @endif

                </section>

            </div></main>

    </form>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        if (document.getElementById('article-content')) {
            tinymce.init({
                menubar: false,
                selector: '#article-content',
                toolbar: 'bold italic link',
                plugins: 'link',
                target_list: false,
                link_title: false
            });
        }
    </script>
@endsection