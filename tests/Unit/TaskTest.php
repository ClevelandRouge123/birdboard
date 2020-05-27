<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Project;
use App\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_has_a_path()
    {
        $task = factory(Task::class)->create();

        $this->assertEquals('/projects/' . $task->project->id . '/tasks/' . $task->id, $task->path());
    }

    /**
     * @test
     */
    public function a_task_belongs_to_a_project()
    {
        $task = factory(Task::Class)->create();
        $this->assertInstanceOf(Project::class, $task->project);
    }
    /**
     * @test
     */
    public function it_can_be_completed()
    {
        $task = factory(Task::Class)->create();

        $this->assertFalse($task->completed);

        $task->complete();

        $this->assertTrue($task->fresh()->completed);
    }
    /**
     * @test
     */
    public function it_can_be_incomplete()
    {
        $task = factory(Task::Class)->create(['completed' => true]);

        $this->assertTrue($task->completed);

        $task->incomplete();

        $this->assertFalse($task->completed);
    }


}
