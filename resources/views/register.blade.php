@extends('layouts.app')

@section('title', 'Register')
@section('description', 'Register for Creative Folk')

@section('content')
<main class="container" id="content">

    {{-- Seção de cabeçalho com o título "Register" --}}
    <section class="header">
        <h1>Register</h1>
    </section>

    {{-- Formulário para registro de um novo membro --}}
    <form method="POST" action="{{ url('register') }}" class="form-membership">
        @csrf {{-- Token CSRF para proteger contra ataques de falsificação de requisição --}}

        {{-- Exibe uma mensagem de erro geral, se houver erros no formulário --}}
        @if ($errors->any())
            <div class="alert alert-danger">Please correct errors</div>
        @endif

        {{-- Campo para o nome (forename) --}}
        <div class="form-group">
            <label for="forename">Forename: </label>
            <input type="text" name="forename" value="{{ old('forename', $member->forename ?? '') }}" id="forename" class="form-control">
            {{-- Exibe o primeiro erro relacionado ao campo 'forename', se houver --}}
            <div class="errors">{{ $errors->first('forename') }}</div>
        </div>

        {{-- Campo para o sobrenome (surname) --}}
        <div class="form-group">
            <label for="surname">Surname: </label>
            <input type="text" name="surname" value="{{ old('surname', $member->surname ?? '') }}" id="surname" class="form-control">
            {{-- Exibe o primeiro erro relacionado ao campo 'surname', se houver --}}
            <div class="errors">{{ $errors->first('surname') }}</div>
        </div>

        {{-- Campo para o email --}}
        <div class="form-group">
            <label for="email">Email address: </label>
            <input type="email" name="email" value="{{ old('email', $member->email ?? '') }}" id="email" class="form-control">
            {{-- Exibe o primeiro erro relacionado ao campo 'email', se houver --}}
            <div class="errors">{{ $errors->first('email') }}</div>
        </div>

        {{-- Campo para a senha --}}
        <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" class="form-control">
            {{-- Exibe o primeiro erro relacionado ao campo 'password', se houver --}}
            <div class="errors">{{ $errors->first('password') }}</div>
        </div>

        {{-- Campo para confirmar a senha --}}
        <div class="form-group">
            <label for="confirm">Confirm Password: </label>
            <input type="password" name="confirm" id="confirm" class="form-control">
            {{-- Exibe o primeiro erro relacionado ao campo 'confirm', se houver --}}
            <div class="errors">{{ $errors->first('confirm') }}</div>
        </div>

        {{-- Botão para submeter o formulário --}}
        <input type="submit" class="btn btn-primary" value="Register">
    </form>

</main>
@endsection

{{--
====================================================================
DOCUMENTAÇÃO INTERNA — FORMULÁRIO DE REGISTRO
Autor: Alberto Jone João
Email: alberto.jone.joao@gmail.com
Data: 09 de Abril de 2025
Hora: 16h10
====================================================================

1. Estrutura e Funcionalidade
   - Este trecho de código Blade exibe um formulário de registro para novos membros na plataforma.
   - O formulário coleta informações essenciais, como nome, sobrenome, email, senha e confirmação de senha.
   - O formulário envia os dados para a URL 'register' via o método POST, onde os dados serão processados e armazenados.

2. Validação e Exibição de Erros
   - **Erros Gerais:** Se houver erros no envio do formulário, uma mensagem de erro geral é exibida no topo com a classe `alert alert-danger`.
   - **Erros Específicos de Campos:** Caso haja algum erro de validação em qualquer campo (nome, sobrenome, email, senha ou confirmação), ele será exibido diretamente abaixo do campo correspondente.

3. Campos do Formulário
   - **Forename:** Campo para o nome do membro.
   - **Surname:** Campo para o sobrenome do membro.
   - **Email:** Campo para o endereço de email do membro.
   - **Password:** Campo para a senha do membro.
   - **Confirm Password:** Campo para confirmar a senha do membro.
   - Cada campo é preenchido com o valor anterior, caso haja erro no formulário, utilizando a diretiva `old()`. Isso permite que o usuário corrija seus dados sem precisar preencher novamente todos os campos.

4. Proteção CSRF
   - A diretiva `@csrf` inclui um token de segurança, protegendo o formulário contra ataques CSRF (Cross-Site Request Forgery).

5. Considerações sobre a Usabilidade
   - O formulário é simples e direto, com validação para campos essenciais como nome, sobrenome, email e senha.
   - A exibição de erros ao lado dos campos problemáticos facilita para o usuário corrigir rapidamente os dados.

6. Sugestões de Melhoria
   - **Validação de Email:** Adicionar uma validação para verificar se o email já está registrado, para evitar registros duplicados.
   - **Força de Senha:** Implementar uma validação adicional para garantir que a senha tenha uma complexidade mínima (ex: letras maiúsculas, números, caracteres especiais).
   - **Feedback de Sucesso:** Após o envio bem-sucedido do formulário, pode-se redirecionar o usuário para uma página de confirmação ou de login, com uma mensagem de sucesso.

7. Observações
   - O controlador responsável pela rota 'register' deve tratar a validação dos dados e o registro no banco de dados.
   - É importante que a senha e a confirmação de senha coincidam antes de realizar o armazenamento no banco de dados, para garantir que a senha seja corretamente configurada.

--}}
