{{-- Estende o layout principal da aplicação --}}
@extends('layouts.app')

@section('title', 'Update profile')
@section('description', 'Update profile for Creative Folk')

@section('content')
<main class="container" id="content">

    <section class="header"><h1>Update profile</h1></section>
    <form method="POST" action="{{ url('member-edit-profile') }}" class="form-membership">
        @csrf

        {{-- Exibe uma mensagem de erro caso haja um erro com a chave 'message' --}}
        @if ($errors->has('message'))
            <div class="alert alert-danger">{{ $errors->first('message') }}</div>
        @endif

        {{-- Campo para o nome (forename) --}}
        <div class="form-group">
            <label for="forename">Forename: </label>
            <input type="text" name="forename" value="{{ old('forename', $member->forename ?? '') }}" id="forename" class="form-control" />
            {{-- Exibe o primeiro erro relacionado ao campo 'forename', se houver --}}
            <span class="errors">{{ $errors->first('forename') }}</span><br>
        </div>

        {{-- Campo para o sobrenome (surname) --}}
        <div class="form-group">
            <label for="surname">Surname: </label>
            <input type="text" name="surname" value="{{ old('surname', $member->surname ?? '') }}" id="surname" class="form-control" />
            {{-- Exibe o primeiro erro relacionado ao campo 'surname', se houver --}}
            <span class="errors">{{ $errors->first('surname') }}</span><br>
        </div>

        {{-- Campo para o email --}}
        <div class="form-group">
            <label for="email">Email address: </label>
            <input type="email" name="email" value="{{ old('email', $member->email ?? '') }}" id="email" class="form-control" />
            {{-- Exibe o primeiro erro relacionado ao campo 'email', se houver --}}
            <span class="errors">{{ $errors->first('email') }}</span><br>
        </div>

        {{-- Botão para submeter o formulário --}}
        <div class="form-group">
            <button type="submit" class="btn btn-primary">update</button>
        </div>

    </form>
</main>
@endsection

{{-- {{
====================================================================
DOCUMENTAÇÃO INTERNA — ATUALIZAÇÃO DE PERFIL
Autor: Alberto Jone João
Email: alberto.jone.joao@gmail.com
Data: 09 de Abril de 2025
Hora: 13h16
====================================================================

1. Estrutura e Funcionalidade
   - Este ficheiro Blade permite que o utilizador (membro) atualize as suas informações de perfil, como nome, sobrenome e email.
   - O formulário utiliza o método POST e envia as informações para a rota 'member-edit-profile', que deverá ser tratada no controlador correspondente.

2. Exibição de Erros
   - O código verifica se há erros de validação (via a variável `$errors`).
   - Caso existam erros relacionados ao envio do formulário (como dados inválidos), eles são mostrados diretamente abaixo dos campos de entrada correspondentes.
   - Além disso, uma mensagem de erro geral pode ser exibida se houver uma chave 'message' nos erros.

3. Campos do Formulário
   - **Forename**: Campo para o nome do membro (exibe o valor anterior em caso de erro).
   - **Surname**: Campo para o sobrenome do membro.
   - **Email**: Campo para o endereço de email do membro. O valor será pré-preenchido com o email do membro ou com o valor antigo, caso haja erro.
   - Todos os campos utilizam a diretiva `old()` para manter os dados preenchidos após um erro de validação, facilitando a correção pelo utilizador.

4. Submissão do Formulário
   - O formulário é enviado via método POST, utilizando o token CSRF para proteção contra ataques de falsificação de requisição.
   - O botão de envio chama-se "update" e é estilizado com a classe `btn btn-primary`.

5. Considerações sobre a Usabilidade
   - O formulário é simples e direto, com validação de campos essenciais, como nome, sobrenome e email.
   - A exibição dos erros diretamente ao lado dos campos problemáticos melhora a experiência do utilizador, permitindo que ele corrija facilmente os dados.

6. Sugestões de Melhoria
   - Adicionar mais campos de perfil, como número de telefone ou data de nascimento.
   - Implementar validação adicional do lado do cliente com JavaScript para uma experiência mais interativa.
   - Melhorar a acessibilidade com indicações claras para leitores de tela e uma validação mais detalhada (ex: formatos de email).

7. Observações
   - A rota `member-edit-profile` deverá ser tratada no controlador, onde os dados enviados serão validados e atualizados no banco de dados.
   - O controlador também deverá tratar a lógica de erros e sucesso, redirecionando o utilizador para a página de perfil ou exibindo uma mensagem de erro, conforme necessário.
}} --}}
