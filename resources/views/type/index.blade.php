@extends('base')

@section('title', 'Types')

@section('content')
    <h1>Types</h1>
    @foreach($types as $type)
        <div class="container-fluid">
            <h3>{{ $type->name }}</h3>
            <p>
                <a href="{{ route('type.show', ['type' => $type->id]) }}" class="btn btn-primary">Voir</a>
            </p>
        </div>
    @endforeach
    {{ $types->links() }}
    <div>
        <a href="{{ route('type.create') }}" class="btn btn-primary">Nouveau</a>
    </div>
@endsection
