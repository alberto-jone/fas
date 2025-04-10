@extends('layouts.app')

@section('title', 'Page not found')
@section('description', 'Sorry, we could not find that page')

@section('content')
<main class="container" id="content">

    {{-- Título informando que a página não foi encontrada --}}
    <h1>Sorry! We cannot find that page.</h1>

    {{-- Mensagem de sugestão para retornar à página inicial ou entrar em contato via email --}}
    <p>Try the <a href="{{ url('/') }}">home page</a> or email us
        <a href="mailto:hello@eg.link">hello@eg.link</a></p>

</main>
@endsection

{{--
====================================================================
DOCUMENTAÇÃO INTERNA — PÁGINA DE ERRO 404 (PÁGINA NÃO ENCONTRADA)
Autor: Alberto Jone João
Email: alberto.jone.joao@gmail.com
Data: 09 de Abril de 2025
Hora: 13h40
====================================================================

1. Estrutura e Funcionalidade
   - Este ficheiro Blade exibe uma mensagem de erro 404 informando que a página solicitada não foi encontrada.
   - A página sugere ao usuário que retorne à página inicial ou entre em contato por email com a equipe de suporte.

2. Funcionalidade
   - O título e a descrição da página são definidos para refletir que a página não foi encontrada.
   - O conteúdo da página contém um link para retornar à página inicial (home page).
   - Também há um link de email para facilitar o contato com a equipe de suporte caso o usuário tenha problemas ou dúvidas.

3. Considerações de Usabilidade
   - A mensagem é simples e clara, fornecendo ao usuário opções para continuar navegando no site ou obter ajuda.
   - O layout da página segue o padrão da aplicação, com a mesma estrutura usada em outras páginas do site.

4. Sugestões de Melhoria
   - Adicionar um botão de "Voltar" para retornar à página anterior além do link para a home page.
   - Implementar um formulário de contato direto na página para que os usuários possam enviar dúvidas diretamente da página de erro.

5. Observações
   - Este tipo de página é útil para garantir que o usuário não se perca ao acessar uma URL inválida, proporcionando uma experiência mais amigável.
--}}

