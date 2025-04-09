@extends('admin.layouts.app')

@section('content')

<main class="container" id="content">
    <section class="header">
        <h1>Categories</h1>
        @if ($success) <div class="alert alert-success">{{ $success }}</div> @endif
        @if ($failure) <div class="alert alert-danger">{{ $failure }}</div> @endif
        <p><a href="{{ url('admin/category') }}" class="btn btn-primary">Add new category</a></p>
    </section>
    <table class="categories">
        <tr>
            <th>Name</th>
            <th class="edit">Edit</th>
            <th class="del">Delete</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td><strong>{{ $category->name }}</strong></td>
                <td><a href="{{ url('admin/category/' . $category->id) }}" class="btn btn-primary">edit</a></td>
                <td><a href="{{ url('admin/category-delete/' . $category->id) }}" class="btn btn-danger">delete</a></td>
            </tr>
        @endforeach
    </table>
</main>

@endsection