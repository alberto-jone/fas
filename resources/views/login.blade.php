{{-- Estende o layout principal da aplicação (layouts/app.blade.php) --}}
@extends('layouts.app')

{{-- Define o título da página como "Log In" --}}
@section('title', 'Log In')

{{-- Define a meta descrição da página --}}
@section('description', 'Log in to your Creative Folk account')

{{-- Início do conteúdo principal da página --}}
@section('content')
<main class="container" id="content">

    {{-- Cabeçalho da página com título --}}
    <section class="header">
        <h1>Log in</h1>
    </section>

    {{-- Formulário de login com método POST, que envia os dados para a rota "login" --}}
    <form method="POST" action="{{ url('login') }}" class="form-membership">

        {{-- Token CSRF obrigatório para proteger contra ataques de falsificação de requisição entre sites --}}
        @csrf

        {{-- Caso exista uma variável $success (mensagem de sucesso), ela será exibida em verde --}}
        @if ($success)
            <div class="alert alert-success">{{ $success }}</div>
        @endif

        {{-- Caso exista um erro com a chave "message", ele será exibido em vermelho --}}
        @if ($errors->has('message'))
            <div class="alert alert-danger">{{ $errors->first('message') }}</div>
        @endif

        {{-- Campo de entrada para o email --}}
        <div class="form-group">
            <label for="email">Email </label>

            {{-- Input do email, preenchido automaticamente com valor antigo em caso de erro ou valor definido na variável $email --}}
            <input type="text" name="email" id="email" value="{{ old('email', $email ?? '') }}" class="form-control">

            {{-- Exibe o primeiro erro de validação associado ao campo email, caso exista --}}
            <div class="errors">{{ $errors->first('email') }}</div>
        </div>

        {{-- Campo de entrada para a password --}}
        <div class="form-group">
            <label for="password">Password </label>

            {{-- Campo de password (não exibe os caracteres digitados) --}}
            <input type="password" name="password" id="password" class="form-control">

            {{-- Exibe o primeiro erro de validação associado ao campo password, caso exista --}}
            <div class="errors">{{ $errors->first('password') }}</div>
        </div>

        {{-- Botão de submissão do formulário --}}
        <input type="submit" class="btn btn-primary" value="Log in"><br>

        {{-- Link para página de recuperação de password (caso o utilizador tenha esquecido) --}}
        <p><a href="{{ url('password-lost') }}">Lost password?</a></p>
    </form>

</main>
@endsection

{{--
====================================================================
DOCUMENTAÇÃO INTERNA — PÁGINA DE LOGIN
Autor: Alberto Jone João
Email: alberto.jone.joao@gmail.com
Data: 09 de Abril de 2025
Hora: 23h20
====================================================================

1. Estrutura e Funcionalidade
   - O ficheiro estende o layout principal da aplicação (`layouts.app`), que define a estrutura base da página.
   - O título da página é definido como "Log In", e a meta descrição fornece informações sobre a funcionalidade da página.
   - O conteúdo da página é composto por um cabeçalho, formulário de login, e mensagens de erro e sucesso.

2. Formulário de Login
   - O formulário é responsável por capturar o e-mail e a senha do utilizador. Através do método POST, os dados são enviados para a rota `login`.
   - O token CSRF é incluído automaticamente, garantindo a proteção contra ataques de falsificação de requisição entre sites.
   - As mensagens de erro e sucesso são exibidas no topo do formulário. As mensagens de erro são específicas para os campos de e-mail e senha.
   - O campo de e-mail está configurado para lembrar o valor anterior em caso de erro, e o campo de senha é do tipo "password", ocultando os caracteres digitados.
   - O formulário contém um link para recuperação de senha, caso o utilizador tenha esquecido sua senha.

3. Considerações sobre a Usabilidade
   - A interface do formulário é simples e direta, proporcionando uma experiência de login fácil e clara.
   - A validação dos campos é feita diretamente no servidor, e qualquer erro de validação será mostrado ao utilizador.
   - A presença do link "Lost password?" torna a recuperação de senha fácil para os utilizadores.

4. Sugestões de Melhoria
   - Implementar uma funcionalidade de login via redes sociais (como Google ou Facebook) para facilitar o acesso aos utilizadores.
   - Adicionar validação do lado do cliente para garantir que o formato do e-mail seja válido antes de enviar o formulário.
   - Usar AJAX para enviar o formulário sem recarregar a página, melhorando a experiência do utilizador.

5. Observações
   - O controlador responsável por processar o formulário de login deve ser configurado para verificar as credenciais do utilizador e, em caso de sucesso, redirecionar para a página principal ou o painel do utilizador.
   - Caso as credenciais sejam inválidas, o sistema deve retornar um erro apropriado e informar o utilizador.

--}}
