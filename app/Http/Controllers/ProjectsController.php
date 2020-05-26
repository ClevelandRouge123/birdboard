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

        return redirect(auth()->user()->projects()->create($this->validaterequest())->path());
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

        $attributes = $this->validaterequest();

        $project->update($attributes);

        return redirect($project->path());
    }

    public function delete(Project $project)
    {
        $project->delete();

        return redirect('/projects');

    }

    public function edit(Project $project)
    {
       return view('projects.edit', compact('project'));
    }

    /**
     * @return array
     */
    public function validaterequest(): array
    {
       return request()->validate([
            'title' => 'required',
            'description' => 'required',
            'notes' => 'min:3'
        ]);
    }

}
