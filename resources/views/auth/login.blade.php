@extends('base')

@section('title', 'Login')

@section('content')
    <h1 class="mb-5 mt-3">Se connecter</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('auth.login') }}" method="post" class="vstack gap-3">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                    <label for="email">Email</label>
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password">
                    <label for="password">Mot de passe</label>
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
                <button class="btn btn-primary">Se connecter</button>
            </form>
        </div>
    </div>
@endsection
