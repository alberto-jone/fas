@extends('layouts.app')

@section('title', 'Password Reset')

@section('content')
<main class="container" id="content">
    {{-- Verifica se o email de reset de senha foi enviado --}}
    @if ($sent == false)
        {{-- Formulário para enviar um email de redefinição de senha --}}
        <form method="POST" action="{{ url('password-lost') }}" class="form-membership">
            @csrf {{-- Token CSRF para proteção --}}

            {{-- Título da página --}}
            <h1>Forgot your password?</h1>

            {{-- Campo de entrada para o endereço de email --}}
            <label for="email">Enter your email address: </label>
            <input type="text" name="email" id="email" class="form-control"><br>

            {{-- Botão de envio para enviar o email de redefinição de senha --}}
            <input type="submit" name="submit" value="Send email to reset password" class="btn">

            {{-- Exibição de erros caso existam --}}
            <span class="errors">{{ $error }}</span><br>
        </form>
    @else
        {{-- Mensagem exibida após o envio do email de redefinição de senha --}}
        <p>If your address is registered, we will email instructions to reset your password.</p>
    @endif
</main>
@endsection

{{--
====================================================================
DOCUMENTAÇÃO INTERNA — REDIFINIÇÃO DE SENHA
Autor: Alberto Jone João
Email: alberto.jone.joao@gmail.com
Data: 09 de Abril de 2025
Hora: 15h00
====================================================================

1. Estrutura e Funcionalidade
   - Este trecho de código Blade exibe um formulário para o usuário solicitar a redefinição de sua senha via email.
   - A funcionalidade é dividida em duas seções: uma para quando o email de redefinição ainda não foi enviado e outra para confirmar que a solicitação foi feita.

2. Lógica de Funcionamento
   - **Verificação de Envio:** O código começa verificando se o valor de `$sent` é `false`, indicando que o email de redefinição ainda não foi enviado. Se for `true`, será exibida uma mensagem informando que as instruções foram enviadas ao email.
   - **Formulário de Solicitação:** Caso o email ainda não tenha sido enviado, um formulário é exibido onde o usuário deve inserir seu email para solicitar a redefinição da senha.
   - **Campo de Email:** O formulário contém um campo de entrada para o usuário digitar o seu endereço de email. Se houver um erro no envio ou no preenchimento, uma mensagem de erro será exibida abaixo do campo de email.

3. Exibição de Erros
   - **Erro de Validação:** Caso haja um erro no preenchimento do campo de email (como um endereço de email inválido ou não registrado), o erro é mostrado dentro do `<span class="errors">{{ $error }}</span>`.
   - **Erros de Backend:** Os erros são capturados e exibidos para o usuário de forma clara, ajudando na correção.

4. Submissão do Formulário
   - **Ação do Formulário:** O formulário é enviado via método POST para a URL `password-lost`, que deve processar a solicitação de redefinição de senha.
   - **Token CSRF:** O formulário inclui o token CSRF (`@csrf`) para proteger contra ataques de falsificação de requisição.

5. Sugestões de Melhoria
   - **Validação do Formulário:** A validação do email pode ser melhorada com a inclusão de JavaScript, para fornecer uma validação de formato de email antes do envio.
   - **Feedback Visível:** O feedback pode ser melhorado com mensagens de sucesso ou erro mais detalhadas, como "Email não encontrado" ou "Instruções enviadas com sucesso".
   - **Links Úteis:** Considerar adicionar links para login ou para uma página de ajuda, caso o usuário tenha dificuldades em redefinir sua senha.

6. Observações
   - A URL de ação `password-lost` deve ser tratada no controlador, onde o processo de envio do email será realizado.
   - É importante garantir que o email enviado contenha um link seguro para a redefinição da senha e que o processo seja realizado de maneira segura.

--}}
