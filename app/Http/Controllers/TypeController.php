<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeFilterRequest;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TypeController extends Controller
{
    public function index() : View {
        return view('type.index', [
            'types' => Type::all()
        ]);
    }

    public function create() : View {
        $type = new Type();
        return view('type.create', [
            'type' => $type
        ]);
    }

    public function store(TypeFilterRequest $request) : RedirectResponse | View {
        $type = Type::create($request->validated());
        return redirect()->route('type.index', [
            'type' => $type->id
        ])->with('success', 'Le type a été sauvegarder');
    }

    public function edit(Type $type) : View {
        return view('type.edit', [
            'type' => $type
        ]);
    }

    public function update(Type $type, TypeFilterRequest $request) : RedirectResponse | View {
        $type->update($request->validated());
        return redirect()->route('type.index', [
            'type' => $type->id
        ])->with('success', 'Le type a bien été modifier');
    }
}
