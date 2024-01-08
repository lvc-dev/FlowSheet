<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectFilterRequest;
use App\Models\Piece;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index() : View {
        return view('project.index', [
            'projects' => Project::with('tags', 'pieces', 'types')->paginate(5)
        ]);
    }

    public function show(string $slug, Project $project) : RedirectResponse | View {
        $pieces = Piece::all();
        if ($project->slug !== $slug) {
            return to_route('project.show', ['slug' => $project->slug, 'id' => $project->id]);
        }
        return view('project.show', [
            'project' => $project,
            'pieces' => $pieces
        ]);
    }

    public function create() : View {
        $project = new Project();
        $types = Type::select('id', 'name')->get();
        $tags = Tag::select('id', 'name')->get();
        return view('project.create', [
            'project' => $project,
            'types' => $types,
            'tags' => $tags
        ]);
    }

    public function store(ProjectFilterRequest $request) : RedirectResponse | View {
        $data = $request->validated();
        $data['slug'] = strtolower(str_replace(' ', '-', $request->validated('name')));
        $project = Project::create($data);
        $project->tags()->sync($request->validated('tags'));
        return redirect()->route('project.show', [
            'slug' => $project->slug, 'project' => $project->id
        ])->with('success', 'Le projet a été sauvegarder');
    }

    public function edit(Project $project) : View {
        return view('project.edit', [
            'project' => $project,
            'types' => Type::all(),
            'tags' => Tag::all()
        ]);
    }

    public function update(Project $project, ProjectFilterRequest $request) : RedirectResponse | View {
        $data = $request->validated();
        $data['slug'] = strtolower(str_replace(' ', '-', $request->validated('name')));
        $project->update($data);
        $project->tags()->sync($request->validated('tags'));
        return redirect()->route('project.show', [
            'slug' => $project->slug,
            'project' => $project->id
        ])->with('success', 'Le projet a bien été modifier');
    }
}
