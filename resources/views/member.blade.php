@extends('layouts.app')

@section('title', $member->forename . ' ' . $member->surname)
@section('description', e($member->forename) . ' ' . e($member->surname) . ' on Creative Folk')

@section('content')
<main class="container" id="content">

    {{-- Seção de cabeçalho que exibe as informações do membro --}}
    <section class="header">
        {{-- Nome completo do membro --}}
        <h1>{{ $member->forename }} {{ $member->surname }}</h1>

        {{-- Data de adesão do membro, formatada para exibição --}}
        <p class="member"><b>Member since:</b> {{ $member->joined->format('F d, Y') }}</p>

        {{-- Verifica se o membro tem uma imagem de perfil e a exibe --}}
        @if ($member->picture)
            <img src="{{ asset('uploads/' . $member->picture) }}" alt="{{ $member->forename }}"><br>
        @else
            {{-- Se o membro não tiver imagem de perfil, exibe uma imagem padrão --}}
            <img src="{{ asset('uploads/member.png') }}" alt="" class="profile"><br>
        @endif

        {{-- Exibe uma mensagem de sucesso se houver --}}
        @if ($success) <div class="alert alert-success">{{ $success }}</div> @endif

        {{-- Exibe opções para o próprio membro editar informações ou adicionar trabalho --}}
        @if (session('id') == $member->id)
            <nav class="member-options">
                {{-- Link para adicionar trabalho --}}
                <a href="{{ url('work') }}" class="btn btn-primary">Add work</a>

                {{-- Link para editar o perfil do membro --}}
                <a href="{{ url('member-edit-profile') }}" class="btn btn-primary">Edit profile</a>

                {{-- Link para alterar a foto do perfil --}}
                <a href="{{ url('member-edit-picture') }}" class="btn btn-primary">Profile picture</a>
            </nav>
        @endif
    </section>

    {{-- Seção de artigos relacionados ao membro --}}
    <section class="grid">
        {{-- Inclui resumos de artigos relacionados ao membro --}}
        @include('article-summaries')
    </section>

</main>
@endsection

{{--
====================================================================
DOCUMENTAÇÃO INTERNA — PERFIL DO MEMBRO
Autor: Alberto Jone João
Email: alberto.jone.joao@gmail.com
Data: 09 de Abril de 2025
Hora: 13h20
====================================================================

1. Estrutura e Funcionalidade
   - Este ficheiro Blade exibe o perfil do membro com informações básicas, como nome, sobrenome, data de adesão e imagem de perfil.
   - O formulário permite que o próprio membro visualize suas informações e tenha a opção de editar seu perfil ou adicionar conteúdo.
   - Há também um sistema de mensagens de sucesso que é exibido quando certas ações, como uma atualização de perfil, são realizadas com sucesso.

2. Exibição de Imagem de Perfil
   - A imagem de perfil do membro é verificada para garantir que, caso o membro tenha uma imagem associada, ela seja exibida. Caso contrário, uma imagem padrão será mostrada.
   - As imagens são carregadas da pasta `uploads/`.

3. Funcionalidades de Navegação
   - Quando o membro está autenticado (verificado pela sessão), ele terá links de navegação para editar seu perfil, adicionar trabalho ou alterar a imagem de perfil.
   - Estes links são exibidos apenas para o próprio membro, utilizando a comparação entre a sessão do usuário e o ID do membro.

4. Considerações de Usabilidade
   - A interface permite que o membro visualize suas informações de maneira simples e clara.
   - As mensagens de sucesso são exibidas quando a operação é bem-sucedida, melhorando a experiência do usuário.

5. Sugestões de Melhoria
   - Incluir uma seção para que o membro adicione outras informações de perfil, como biografia ou redes sociais.
   - Implementar mais validação e feedback visual no processo de upload de imagem de perfil.
   - Melhorar o design da interface com mais opções de personalização para o usuário.

6. Observações
   - O controlador que gerencia a lógica para editar o perfil, alterar a foto ou adicionar trabalhos precisa ser tratado nas rotas correspondentes.
   - As imagens e outros dados do membro são recuperados dinamicamente do banco de dados para exibição na página.
--}}

