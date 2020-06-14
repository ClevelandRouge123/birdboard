<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Activity
 * @package App
 */
class Activity extends Model
{
    protected $guarded = [];

    public function subject()
    {
        return $this->morphTo();
    }
}
