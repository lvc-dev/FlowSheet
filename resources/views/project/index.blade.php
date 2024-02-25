@extends('base')

@section('title', 'Accueil des projets')

@section('content')
    <h1 class="mb-5 mt-3">Projets</h1>
    @foreach ($projects as $project)
        <div class="container-fluid">
            <h3>{{ $project->name }}</h3>
            <p class="small">Type : {{ $project->type?->name }}</p>
            <p>
                @if (!$project->tags->isEmpty())
                    @foreach ($project->tags as $tag)
                        <span class="badge bg-secondary">{{ $tag->name }}</span>
                    @endforeach
                @endif
            </p>
            <p>
                <a href="{{ route('project.show', ['slug' => $project->slug, 'project' => $project->id]) }}" class="btn btn-primary">Lire la suite</a>
                <a href="{{ route('project.edit', ['project' => $project->id]) }}" class="btn btn-warning">Modifier</a>
            </p>
            <hr>
        </div>
    @endforeach
    {{ $projects->links() }}
    <div>
        <a href="{{ route('project.create') }}" class="btn btn-primary">Nouveau projet</a>
    </div>
@endsection
