@extends('layouts.app')

@section('title', 'Update Password')

@section('content')
<main class="container" id="content">
    {{-- Seção de cabeçalho com o título "Reset Password" --}}
    <section class="header"><h1>Reset Password</h1></section>

    {{-- Formulário para redefinir a senha --}}
    <form method="POST" action="{{ url('?token=' . $token) }}" class="form-membership">
        @csrf {{-- Token CSRF para proteção contra ataques de falsificação de requisição --}}

        {{-- Exibe mensagem de erro, caso haja, relacionada à chave 'message' --}}
        @if ($errors->has('message'))
            <div class="alert alert-danger">{{ $errors->first('message') }}</div>
        @endif

        {{-- Campo para nova senha --}}
        <div class="form-group">
            <label for="password">Enter Your New Password:</label>
            <input type="password" name="password" id="password" class="form-control">
            {{-- Exibe o primeiro erro relacionado ao campo 'password', se houver --}}
            <span class="errors">{{ $errors->first('password') }}</span><br>
        </div>

        {{-- Campo para confirmação da nova senha --}}
        <div class="form-group">
            <label for="confirm">Confirm Your Password:</label>
            <input type="password" name="confirm" id="confirm" class="form-control">
            {{-- Exibe o primeiro erro relacionado ao campo 'confirm', se houver --}}
            <span class="errors">{{ $errors->first('confirm') }}</span><br>
        </div>

        {{-- Botão para submeter o formulário e enviar as novas senhas --}}
        <input type="submit" value="Submit New Password" class="btn">
    </form>
</main>
@endsection

{{--
====================================================================
DOCUMENTAÇÃO INTERNA — REDEFINIÇÃO DE SENHA
Autor: Alberto Jone João
Email: alberto.jone.joao@gmail.com
Data: 09 de Abril de 2025
Hora: 15h30
====================================================================

1. Estrutura e Funcionalidade
   - Este trecho de código Blade exibe um formulário que permite ao usuário redefinir sua senha.
   - A redefinição da senha é feita por meio de um token, que é passado como parâmetro na URL.

2. Lógica de Funcionamento
   - **Token de Segurança:** O formulário envia uma solicitação para a URL que inclui um parâmetro `?token=`, onde o token é usado para verificar se a solicitação é válida.
   - **Campos de Senha:** O formulário contém dois campos de entrada:
     - O primeiro campo permite que o usuário insira a nova senha.
     - O segundo campo permite que o usuário confirme a senha inserida.
   - Ambos os campos exigem que o usuário insira senhas correspondentes, garantindo que a senha não tenha sido digitada incorretamente.

3. Exibição de Erros
   - **Erros de Validação:** Se o usuário tentar enviar o formulário com uma senha inválida ou com senhas que não coincidam, as mensagens de erro serão exibidas abaixo de cada campo de senha.
   - **Erro Geral:** Caso haja um erro com a chave `message`, ele será exibido no topo do formulário, com a classe `alert alert-danger` para destacar o erro.

4. Submissão do Formulário
   - O formulário é enviado via método POST para a URL que contém o token, que é utilizado para verificar a identidade da solicitação.
   - **Proteção CSRF:** A diretiva `@csrf` inclui um token de segurança para proteger contra ataques CSRF (Cross-Site Request Forgery).

5. Sugestões de Melhoria
   - **Validação Adicional no Front-end:** A validação de senha pode ser aprimorada com JavaScript para garantir que a senha tenha a força necessária (exemplo: incluir letras, números e caracteres especiais).
   - **Feedback Mais Detalhado:** Melhorar a exibição dos erros com mensagens mais detalhadas, como "Senhas não coincidem" ou "Senha muito fraca".

6. Observações
   - O token enviado na URL é essencial para garantir que a solicitação de redefinição de senha seja legítima e que o usuário tenha o direito de alterar a senha associada a esse token.
   - A URL de ação `?token={{ $token }}` é dinâmica, pois o valor do token será gerado e passado para o formulário pelo controlador correspondente.
   - O controlador deve validar o token, verificar se ele é válido, e então permitir que o usuário redefina a senha.

--}}
