{{-- Estende o layout principal da aplicação --}}
@extends('layouts.app')

{{-- Início da secção de conteúdo principal da página --}}
@section('content')
<main class="container grid" id="content">

    {{-- Inclui o ficheiro Blade que contém os resumos dos artigos
         (ex: uma lista de artigos com título, imagem, resumo, autor, etc.) --}}
    @include('article-summaries')

</main>
@endsection

{{--
====================================================================
DOCUMENTAÇÃO INTERNA — PÁGINA PRINCIPAL DE ARTIGOS
Autor: Alberto Jone João
Email: alberto.jone.joao@gmail.com
Data: 09 de Abril de 2025
Hora: 23h05
====================================================================

1. Estrutura e Funcionalidade
   - O ficheiro estende o layout principal da aplicação (`layouts.app`).
   - A secção de conteúdo da página é iniciada e contém um `main` com a classe `container grid` que serve para organizar o conteúdo de forma estruturada.
   - Dentro da secção de conteúdo, é incluído o ficheiro `article-summaries` que será responsável por exibir uma lista de artigos, cada um com título, imagem, resumo, autor, entre outros.

2. Objetivo da inclusão de `article-summaries`
   - Este Blade é responsável por incluir resumos de artigos de forma dinâmica, com base no que é gerado no back-end, como um loop que percorre os artigos disponíveis e exibe suas informações.
   - A inclusão de Blade é eficiente para reutilização de componentes e facilita a manutenção do código, permitindo que alterações no formato dos resumos sejam feitas apenas nesse arquivo.

3. Considerações sobre a apresentação dos artigos
   - O layout da grid (classe `grid`) ajuda a distribuir os artigos de forma ordenada e responsiva, facilitando a leitura em diferentes dispositivos.
   - O uso de imagens, título e resumo para cada artigo proporciona uma boa experiência de usuário, incentivando a interação com o conteúdo.

4. Sugestões de Melhoria
   - Implementar paginação no `article-summaries` para carregar os artigos de forma mais eficiente quando há um grande número de artigos.
   - Adicionar algum tipo de filtro ou busca para que os usuários possam encontrar artigos mais facilmente.

5. Observações
   - O ficheiro `article-summaries` deve estar corretamente configurado para receber os dados necessários do back-end, como os detalhes de cada artigo (título, imagem, resumo, autor, etc.).
   - Caso este Blade dependa de algum controlador para preencher as informações de artigos, é importante garantir que as variáveis estejam corretamente passadas para a visualização.

--}}
