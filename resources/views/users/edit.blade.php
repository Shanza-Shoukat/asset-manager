@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <h1>Edit User</h1>

    <form method="POST" action="{{ route('users.update', $user) }}" class="card card-body">
        @csrf
        @method('PUT')

        <label class="form-label">Name</label>
        <input name="name" value="{{ old('name', $user->name) }}" class="form-control mb-3">
        @error('name') <div class="text-danger mb-2">{{ $message }}</div> @enderror

        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control mb-3">
        @error('email') <div class="text-danger mb-2">{{ $message }}</div> @enderror

        <label class="form-label">New password (optional)</label>
        <input type="password" name="password" class="form-control mb-3">
        @error('password') <div class="text-danger mb-2">{{ $message }}</div> @enderror

        <label class="form-label">Status</label>
        <select name="active" class="form-select mb-3">
            <option value="1" @selected((string) old('active', $user->active) === '1')>Active</option>
            <option value="0" @selected((string) old('active', $user->active) === '0')>Inactive</option>
        </select>

        <div>
            <button class="btn btn-primary">Update User</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
