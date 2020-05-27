<?php
/** @var Factory $factory */

use App\Task;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Project $factory */
$factory->define(Task::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence(4),
        'project_id' => factory(App\Project::class),
        'completed' => false

    ];
});
