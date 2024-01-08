<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.css', 'resources/js/app.js'])
    <title>FlowSheet - @yield('title')</title>
</head>
<body>
    @php
        $routeName = request()->route()->getName();
    @endphp
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a href="{{ route('home') }}" class="navbar-brand">FlowSheet</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @auth
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a @class(['nav-link', 'active' => str_starts_with($routeName, 'project.')]) href="{{ route('project.index') }}">Projets</a>
                        </li>
                        <li class="nav-item">
                            <a @class(['nav-link', 'active' => str_starts_with($routeName, 'type.')]) href="{{ route('type.index') }}">Types</a>
                        </li>
                        <li class="nav-item">
                            <a @class(['nav-link', 'active' => str_starts_with($routeName, 'tag.')]) href="{{ route('tag.index') }}">Tags</a>
                        </li>
                    </ul>
                    <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <a href="" class="nav-link active">{{ Auth::user()->name }}</a>
                        <form class="nav-item" action="{{ route('auth.logout') }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="nav-link">Se déconnecter</button>
                        </form>
            @endauth
            @guest
                        <div class="nav-item">
                            <a href="{{ route('auth.login') }}" class="nav-link">Se connecter</a>
                        </div>
            @endguest
                    </div>
                </div>
        </div>
    </nav>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    @yield('content')
</body>
</html>
