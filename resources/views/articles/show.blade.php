<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Artigo</title>
</head>
<body>
    <h1>Detalhes do Artigo</h1>

    <div>
        <strong>Título:</strong> {{ $article->title }}
    </div>
    <div>
        <strong>Resumo:</strong> {{ $article->summary }}
    </div>
    <div>
        <strong>Conteúdo:</strong>
        <p>{{ $article->content }}</p>
    </div>
    <div>
        <strong>Categoria ID:</strong> {{ $article->category_id }}
    </div>
    <div>
        <strong>Membro ID:</strong> {{ $article->member_id }}
    </div>
    @if ($article->image_id)
        <div>
            <strong>Imagem ID:</strong> {{ $article->image_id }}
        </div>
    @endif
    <div>
        <strong>Publicado:</strong> {{ $article->published ? 'Sim' : 'Não' }}
    </div>
    @if ($article->seo_title)
        <div>
            <strong>Título SEO:</strong> {{ $article->seo_title }}
        </div>
    @endif
    <div>
        <strong>Criado em:</strong> {{ $article->created }}
    </div>

    <p><a href="{{ route('articles.edit', $article->article_id) }}">Editar Artigo</a></p>
    <p><a href="{{ route('articles.index') }}">Voltar para a Lista</a></p>
</body>
</html>