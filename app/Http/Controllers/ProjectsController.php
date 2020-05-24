<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'notes' => 'max:2400'
        ]);

//$attributes['owner_id'] = auth()->id();

        $project = auth()->user()->projects()->create($attributes);

//        Project::create($attributes);

        return redirect($project->path());
    }

    public function show(Project $project)
    {
//        if (auth()->id() !== (int) $project->owner_id) {
//            abort(404);
//        }
        $this->authorize('update', $project);



        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function update(Project $project)
    {
        $this->authorize('update', $project);

        $project->update(request(['notes']));

        return redirect($project->path());
    }

    public function delete(Project $project)
    {
        $project->delete();

        return redirect('/projects');

    }


}
