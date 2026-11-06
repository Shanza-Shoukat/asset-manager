@extends('layouts.app')

@section('title', 'Edit Asset')

@section('content')
    <h1>Edit Asset</h1>

    <form method="POST" action="{{ route('assets.update', $asset) }}" class="card card-body">
        @csrf
        @method('PUT')

        <label class="form-label">Name</label>
        <input name="name" value="{{ old('name', $asset->name) }}" class="form-control mb-3">
        @error('name')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror

        <label class="form-label">Asset tag</label>
        <input name="asset_tag" value="{{ old('asset_tag', $asset->asset_tag) }}" class="form-control mb-3">
        @error('asset_tag')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror

        <label class="form-label">Serial number</label>
        <input name="serial_number" value="{{ old('serial_number', $asset->serial_number) }}" class="form-control mb-3">
        @error('serial_number')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror

        <label class="form-label">Category</label>
        <input name="category" value="{{ old('category', $asset->category) }}" class="form-control mb-3">

        @error('category')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror

        <div>
            <button class="btn btn-primary">Update asset</button>
            <a href="{{ route('assets.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
