@section('content')
    <form action="" method="POST" class="m-5">
        @csrf
        @method($piece->id ? "PATCH" : "POST")
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="name" id="name_piece" value="{{ old('name', $piece->name) }}">
            <label for="name">Nom</label>
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div class="form-floating mb-2">
            <select class="form-select" name="project_id" id="project_piece">
                <option selected></option>
                <@foreach ($projects as $project)
                    <option @selected(old('project_id', $piece->project_id) == $project->id) value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
            <label for="projectList">Sélection un projet</label>
        </div>
        {{-- <div class="form-floating mb-2">
            <input type="text" class="form-control" name="slug" id="slug_piece" value="{{ old('slug', $piece->slug) }}">
            <label for="slug">Slug</label>
            @error('slug')
                {{ $message }}
            @enderror
        </div> --}}
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="quantity" id="quantity_piece" value="{{ old('quantity', $piece->quantity) }}">
            <label for="quantity">Quantité</label>
            @error('quantity')
                {{ $message }}
            @enderror
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="material" id="material_piece" value="{{ old('material', $piece->material) }}">
            <label for="material">Matériaux</label>
            @error('material')
                {{ $message }}
            @enderror
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="width" id="width_piece" value="{{ old('width', $piece->width) }}">
            <label for="width">Longueur (mm)</label>
            @error('width')
                {{ $message }}
            @enderror
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="height" id="height_piece" value="{{ old('height', $piece->height) }}">
            <label for="height">Largeur (mm)</label>
            @error('height')
                {{ $message }}
            @enderror
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="thickness" id="thickness_piece" value="{{ old('thickness', $piece->thickness) }}">
            <label for="thickness">Epaisseur (mm)</label>
            @error('thickness')
                {{ $message }}
            @enderror
        </div>
        <div class="form-floating mb-2">
            <textarea name="description" id="description_piece" cols="30" rows="10" class="form-control" aria-valuetext="{{ old('description', $piece->description) }}"></textarea>
            <label for="description">Description</label>
            @error('description')
                {{ $message }}
            @enderror
        </div>
        <button class="btn btn-success">
            @if ($piece->id)
                Modifier
            @else
                Créer
            @endif
        </button>
        <a href="{{ route('piece.index') }}" class="btn btn-danger">Retour</a>
    </form>
@endsection
