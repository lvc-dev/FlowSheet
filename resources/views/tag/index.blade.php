@extends('base')

@section('title', 'Accueil des tags')

@section('content')
    <h1>Tags</h1>
    @foreach ($tags as $tag)
        <div class="container-fluid">
            <h3>{{ $tag->name }}</h3>
            <p>
                <a href="{{ route('tag.show', ['tag' => $tag->id]) }}" class="btn btn-primary">Lire la suite</a>
            </p>
        </div>
    @endforeach
    {{ $tags->links() }}
    <div>
        <a href="{{ route('tag.create') }}" class="btn btn-primary">Nouveau tag</a>
    </div>
@endsection
