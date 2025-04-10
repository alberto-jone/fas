{{-- Estende o layout principal da aplicação --}}
@extends('layouts.app')

{{-- Início da seção de conteúdo da página --}}
@section('content')
<main class="container" id="content">

    {{-- Cabeçalho da página de contacto --}}
    <section class="header">
        <h1>Contact us</h1>
    </section>

    {{-- Formulário de contacto que envia os dados via método POST para a rota "contact.store" --}}
    <form method="POST" action="{{ route('contact.store') }}" class="form-contact">
        {{-- Proteção contra CSRF (cross-site request forgery) --}}
        @csrf

        {{-- Exibe uma mensagem de alerta caso haja erro geral (chave "warning") --}}
        @if ($errors->has('warning'))
            <div class="alert alert-danger">{{ $errors->first('warning') }}</div>
        @endif

        {{-- Exibe uma mensagem de sucesso se o envio do formulário for bem-sucedido --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Campo do e-mail do utilizador --}}
        <div class="form-group">
            <label for="email">Email: </label>

            {{-- Campo de input com preenchimento automático baseado no valor anterior ou numa variável "from" --}}
            <input type="text" name="email" id="email" value="{{ old('email', $from ?? '') }}" class="form-control">

            {{-- Exibição do primeiro erro de validação relacionado ao campo "email" --}}
            <span class="errors">{{ $errors->first('email') }}</span><br>
        </div>

        {{-- Campo da mensagem do utilizador --}}
        <div class="form-group">
            <label for="message">Message: </label><br>

            {{-- Textarea com preenchimento automático baseado no valor anterior ou numa variável "message" --}}
            <textarea id="message" name="message" class="form-control">{{ old('message', $message ?? '') }}</textarea>

            {{-- Exibição do primeiro erro de validação relacionado ao campo "message" --}}
            <span class="errors">{{ $errors->first('message') }}</span><br>
        </div>

        {{-- Botão de submissão do formulário --}}
        <input type="submit" value="Submit Message" class="btn">
    </form>
</main>
@endsection

{{--
====================================================================
DOCUMENTAÇÃO INTERNA — PÁGINA DE CONTACTO
Autor: Alberto Jone João
Email: alberto.jone.joao@gmail.com
Data: 09 de Abril de 2025
Hora: 22h45
====================================================================

1. Estrutura
    - O ficheiro estende o layout principal da aplicação (layouts/app.blade.php).
    - Define uma secção de conteúdo principal onde está localizado o formulário de contacto.
    - O formulário inclui campos para o e-mail do utilizador e a mensagem a ser enviada.

2. Funcionalidades principais
    - Proteção contra ataques CSRF com o uso do `@csrf`.
    - Exibe mensagens de erro caso haja falhas na validação dos campos.
    - Exibe uma mensagem de sucesso após o envio bem-sucedido do formulário.
    - Preenche automaticamente os campos com valores anteriores ou variáveis.

3. Considerações de segurança
    - O uso de `@csrf` garante proteção contra falsificação de requisições.
    - Exibe erros de validação diretamente abaixo dos campos correspondentes.

4. Usabilidade
    - O formulário é simples e direto, facilitando a interação do utilizador.
    - As mensagens de erro e sucesso são claramente visíveis para orientar o utilizador.

5. Sugestões futuras
    - Considerar a adição de uma verificação de CAPTCHA para evitar o envio de spam.
    - Adicionar uma validação mais robusta no backend para garantir a validade do e-mail.

--}}
