<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use phpDocumentor\Reflection\DocBlock\Description;

/**
 * Class Project
 * @package App
 */
class Project extends Model
{

    protected $guarded = [];

    /**
     * @return string
     */
    public function path()
    {
        return "/projects/{$this->id}";
    }

    /**
     * @return BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param $body
     * @return Model
     */
    public function addTask($body)
    {
        return $this->tasks()->create(compact('body'));
    }

    /**
     * @return HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    /**
     * @param $description
     */
    public function recordActivity($description)
    {
        $this->activity()->create([
            'project_id' => $this->project_id,
            'description' => $description
        ]);
    }
}
