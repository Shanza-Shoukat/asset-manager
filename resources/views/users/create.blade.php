@extends('layouts.app')

@section('title', 'Add User')

@section('content')
    <h1>Add User</h1>

    <form method="POST" action="{{ route('users.store') }}" class="card card-body">
        @csrf

        <label class="form-label">Name</label>
        <input name="name" value="{{ old('name') }}" class="form-control mb-3">
        @error('name') <div class="text-danger mb-2">{{ $message }}</div> @enderror

        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control mb-3">
        @error('email') <div class="text-danger mb-2">{{ $message }}</div> @enderror

        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control mb-3">
        @error('password') <div class="text-danger mb-2">{{ $message }}</div> @enderror

        <label class="form-label">Status</label>
        <select name="active" class="form-select mb-3">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>

        <div>
            <button class="btn btn-primary">Save User</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
