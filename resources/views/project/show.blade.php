@extends('base')

@section('title', $project->name)

@section('content')
    <article>
        <h1 class="mb-5 mt-3">{{ $project->name }}</h1>
        <p>
            @if (!$project->tags->isEmpty())
                @foreach ($project->tags as $tag)
                    <span class="badge bg-secondary">{{ $tag->name }}</span>
                @endforeach
            @endif
        </p>
        <p>Type : {{ $project->type?->name }}</p>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped caption-top">
                <caption>Pièces :</caption>
                <thead>
                    <tr class="text-center">
                        <th scope="col">Nom</th>
                        <th scope="col">Longueur</th>
                        <th scope="col">Largeur</th>
                        <th scope="col">Epaisseur</th>
                        <th scope="col">Epaisseur</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($pieces as $piece)
                        @if ($piece->project_id === $project->id)
                        <tr class="text-center">
                            <td>{{ $piece->name }}</td>
                            <td>{{ $piece->width }}</td>
                            <td>{{ $piece->height }}</td>
                            <td>{{ $piece->thickness }}</td>
                            <td><a href="{{ route('piece.show', ['slug' => $piece->slug, 'piece' => $piece->id]) }}" class="btn btn-primary">Voir</a></td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </article>
    <div>
        <a href="{{ route('project.index') }}" class="btn btn-danger">Retour</a>
        <a href="{{ route('piece.create') }}" class="btn btn-success">Nouvelle pièce</a>
    </div>
@endsection
