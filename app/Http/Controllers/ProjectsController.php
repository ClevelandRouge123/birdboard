<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;
//        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required'
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
        if (auth()->user()->isNot($project->owner)) {
            abort(404);
        }


        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }


}
