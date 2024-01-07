@extends('base')

@section('title', $type->name)

@section('content')
    <article>
        <h2 class="text-decoration-underline text-center mb-5">{{ $type->name }}</h2>
    </article>
    <a href="{{ route('type.edit', ['type' => $type->id]) }}" class="btn btn-primary">Modifier</a>
    <a href="{{ route('type.index')}}" class="btn btn-primary">Retour</a>
{{--    <a href="#" class="btn btn-danger">Supprimer</a>--}}
@endsection
