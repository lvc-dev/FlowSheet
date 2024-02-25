@extends('base')

@section('title', $piece->name)

@section('content')
    <article>
        <h2 class="text-decoration-underline text-center mb-5 mt-3">{{ $piece->name }}</h2>
        <p class="text-start">
            Projet : {{ $piece->project->name}}
        </p>
        <p class="text-start">
            Quantité : {{ $piece->quantity }}
        </p>
        @if ($piece->width !== null && $piece->height !== null && $piece->thickness !== null)
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <caption>Dimension :</caption>
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Longueur</th>
                            <th scope="col">Largeur</th>
                            <th scope="col">Epaisseur</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr class="text-center">
                            <td>{{ $piece->width }}</td>
                            <td>{{ $piece->height}}</td>
                            <td>{{ $piece->thickness }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        <p>
            @if ($piece->material != null)
                Matériaux : {{ $piece->material }}
            @endif
        </p>
        <p>
            @if ($piece->description != null )
                Description : {{ $piece->description }}
            @endif
        </p>
    </article>
    <a href="{{ route('piece.edit', ['piece' => $piece->id]) }}" class="btn btn-primary">Modifier</a>
    <a href="{{ route('project.show', ['slug' => $piece->project->slug, 'project' => $piece->project->id]) }}" class="btn btn-warning">Retour</a>
    <a href="#" class="btn btn-danger">Supprimer</a>
@endsection
