@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Users</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
    </div>

    <div class="card">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->active ? 'Active' : 'Inactive' }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form method="POST" action="{{ route('users.destroy', $user) }}"
                                  onsubmit="return confirm('Delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">No users added yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
            {{ $users->links() }}

@endsection
