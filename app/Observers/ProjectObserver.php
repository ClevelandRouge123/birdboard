<?php

namespace App\Observers;

use App\Activity;
use App\Project;

class ProjectObserver
{
    /**
     * Handle the project "created" event.
     *
     * @param Project $project
     * @return void
     */
    public function created(Project $project)
    {
        $project->recordActivity('created');
    }

    /**
     * Handle the project "updated" event.
     *
     * @param Project $project
     * @return void
     */
    public function updated(Project $project)
    {
        $project->recordActivity('updated');
    }

    /**
     * Handle the project "deleted" event.
     *
     * @param Project $project
     * @return void
     */
    public function deleted(Project $project)
    {
        //
    }

    /**
     * Handle the project "restored" event.
     *
     * @param Project $project
     * @return void
     */
    public function restored(Project $project)
    {
        //
    }

    /**
     * Handle the project "force deleted" event.
     *
     * @param Project $project
     * @return void
     */
    public function forceDeleted(Project $project)
    {
        //
    }

//    protected function recordActivity($project, $type)
//    {
//        Activity::create([
//            'project_id' => $project->id,
//            'description' => $type
//        ]);
//    }
}
