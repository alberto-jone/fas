@extends('admin.layouts.app')

@section('content')
<main class="container" id="content">
    <section class="header">
        <h1>Members</h1>
        @if ($success) <div class="alert alert-success">{{ $success }}</div> @endif
        @if ($failure) <div class="alert alert-danger">{{ $failure }}</div> @endif
    </section>
    <table class="table table-striped">
        <tr>
            <th>Profile picture</th><th>Forename</th><th>Surname</th><th>Role</th><th>Edit role</th>
        </tr>
        @foreach ($members as $member)
            <tr>
                <td>
                    @if ($member->picture)
                        <img src="{{ asset('uploads/' . $member->picture) }}" alt="{{ $member->forename }}" class="profile" />
                    @else
                        <img src="{{ asset('uploads/member.png') }}" alt="" class="profile" />
                    @endif
                </td>
                <td>{{ $member->forename }}</td>
                <td>{{ $member->surname }}</td>
                <td>{{ $member->role }}</td>
                <td><a href="{{ url('admin/edit-role/' . $member->id) }}" class="btn btn-primary">Edit role</a></td>
            </tr>
        @endforeach
    </table>
</main>
@endsection