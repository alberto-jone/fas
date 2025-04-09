@extends('admin.layouts.app')

@section('content')

<main class="container" id="content">
    <section class="header">
        <h1>Articles</h1>
        @if ($success) <div class="alert alert-success">{{ $success }}</div> @endif
        @if ($failure) <div class="alert alert-danger">{{ $failure }}</div> @endif
        <p><a href="{{ url('admin/article') }}" class="btn btn-primary">Add new article</a></p>
    </section>
    <table>
        <tr>
            <th>Image</th><th>Title</th><th class="created">Created</th><th class="pub">Published</th><th class="edit">Edit</th><th class="del">Delete</th>
        </tr>
        @foreach ($articles as $article)
            <tr>
                <td>
                    @if ($article->image_file)
                        <img src="{{ asset('uploads/' . $article->image_file) }}" alt="{{ $article->image_alt }}">
                    @else
                        <img src="{{ asset('uploads/blank.png') }}" alt="">
                    @endif
                </td>
                <td><strong>{{ $article->title }}</strong></td>
                <td>{{ $article->created->format('M d Y') }}</td>
                <td> @if ($article->published) Yes @else No @endif</td>
                <td><a href="{{ url('admin/article/' . $article->id) }}" class="btn btn-primary">edit</a></td>
                <td><a href="{{ url('admin/article-delete/' . $article->id) }}" class="btn btn-danger">delete</a></td>
            </tr>
        @endforeach
    </table>
</main>

@endsection