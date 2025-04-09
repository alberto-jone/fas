@extends('admin.layouts.app')

@section('content')

<main class="container" id="content">
    <section class="header">
        <h1>Admin</h1>
    </section>
    <table class="admin">
        <tr><th></th><th>Count</th><th class="create">Create</th><th class="view">View</th></tr>
        <tr><td><strong>Categories</strong></td><td>{{ $category_count }}</td><td><a href="{{ url('admin/category') }}" class="btn btn-primary">Add</a></td><td><a href="{{ url('admin/categories') }}" class="btn btn-primary">View</a></td></tr>
        <tr><td><strong>Articles</strong></td><td>{{ $article_count }}</td><td><a href="{{ url('admin/article') }}" class="btn btn-primary">Add</a></td><td><a href="{{ url('admin/articles') }}" class="btn btn-primary">View</a></td></tr>
        <tr><td><strong>Members</strong></td><td>{{ $member_count }}</td><td></td><td><a href="{{ url('admin/members') }}" class="btn btn-primary">View</a></td></tr>
    </table>
</main>

@endsection