@section('content')
    <form action="" method="POST" class="m-5">
        @csrf
        @method($project->id ? "PATCH" : "POST")
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $project->name) }}">
            <label for="name">Nom</label>
            @error('title')
                {{ $message }}
            @enderror
        </div>
        <div class="form-floating mb-3">
            <select class="form-control form-select" name="type_id" id="type">
                <option value="">Sélectionner un type</option>
                @foreach ($types as $type)
                    <option @selected(old('type_id', $project->type_id) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            <label for="type">Type</label>
            @error('type_id')
                {{ $message }}
            @enderror
        </div>
        @php
            $tagsIds = $project->tags()->pluck('id');
        @endphp
        <div class="form-floating mb-3">
            <select class="form-control" name="tags[]" id="tag" multiple>
                @foreach ($tags as $tag)
                    <option @selected($tagsIds->contains($tag->id)) value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            <label for="tag">Tags</label>
            @error('tags')
                {{ $message }}
            @enderror
        </div>
        <button class="btn btn-success">
            @if ($project->id)
                Mofifier
            @else
                Créer
            @endif
        </button>
        <a href="{{ route('project.index') }}" class="btn btn-danger">Retour</a>
    </form>
@endsection
