<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ProjectTasksController extends Controller
{
    /**
     * @param Project $project
     * @return Application|RedirectResponse|Redirector
     * @throws AuthorizationException
     */
    public function store(Project $project)
    {

        $this->authorize('update', $project);

        request()->validate(['body' => 'required']);

        $project->addTask(request('body'));

        return redirect($project->path());
    }

    /**
     * @param Project $project
     * @param Task $task
     * @return Application|RedirectResponse|Redirector
     * @throws AuthorizationException
     */
    public function update(Project $project, Task $task)
    {
        $this->authorize('update', $task->project);

        request()->validate(['body' => 'required']);

        $task->update([
            'body' => request('body')
        ]);

        if(request()->has('completed')){
            $task->complete();
        }


        return redirect($project->path());

    }
}
