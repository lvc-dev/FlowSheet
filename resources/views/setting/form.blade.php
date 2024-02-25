@section('content')
    <form action="" method="POST" class="m-5">
        @csrf
        @method($setting->id ? "PATCH" : "POST")
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="section" id="section" value="{{ old('section', $setting->section) }}">
            <label for="section">Section</label>
            @error('section')
            {{ $message }}
            @enderror
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="value" id="value" value="{{ old('value', $setting->value) }}">
            <label for="value">Valeur</label>
            @error('value')
            {{ $message }}
            @enderror
        </div>
        <button class="btn btn-success">
            @if ($setting->id)
                Modifier
            @else
                Créer
            @endif
        </button>
        <a href="{{ route('setting.index') }}" class="btn btn-danger">Retour</a>
    </form>
@endsection
