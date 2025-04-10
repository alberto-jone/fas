{{-- Estende o layout principal da aplicação (layouts/app.blade.php) --}}
@extends('layouts.app')

{{-- Define o título da página com o nome da categoria + sufixo "on Creative Folk" --}}
@section('title', $category->name . ' on Creative Folk')

{{-- Define a meta descrição da página usando a descrição da categoria (com escape de HTML) --}}
@section('description', e($category->description))

{{-- Início do conteúdo da página --}}
@section('content')
<main class="container" id="content">

    {{-- Cabeçalho da categoria --}}
    <section class="header">
        {{-- Nome da categoria como título principal --}}
        <h1>{{ $category->name }}</h1>

        {{-- Descrição da categoria --}}
        <p>{{ $category->description }}</p>
    </section>

    {{-- Grelha que irá conter os resumos dos artigos --}}
    <section class="grid">
        {{-- Inclui o ficheiro Blade que mostra os resumos dos artigos, passando a coleção de artigos da categoria --}}
        @include('article-summaries', ['articles' => $category->articles])
    </section>
</main>
@endsection

{{--
====================================================================
DOCUMENTAÇÃO INTERNA — PÁGINA DE CATEGORIA
Autor: Alberto Jone João
Email: alberto.jone.joao@gmail.com
Data: 09 de Abril de 2025
Hora: 22h30
====================================================================

1. Estrutura
    - O ficheiro estende o layout principal da aplicação (layouts/app.blade.php).
    - Define título e descrição da página usando os dados da categoria.
    - O conteúdo da página está dividido em duas secções principais:
        a) Cabeçalho da categoria (nome e descrição)
        b) Grelha de resumos dos artigos

2. Funcionalidades principais
    - A primeira secção exibe o nome e a descrição da categoria.
    - A segunda secção inclui o ficheiro de resumos de artigos, reutilizando o Blade `article-summaries` para evitar duplicação de código, e passa os artigos relacionados.

3. Considerações de segurança
    - O uso de `e()` para escapar a descrição da categoria e evitar vulnerabilidades de XSS.
    - A estrutura de layout principal garante que as partes sensíveis (como cabeçalhos e rodapés) sejam sempre carregadas de forma consistente.

4. Usabilidade
    - O uso de uma grelha (`grid`) para exibir os resumos dos artigos, garantindo uma interface limpa e organizada.
    - Responsividade garantida pelo layout principal, adaptando-se a diferentes dispositivos.

5. Sugestões futuras
    - Considerar adicionar filtros ou ordenação para os artigos dentro da categoria.
    - Adicionar uma barra de pesquisa para facilitar a navegação.

--}}
