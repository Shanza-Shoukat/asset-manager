@extends('layouts.app')

@section('title', 'Add asset')

@section('content')
    <h1>Add asset</h1>

    <form action="{{ route('assets.store') }}" class="card card-body" method="POST">
        @csrf

        <label class="form-label">Name</label>
        <input name="name" value="{{ old('name') }}" class="form-control mb-3">
        @error('name')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror
        <label class="form-label">Asset tag</label>
        <input name="asset_tag" value="{{ old('asset_tag') }}" class="form-control mb-3">
        @error('asset_tag')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror

        <label class="form-label">Serial Number</label>
        <input name="serial_number" value="{{ old('serial_number') }}" class="form-control mb-3">
        @error('serial_number')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror

        <label class="form-label">Category</label>
        <input name="category" value="{{ old('category') }}" class="form-control mb-3">
        @error('category')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror

        <div>
            <button class="btn btn-primary">Save asset</button>
            <a href="{{ route('assets.index') }}" class="btn btn-secondary">cncel</a>
        </div>
    </form>
@endsection
