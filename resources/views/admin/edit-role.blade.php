@extends('admin.layouts.app')

@section('content')
<main class="container" id="content">
    <form action="{{ url('admin/edit-role/' . $member->id) }}" method="POST" class="narrow">
        @csrf
        <h1>Edit Role</h1>
        <p>Member name: {{ $member->forename }} {{ $member->surname }}</p>
        <select name="role" class="form-control">
            <option value="member" @if ($member->role == 'member') selected @endif>Member</option>
            <option value="admin" @if ($member->role == 'admin') selected @endif>Admin</option>
            <option value="suspended" @if ($member->role == 'suspended') selected @endif>Suspended</option>
        </select><br>
        <input type="submit" value="Update role" class="btn btn-primary" />
    </form>
</main>
@endsection