<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagFilterRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index() : View {
        return view('tag.index', [
            'tags' => Tag::paginate(5)
        ]);
    }

    public function show(Tag $tag) : RedirectResponse | View {
        return view('tag.show', [
            'tag' => $tag
        ]);
    }

    public function create() : View {
        $tag = new Tag();
        return view('tag.create', [
            'tag' => $tag
        ]);
    }

    public function store(TagFilterRequest $request) : RedirectResponse | View {
        $tag = Tag::create($request->validated());
        return redirect()->route('tag.show', [
            'tag' => $tag->id
        ])->with('success', 'Le tag a été sauvegarder');
    }

    public function edit(Tag $tag) : View {
        return view('tag.edit', [
            'tag' => $tag
        ]);
    }

    public function update(Tag $tag, TagFilterRequest $request) : RedirectResponse | View {
        $tag->update($request->validated());
        return redirect()->route('tag.show', [
            'tag' => $tag->id
        ])->with('success', 'Le tag a bien été modifier');
    }
}
