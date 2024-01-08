<?php

namespace App\Http\Controllers;

use App\Http\Requests\PieceFilterRequest;
use App\Models\Piece;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PieceController extends Controller
{
    public function index() : View {
        return view('piece.index', [
            'pieces' => Piece::paginate(1)
        ]);
    }

    public function show(string $slug, Piece $piece) : RedirectResponse | View {
        if ($piece->slug !== $slug) {
            return to_route('piece.show', ['slug' => $piece->slug, 'id' => $piece->id]);
        }
        return view('piece.show', [
            'piece' => $piece,
            'projects' => Project::all()
        ]);
    }

    public function create() : View {
        $piece = new Piece();
        return view('piece.create', [
            'piece' => $piece,
            'projects' => Project::all()
        ]);
    }

    public function store(PieceFilterRequest $request) : RedirectResponse | View {
        $data = $request->validated();
        $data['slug'] = strtolower(str_replace(' ', '-', $request->validated('name')));
        $piece = Piece::create($data);
        return redirect()->route('piece.show', [
            'slug' => $piece->slug,
            'piece' => $piece->id,
            'projects' => Project::all()
        ])->with('success', 'La pièce a été sauvegarder');
    }

    public function edit(Piece $piece) : View {
        return view('piece.edit', [
            'piece' => $piece,
            'projects' => Project::select('id', 'name')->get()
        ]);
    }

    public function update(Piece $piece, PieceFilterRequest $request) : RedirectResponse | View {
        $data = $request->validated();
        $data['slug'] = strtolower(str_replace(' ', '-', $request->validated('name')));
        $piece->update($data);
        return redirect()->route('piece.show', [
            'slug' => $piece->slug,
            'piece' => $piece->id,
        ])->with('success', 'La pièce a bien été modifier');
    }
}
