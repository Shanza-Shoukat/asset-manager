@extends('layouts.app')

@section('title', 'Assets')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Assets</h1>
        <a href="{{ route('assets.create') }}" class="btn btn-primary">Add Asset</a>
    </div>

    <div class="card">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Asset tag</th>
                    <th>Serial number</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($assets as $asset)
                    <tr>
                        <td>{{ $asset->name }}</td>
                        <td>{{ $asset->asset_tag }}</td>
                        <td>{{ $asset->serial_number }}</td>
                        <td>{{ $asset->category }}</td>
                        <td>{{ $asset->status }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('assets.edit', $asset) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form method="POST" action="{{ route('assets.destroy', $asset) }}"
                                onsubmit="return confirm('Delete this asset?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                        <td>
                            @if ($asset->status === 'Available')
                                <button type="button"
                                    onclick="document.getElementById('assign-{{ $asset->id }}').showModal()">
                                    Assign
                                </button>

                                <dialog id="assign-{{ $asset->id }}">
                                    <h3>Assign {{ $asset->name }}</h3>

                                    <form method="POST" action="/assets/{{ $asset->id }}/assign">
                                        @csrf

                                        <select name="user_id" class="form-select mb-3" required>
                                            <option value="">Select user</option>

                                            @foreach ($assignableUsers as $user)
                                                <option value="{{ $user->id }}">
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <button class="btn btn-primary" type="submit">Assign</button>
                                        <button class="btn btn-danger" type="button"
                                            onclick="this.closest('dialog').close()">Cancel</button>
                                    </form>
                                </dialog>
                            @else
                                <form method="POST" action="/assets/{{ $asset->id }}/unassign">
                                    @csrf
                                    <button type="submit">Unassign</button>
                                </form>

                                <small>Assigned to: {{ $asset->currentAssignment?->user?->name }}</small>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">not added yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
