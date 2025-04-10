@foreach ($articles as $article)
    <article class="summary">
        <a href="{{ url('article/' . $article->article_id . '/' . $article->seo_title) }}">
            @if ($article->image)
                <img src="{{ asset('uploads/' . $article->image->file) }}" alt="{{ $article->image->alt }}">
            @else
                <img src="{{ asset('uploads/blank.png') }}" alt="">
            @endif
            <div class="social">
                <div class="like-count"><span class="icon-heart-empty"></span> {{ $article->likedBy->count() }}</div>
                <div class="comment-count"><span class="icon-comment"></span> {{ $article->comments->count() }}</div>
            </div>
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->summary }}</p>
        </a>
        <p class="credit">
            Posted in <a href="{{ url('category/' . $article->category->category_id . '/' . $article->category->seo_name) }}">{{ $article->category->name }}</a>
            by <a href="{{ url('member/' . $article->member->member_id) }}">{{ $article->member->forename }} {{ $article->member->surname }}</a>
        </p>
        @if (session('member_id') == $article->member_id)
            <a href="{{ url('work/' . $article->article_id) }}" class="btn btn-primary">Edit</a>
        @endif
    </article>
@endforeach

{{--
    =============================
    DOCUMENTAÇÃO DO CÓDIGO BLADE
    =============================

    1. @foreach ($articles as $article)
        - Inicia um loop para percorrer todos os artigos disponíveis.

    2. <article class="summary">
        - Define o contêiner de cada artigo.

    3. <a href="{{ url('article/' . $article->article_id . '/' . $article->seo_title) }}">
        - Cria um link para a página do artigo com ID (agora article_id) e título SEO.

    4. @if ($article->image)
        - Verifica se o artigo tem um relacionamento com uma imagem.

    5. <img src="{{ asset('uploads/' . $article->image->file) }}" alt="{{ $article->image->alt }}">
        - Exibe a imagem do artigo através do relacionamento, se existir.

    6. <img src="{{ asset('uploads/blank.png') }}" alt="">
        - Exibe uma imagem de substituição caso o artigo não tenha imagem.

    7. <div class="social">
        - Seção com contadores de curtidas e comentários.

    8. <div class="like-count">
        - Exibe o número de curtidas através do relacionamento likedBy().

    9. <div class="comment-count">
        - Exibe o número de comentários através do relacionamento comments().

    10. <h2>{{ $article->title }}</h2>
        - Mostra o título do artigo.

    11. <p>{{ $article->summary }}</p>
        - Mostra o resumo do artigo.

    12. <p class="credit">
        - Mostra a categoria e o autor do artigo.

    13. <a href="{{ url('category/' . $article->category->category_id . '/' . $article->category->seo_name) }}">
        - Link para a página da categoria, acessando dados através do relacionamento category().

    14. <a href="{{ url('member/' . $article->member->member_id) }}">
        - Link para o perfil do autor, acessando dados através do relacionamento member().

    15. @if (session('member_id') == $article->member_id)
        - Verifica se o utilizador logado (usando member_id da sessão) é o autor do artigo.

    16. <a href="{{ url('work/' . $article->article_id) }}" class="btn btn-primary">Edit</a>
        - Se for o autor, exibe o botão de edição do artigo (usando article_id).
--}}
