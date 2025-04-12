<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Artigo</title>
</head>
<body>
    <h1>Editar Artigo</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.update', $article->article_id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Especifica que a requisição HTTP deve ser PUT para atualizar --}}
        <button typle="submit">Atualizar Artigo</button>
        <div>
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $article->title) }}" required>
        </div>
        <div>
            <label for="summary">Resumo:</label>
            <input type="text" id="summary" name="summary" value="{{ old('summary', $article->summary) }}" required>
        </div>
        <div>
            <label for="content">Conteúdo:</label>
            <textarea id="content" name="content" rows="5" required>{{ old('content', $article->content) }}</textarea>
        </div>
        <div>
            <label for="category_id">Categoria ID:</label>
            <input type="number" id="category_id" name="category_id" value="{{ old('category_id', $article->category_id) }}" required>
        </div>
        <div>
            <label for="member_id">Membro ID:</label>
            <input type="number" id="member_id" name="member_id" value="{{ old('member_id', $article->member_id) }}" required>
        </div>
        <div>
            <label for="image_id">Imagem ID (Opcional):</label>
            <input type="number" id="image_id" name="image_id" value="{{ old('image_id', $article->image_id) }}">
        </div>
        <div>
            <label for="published">Publicado:</label>
            <select id="published" name="published">
                <option value="0" {{ old('published', $article->published) == 0 ? 'selected' : '' }}>Não</option>
                <option value="1" {{ old('published', $article->published) == 1 ? 'selected' : '' }}>Sim</option>
            </select>
        </div>
        <div>
            <label for="seo_title">Título SEO:</label>
            <input type="text" id="seo_title" name="seo_title" value="{{ old('seo_title', $article->seo_title) }}">
        </div>
        <button type="submit">Atualizar Artigo</button>
    </form>

    <p><a href="{{ route('articles.show', $article->article_id) }}">Voltar para os Detalhes</a></p>
    <p><a href="{{ route('articles.index') }}">Voltar para a Lista</a></p>
</body>
</html>
