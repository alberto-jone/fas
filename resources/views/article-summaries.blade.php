@foreach ($articles as $article)
    <article class="summary">
        <a href="{{ url('article/' . $article->id . '/' . $article->seo_title) }}">
            @if ($article->image_file)
                <img src="{{ asset('uploads/' . $article->image_file) }}" alt="{{ $article->image_alt }}">
            @else
                <img src="{{ asset('uploads/blank.png') }}" alt="">
            @endif
            <div class="social">
                <div class="like-count"><span class="icon-heart-empty"></span> {{ $article->likes }}</div>
                <div class="comment-count"><span class="icon-comment"></span> {{ $article->comments }}</div>
            </div>
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->summary }}</p>
        </a>
        <p class="credit">
            Posted in <a href="{{ url('category/' . $article->category_id . '/' . $article->seo_category) }}">{{ $article->category }}</a>
            by <a href="{{ url('member/' . $article->member_id) }}">{{ $article->author }}</a>
        </p>
        @if (session('id') == $article->member_id)
            <a href="{{ url('work/' . $article->id) }}" class="btn btn-primary">Edit</a>
        @endif
    </article>
@endforeach