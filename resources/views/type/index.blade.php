@extends('base')

@section('title', 'Types')

@section('content')
    <h1>Types</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped caption-top">
            <thead>
            <tr class="text-center">
                <th scope="col">Nom</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach ($types as $type)
                <tr class="text-center">
                    <td>{{ $type->name }}</td>
                    <td><a href="{{ route('type.edit', ['type' => $type->id]) }}" class="btn btn-primary">Modifier</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <a href="{{ route('type.create') }}" class="btn btn-primary">Nouveau</a>
    </div>
@endsection
