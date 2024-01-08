@extends('base')

@section('title', 'Accueil des pièces')

@section('content')
    <h1>Pièces</h1>
    @foreach ($pieces as $piece)
        <div class="container-fluid">
            <h3>{{ $piece->name }}</h3>
            <p>
                Projet : {{ $piece->project?->name }}
            </p>
            <p>
                <a href="{{ route('piece.show', ['slug' => $piece->slug, 'piece' => $piece->id]) }}" class="btn btn-primary">Lire la suite</a>
            </p>
        </div>
    @endforeach
    {{ $pieces->links() }}
    <div>
        <a href="{{ route('piece.create') }}" class="btn btn-primary">Nouvelle pièce</a>
    </div>
@endsection
