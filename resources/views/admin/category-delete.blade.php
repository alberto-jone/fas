@extends('admin.layouts.app')

@section('content')

<main class="container admin" id="content">
    <form action="{{ url('admin/category-delete/' . $category->id) }}" method="POST" class="narrow">
        @csrf
        <h1>Delete Category</h1>
        <p>Click confirm to delete the category: <em>{{ $category->name }}</em></p>
        <input type="submit" name="delete" value="confirm" class="btn btn-primary" />
        <a href="{{ url('admin/categories') }}" class="btn btn-danger">cancel</a>
    </form>
</main>

@endsection