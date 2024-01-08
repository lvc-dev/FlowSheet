@section('content')
    <form action="" method="POST" class="m-5">
        @csrf
        @method($tag->id ? "PATCH" : "POST")
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $tag->name) }}">
            <label for="name">Nom</label>
            @error('name')
            {{ $message }}
            @enderror
        </div>
        <button class="btn btn-success">
            @if ($tag->id)
                Modifier
            @else
                Créer
            @endif
        </button>
        <a href="{{ route('tag.index') }}" class="btn btn-danger">Retour</a>
    </form>
@endsection
