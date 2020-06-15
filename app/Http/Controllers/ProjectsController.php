<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProjectRequest;
use App\Project;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ProjectsController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function store()
    {

        return redirect(auth()->user()->projects()->create($this->validaterequest())->path());
    }

    /**
     * @param Project $project
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function show(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects.show', compact('project'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * @param Project $project
     * @return Application|RedirectResponse|Redirector
     * @throws AuthorizationException
     */
    public function update(Project $project)
    {
        $this->authorize('update', $project);

        $attributes = $this->validaterequest();

        $project->update($attributes);

        return redirect($project->path());
    }

    /**
     * @param Project $project
     * @return Application|RedirectResponse|Redirector
     * @throws Exception
     */
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
    protected function validaterequest(): array
    {
       return request()->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'notes' => 'nullable'
        ]);
    }


}
