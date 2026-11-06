@extends('layouts.app')

@section('title', 'login page')

@section('content')
{{-- <div class="d-flex justify-content-center align-items-center"></div> --}}
 <div class="card mx-auto mt-5" style="max-width:400px">
    <div class="card-body">
        <h1 class="h3 mb-3">login page</h1>
        <form action="{{ route('login.submit') }}" method="post">
            @csrf
            <label for="email" class="form-label">email</label>
            <input type="email" id="email" value="{{ old('email') }}" class="form-control" name="email">
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror

            <label for="password" class="form-label">pass</label>
            <input type="password" id="password" class="form-control" name="password">
            @error('password')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <button class="btn btn-primary mt-3">login btn</button>

        </form>
    </div>
 </div>



@endsection
