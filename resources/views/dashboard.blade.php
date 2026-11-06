@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<style>

</style>
    <h1 class="mb-4">Dashboard</h1>

    <div class="row g-3">
        <div class="col-4">
            <div class="card card-body">
                <h5>Total Assets</h5>
                <h2>{{ $total }}</h2>
            </div>
        </div>

        <div class="col-4">
            <div class="card card-body">
                <h5>Available</h5>
                <h2>{{ $available }}</h2>
            </div>
        </div>

        <div class="col-4">
            <div class="card card-body">
                <h5>Assigned</h5>
                <h2>{{ $assigned }}</h2>
            </div>
        </div>
    </div>

    <a href="{{ route('assets.index') }}" class="btn btn-primary mt-3">view Assets</a>
@endsection
