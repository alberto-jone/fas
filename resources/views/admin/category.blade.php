@extends('admin.layouts.app')

@section('content')
<main class="container admin" id="content">
    <form action="{{ url('admin/category/' . $category->id) }}" method="POST" class="narrow">
        @csrf
        <h1>Edit Category</h1>
        @if ($errors->has('warning')) <div class="alert alert-danger">{{ $errors->first('warning') }}</div> @endif

        <div class="form-group">
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}">
            <span class="errors">{{ $errors->first('name') }}</span>
        </div>

        <div class="form-group">
            <label for="description">Description: </label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $category->description) }}</textarea>
            <span class="errors">{{ $errors->first('description') }}</span>
        </div>

        <div class="form-check">
            <input type="checkbox" name="navigation" id="navigation" class="form-check-input" value="1" @if ($category->navigation) checked @endif>
            <label for="navigation" class="form-check-label" for="navigation">Navigation</label>
        </div>

        <input type="submit" name="create" value="save" class="btn btn-primary">
    </form>
</main>
@endsection