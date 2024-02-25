@extends('base')

@section('title', 'Paramètres')

@section('content')
    <h1 class="mb-5 mt-3">Paramètres</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped caption-top">
            <thead>
            <tr class="text-center">
                <th scope="col">Section</th>
                <th scope="col">Valeur</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach ($settings as $setting)
                    <tr class="text-center">
                        <td>{{ $setting->section }}</td>
                        <td>{{ $setting->value }}</td>
                        <td><a href="{{ route('setting.edit', ['setting' => $setting->id]) }}" class="btn btn-primary">Modifier</a></td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <a href="{{ route('setting.create') }}" class="btn btn-primary">Nouveau</a>
        <a href="{{ route('setting.export') }}" class="btn btn-warning">Exporter</a>
    </div>
@endsection
