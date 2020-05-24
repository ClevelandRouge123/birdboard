<?php


namespace Tests\Setup;


use App\Project;
use App\Task;
use App\User;

class ProjectFactory
{
    protected $tasksCounts = 0;
    protected $user;

    public function withTasks($count)
    {
        $this->tasksCounts = $count;

        return $this;
    }

    public function create()
    {
        $project = factory(Project::class)->create([
            'owner_id' => $this->user ?? factory(User::class)
        ]);

        factory(Task::class, $this->tasksCounts)->create([
            'project_id' => $project->id
        ]);

        return $project;
    }

    public function ownedBy($user)
    {
        $this->user = $user;

        return $this;
    }
}
