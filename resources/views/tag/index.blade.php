@extends('base')

@section('title', 'Accueil des tags')

@section('content')
    <h1 class="mb-5 mt-3">Tags</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped caption-top">
            <thead>
            <tr class="text-center">
                <th scope="col">Nom</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach ($tags as $tag)
                <tr class="text-center">
                    <td>{{ $tag->name }}</td>
                    <td><a href="{{ route('tag.edit', ['tag' => $tag->id]) }}" class="btn btn-primary">Modifier</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <a href="{{ route('tag.create') }}" class="btn btn-primary">Nouveau tag</a>
        <a href="{{ route('tag.export') }}" class="btn btn-warning">Exporter</a>
    </div>
@endsection
