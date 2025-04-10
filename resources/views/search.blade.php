@extends('layouts.app')

@section('title', 'Search for ' . $term)

@section('description', 'Search results for ' . e($term))

@section('content')
<main class="container search" id="content">

    {{-- Seção de cabeçalho com o formulário de busca --}}
    <section class="header">
        {{-- Formulário de busca --}}
        <form action="{{ url('search') }}" method="get" class="form-search">
            {{-- Label e campo de entrada para o termo de pesquisa --}}
            <label for="search"><span>Search for: </span></label>
            <input type="text" name="term" value="{{ $term }}"
                   id="search" placeholder="Enter search term"
            />
            {{-- Botão para submeter o formulário de busca --}}
            <input type="submit" value="Search" class="btn btn-search" />
        </form>

        {{-- Exibe a quantidade de resultados encontrados, se houver um termo de pesquisa --}}
        @if ($term)
            <p><b>Matches found:</b> {{ $count }}</p>
        @endif
    </section>

    {{-- Seção para exibir os artigos encontrados na pesquisa --}}
    <section class="grid">
        {{-- Inclui o arquivo 'article-summaries' que renderiza os resumos dos artigos --}}
        @include('article-summaries')
    </section>

    {{-- Inclui a navegação de paginação --}}
    @include('pagination')

</main>
@endsection

{{--
====================================================================
DOCUMENTAÇÃO INTERNA — PÁGINA DE RESULTADOS DE PESQUISA
Autor: Alberto Jone João
Email: alberto.jone.joao@gmail.com
Data: 09 de Abril de 2025
Hora: 16h10
====================================================================

1. Estrutura e Funcionalidade
   - Esta página exibe os resultados de uma busca realizada pelo usuário na plataforma.
   - O formulário de busca permite ao usuário procurar termos específicos dentro do conteúdo da plataforma, com um campo de texto para inserir o termo de pesquisa e um botão para submeter a busca.

2. Formulário de Busca
   - O formulário utiliza o método GET para enviar o termo de pesquisa para a URL 'search'.
   - O campo de entrada (`<input type="text">`) preenche automaticamente com o termo de pesquisa anterior, se houver, para facilitar novas buscas ou correções rápidas.
   - O botão de envio (`<input type="submit">`) submete o formulário para realizar a pesquisa.

3. Exibição dos Resultados
   - Após a submissão do formulário, o número de resultados encontrados é exibido na tela, caso haja um termo de pesquisa. A variável `$count` contém a quantidade de correspondências encontradas.
   - A página exibe os resumos dos artigos encontrados através do `@include('article-summaries')`, que é responsável por renderizar os resultados.

4. Paginação
   - A navegação de paginação é incluída ao final da página, permitindo ao usuário navegar pelos resultados de pesquisa, caso existam múltiplas páginas de resultados. O arquivo `pagination.blade.php` é responsável por renderizar os links de navegação.

5. Sugestões de Melhoria
   - **Sugestão de busca automática:** Implementar um sistema de sugestões de busca enquanto o usuário digita, mostrando termos semelhantes ou populares.
   - **Melhorar os filtros de pesquisa:** Adicionar filtros para refinar os resultados, como categorias ou data de publicação, tornando a busca mais precisa e personalizada.
   - **Feedback de erro:** Adicionar uma mensagem caso não haja resultados encontrados para o termo de pesquisa, para melhorar a experiência do usuário.

6. Observações
   - A variável `$term` contém o termo de pesquisa enviado pelo usuário.
   - A variável `$count` exibe o número de resultados encontrados para o termo pesquisado.
   - O arquivo `article-summaries.blade.php` deve ser configurado para exibir os artigos ou conteúdos que correspondem ao termo de pesquisa.

7. Considerações sobre a Usabilidade
   - A página de resultados de busca é limpa e objetiva, com uma estrutura clara para a pesquisa e exibição de resultados.
   - O formulário é simples e intuitivo, com feedback visível sobre o número de resultados encontrados, facilitando para o usuário encontrar o que procura.

8. Possível Expansão
   - A funcionalidade de pesquisa pode ser expandida para incluir uma pesquisa mais avançada, permitindo ao usuário selecionar tipos de conteúdo específicos ou ordenar os resultados de acordo com diferentes critérios.

--}}
