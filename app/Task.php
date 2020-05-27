<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $guarded = [];
    protected $touches = ['project'];
protected $casts = [
    'completed' => 'boolean'
];
    protected static function boot()
    {
        parent::boot();

        static::created(function ($task) {
            $task->project->recordActivity('created_task');
        });
//        static::updated(function ($task) {
//            if (!$task->completed) return;
//            $task->project->recordActivity('completed_task');
//        });
    }

    public function complete()
    {
        $this->update(['completed' => true]);
        $this->project->recordActivity('completed_task');
    }
    public function incomplete()
    {
        $this->update(['completed' => false]);
        $this->project->recordActivity('incomplete_task');
    }

    /**
     * @return BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * @return string
     */
    public function path()
    {
        return "/projects/{$this->project->id}/tasks/{$this->id}";
    }
}
