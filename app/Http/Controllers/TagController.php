<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagFilterRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use stdClass;

class TagController extends Controller
{
    public function index() : View {
        return view('tag.index', [
            'tags' => Tag::all()
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
        return redirect()->route('tag.index', [
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
        return redirect()->route('tag.index', [
            'tag' => $tag->id
        ])->with('success', 'Le tag a bien été modifier');
    }

    public function export() : View {
        $tags = Tag::all();
        $file = Files::Tag->value;
        foreach ($tags as $tag) {
            $this->writeTagJson($file, $tag->id, $tag->name);
        }
        return view('tag.index', [
            'tags' => $tags,
        ]);
    }

    public function readJson(string $file) : stdClass
    {
        $fileJson = storage_path() . "\\" . $file;
        $data = file_get_contents($fileJson);
        return json_decode($data);
    }

    public function writeTagJson(string $file, string $section, string $value) : void
    {
        $obj = $this->readJson($file);
        $fileJson = storage_path() . "\\" . $file;
        $obj->$section = $value;
        $json = json_encode($obj, JSON_FORCE_OBJECT);
        file_put_contents($fileJson, $json, LOCK_EX);
    }
}
