<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    /**
     * @param $description
     */
    public function recordActivity($description)
    {
        $this->activity()->create(compact('description'));
    }
}
