@extends('base')

@section('title', $tag->name)

@section('content')
    <article>
        <h2 class="text-decoration-underline text-center mb-5">{{ $tag->name }}</h2>
    </article>
    <a href="{{ route('tag.edit', ['tag' => $tag->id]) }}" class="btn btn-primary">Modifier</a>
    <a href="{{ route('tag.index')}}" class="btn btn-primary">Retour</a>
    <a href="#" class="btn btn-danger">Supprimer</a>
@endsection
