{{-- Estende o layout principal da aplicação --}}
@extends('layouts.app')

{{-- Define o título da página como "Profile picture" --}}
@section('title', 'Profile picture')

{{-- Início da secção de conteúdo da página --}}
@section('content')
<main class="container" id="content">

    {{-- Verifica se o membro já possui uma imagem de perfil --}}
    @if ($member->picture)

        {{-- Se existir imagem, mostra o formulário para eliminação --}}
        <section class="header">
            <h1>Delete picture</h1>
        </section>

        {{-- Formulário que envia uma requisição POST para remover a imagem de perfil --}}
        <form action="{{ url('member-edit-picture') }}" method="POST" class="form-membership">
            @csrf {{-- Proteção CSRF --}}

            {{-- Mensagem explicativa e exibição da imagem atual do perfil --}}
            <p class="center">
                Click delete to remove your profile picture: <br>
                <img src="{{ asset('uploads/' . $member->picture) }}" alt="{{ $member->forename }}" class="profile">
            </p>

            {{-- Botão para confirmar a eliminação da imagem --}}
            <input type="submit" name="delete" value="delete" class="btn btn-primary" />

            {{-- Botão para cancelar e voltar à página de perfil do membro --}}
            <a href="{{ url('member/' . $member->id) }}" class="btn btn-danger">cancel</a>
        </form>

    @else

        {{-- Se o membro ainda não tem imagem, mostra o formulário de upload --}}
        <section class="header">
            <h1>Upload picture</h1>
        </section>

        {{-- Formulário de upload de imagem com método POST e enctype necessário para envio de ficheiros --}}
        <form action="{{ url('member-edit-picture') }}" method="POST" enctype="multipart/form-data" class="form-membership">
            @csrf {{-- Proteção CSRF --}}

            {{-- Exibe uma mensagem de erro, caso existam erros de validação --}}
            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            {{-- Campo de seleção de ficheiro de imagem --}}
            <div class="form-group">
                <label for="image">Select profile picture:</label>
                <input type="file" name="image" id="image" />
            </div>

            {{-- Botão de submissão do formulário para fazer o upload da imagem --}}
            <input type="submit" name="upload" value="Upload" class="btn btn-primary" />
        </form>

    @endif
</main>
@endsection

{{--
====================================================================
DOCUMENTAÇÃO INTERNA — PÁGINA DE IMAGEM DE PERFIL
Autor: Alberto Jone João
Email: alberto.jone.joao@gmail.com
Data: 09 de Abril de 2025
Hora: 23h35
====================================================================

1. Estrutura e Funcionalidade
   - O ficheiro Blade permite que o membro edite a sua imagem de perfil, seja carregando uma nova imagem ou removendo a existente.
   - O código verifica se o membro já possui uma imagem de perfil (campo `picture` no objeto `$member`). Com base nisso, ele apresenta um formulário para upload ou um formulário para eliminação da imagem.

2. Formulário de Eliminação de Imagem
   - Se o membro já tem uma imagem de perfil, o sistema mostra a imagem atual e oferece uma opção para eliminá-la.
   - A requisição de eliminação é enviada para a mesma rota (`member-edit-picture`) usando o método POST, com um botão "delete" para confirmar a remoção da imagem.

3. Formulário de Upload de Imagem
   - Se o membro ainda não tiver imagem, o sistema oferece um formulário para enviar uma nova imagem de perfil.
   - O formulário usa o método POST com o tipo `multipart/form-data`, necessário para o envio de arquivos.
   - Se houver erros de validação (por exemplo, se o arquivo não for uma imagem ou for muito grande), o primeiro erro será mostrado ao utilizador.
   - O formulário possui um campo de input para selecionar a imagem e um botão para fazer o upload.

4. Validação de Erros
   - O sistema verifica a presença de erros utilizando a diretiva `@if ($errors->any())`. Caso existam erros, a primeira mensagem de erro será exibida dentro de um bloco de alerta vermelho.

5. Considerações sobre a Usabilidade
   - A interface do utilizador é simples, mostrando a imagem atual (caso exista) ou permitindo o upload de uma nova imagem de forma intuitiva.
   - A utilização do formulário para a exclusão da imagem é clara, com um botão de "cancelar" para voltar à página de perfil do membro sem fazer alterações.

6. Sugestões de Melhoria
   - Implementar uma funcionalidade de pré-visualização da imagem antes de realizar o upload, permitindo que o utilizador veja a imagem antes de confirmar o envio.
   - Adicionar suporte para outros tipos de arquivos de imagem (por exemplo, GIFs ou SVGs).
   - Usar AJAX para fazer o upload da imagem sem recarregar a página, melhorando a experiência do utilizador.

7. Observações
   - O controlador responsável pela rota `member-edit-picture` deve processar a requisição, seja para remover a imagem ou para salvar o novo arquivo de imagem no diretório de uploads.
   - A imagem deve ser armazenada no diretório apropriado no servidor, e o nome do arquivo deve ser salvo no banco de dados para referência futura.

--}}
