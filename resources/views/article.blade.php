@extends('layouts.app')

@section('title', $article->title)
@section('description', e($article->summary))

@section('content')
<main class="article container" id="content">
    <section class="image">
        @if ($article->image_file)
            <img src="{{ asset('uploads/' . $article->image_file) }}" alt="{{ $article->image_alt }}">
        @else
            <img src="{{ asset('uploads/blank.png') }}" alt="">
        @endif
    </section>
    <section class="text">
        <h2>{{ $article->title }}</h2>
        <div class="social">
            <div class="like-count">
                @if (session('id') == 0)
                    <a href="{{ url('login') }}"><span class="icon-heart-empty"></span></a>
                @else
                    <a href="{{ url('like/' . $article->id) }}">
                        @if ($liked)
                            <span class="icon-heart"></span></a>
                        @else
                            <span class="icon-heart-empty"></span>
                        @endif
                    </a>
                @endif
                {{ $article->likes }}
            </div>
            <div class="comment-count">
                <span class="icon-comment"></span> {{ $article->comments }}
            </div>
        </div>
        <div class="date">{{ $article->created->format('F d, Y') }}</div>
        <div class="content">{!! $article->content !!}</div>
        <p class="credit">
            Posted in <a href="{{ url('category/' . $article->category_id . '/' . $article->seo_category) }}">{{ $article->seo_category }}</a>
            by <a href="{{ url('member/' . $article->member_id) }}">{{ $article->author }}</a>
        </p>
    </section>

    <section class="comments">
        <h2>Comments</h2>
        @foreach ($comments as $comment)
            <div class="comment">
                <img src="{{ asset('uploads/' . $comment->picture) }}" alt="{{ $comment->author }}" />
                <b>{{ $comment->author }}</b><br>
                {{ $comment->posted->format('H:i a - F d, Y') }}<br>
                <p>{!! $comment->comment !!}</p>
            </div>
        @endforeach

        @if (session('id') > 0)
            <form action="" method="POST">
                @csrf
                <label for="comment">Add comment: </label>
                <textarea name="comment" id="comment" class="form-control"></textarea>
                @if ($error) <div class="error">{{ $error }}</div> @endif
                <br><input type="submit" value="Save comment" class="btn btn-primary">
            </form>
        @else
            <p>You must <a href="{{ url('login') }}">log in to make a comment</a>.</p>
        @endif
    </section>
</main>
@endsection