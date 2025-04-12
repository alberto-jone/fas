<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Artigos</title>
</head>
<body>
    <h1>Lista de Artigos</h1>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <p><a href="{{ route('articles.create') }}">Criar Novo Artigo</a></p>

    @if ($articles->isEmpty())
        <p>Não há artigos cadastrados.</p>
    @else
        <ul>
            @foreach ($articles as $article)
                <li>
                    <a href="{{ route('articles.show', $article->article_id) }}">{{ $article->title }}</a>
                    <a href="{{ route('articles.edit', $article->article_id) }}">Editar</a>
                    <form action="{{ route('articles.destroy', $article->article_id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este artigo?')">Deletar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>