@extends('layouts.app')

@section('title', $article->title)
@section('description', e($article->summary))

@section('content')
<main class="article container" id="content">
    <section class="image">
        @if ($article->image)
            <img src="{{ asset('uploads/' . $article->image->file) }}" alt="{{ $article->image->alt }}">
        @else
            <img src="{{ asset('uploads/blank.png') }}" alt="">
        @endif
    </section>

    <section class="text">
        <h2>{{ $article->title }}</h2>

        <div class="social">
            <div class="like-count">
                @if (session('member_id') == 0)
                    <a href="{{ url('login') }}"><span class="icon-heart-empty"></span></a>
                @else
                    <a href="{{ url('like/' . $article->article_id) }}">
                        @if ($liked)
                            <span class="icon-heart"></span></a>
                        @else
                            <span class="icon-heart-empty"></span>
                        @endif
                    </a>
                @endif
                {{ $article->likedBy->count() }}
            </div>

            <div class="comment-count">
                <span class="icon-comment"></span> {{ $article->comments->count() }}
            </div>
        </div>

        <div class="date">{{ $article->created->format('F d, Y') }}</div>

        <div class="content">{!! $article->content !!}</div>

        <p class="credit">
            Posted in
            <a href="{{ url('category/' . $article->category->category_id . '/' . $article->category->seo_name) }}">
                {{ $article->category->name }}
            </a>
            by
            <a href="{{ url('member/' . $article->member->member_id) }}">
                {{ $article->member->forename }} {{ $article->member->surname }}
            </a>
        </p>
    </section>

    <section class="comments">
        <h2>Comments</h2>

        @foreach ($comments as $comment)
            <div class="comment">
                <img src="{{ asset('uploads/' . $comment->member->picture) }}" alt="{{ $comment->member->forename }} {{ $comment->member->surname }}" />
                <b>{{ $comment->member->forename }} {{ $comment->member->surname }}</b><br>
                {{ $comment->posted->format('H:i a - F d, Y') }}<br>
                <p>{!! $comment->comment !!}</p>
            </div>
        @endforeach

        @if (session('member_id') > 0)
            <form action="" method="POST">
                @csrf
                <label for="comment">Add comment: </label>
                <textarea name="comment" id="comment" class="form-control"></textarea>

                @if ($error)
                    <div class="error">{{ $error }}</div>
                @endif

                <br><input type="submit" value="Save comment" class="btn btn-primary">
            </form>
        @else
            <p>You must <a href="{{ url('login') }}">log in to make a comment</a>.</p>
        @endif
    </section>
</main>
@endsection

{{--
====================================================================
DOCUMENTAÇÃO INTERNA — PÁGINA DE EXIBIÇÃO DETALHADA DO ARTIGO
Autor: Alberto Jone João
Email: alberto.jone.joao@gmail.com
Data: 09 de Abril de 2025
Hora: 22h10
====================================================================

1. Estrutura
    - O ficheiro estende o layout principal da aplicação e define título e descrição da página.
    - O conteúdo está dividido em 3 grandes secções:
        a) Imagem do artigo
        b) Conteúdo do artigo
        c) Comentários

2. Funcionalidades principais
    - Exibição condicional da imagem do artigo.
    - Contadores sociais (curtidas e comentários), com verificação de sessão.
    - Botão de curtida funcional com estado (curtido/não curtido).
    - Comentários:
        - Listagem de todos os comentários.
        - Formulário de novo comentário com CSRF protection.
        - Verificação de sessão para exibir ou não o formulário.

3. Considerações de segurança
    - Utilização de `@csrf` nos formulários para proteger contra ataques CSRF.
    - Escapamento de conteúdo com `e()` e `{!! !!}` apenas quando necessário.

4. Usabilidade
    - Estrutura responsiva e semântica.
    - Fallback para imagem padrão caso o artigo não possua imagem.

5. Sugestões futuras
    - Paginação para comentários.
    - Validação no lado cliente.
    - Feedback visual após submissão de curtida/comentário.
--}}
