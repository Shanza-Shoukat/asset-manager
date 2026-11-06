<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'asset management dashboard')</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body class="bg-light">
    @auth
        <nav class="navbar bg-dark" data-bs-theme="dark">
            <div class="container">
                {{-- <a href="{{ route('/') }}" class="navbar-brand">Asset manager</a> --}}
                <a href="/" class="navbar-brand">Asset manager</a>

                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('users.index') }}" class="nav-link text-white">users</a>
                    <a href="{{ route('assets.index') }}" class="nav-link text-white">assets</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-light btn-sm">logout</button>
                    </form>
                </div>
            </div>
        </nav>
    @endauth
    <main class="container py-5">
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

        @endif
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>
