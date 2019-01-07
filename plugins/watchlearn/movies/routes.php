<?php
use WatchLearn\Movies\Models\Movie;
use WatchLearn\Movies\Models\Actor;
Route::get('/seed-actors', function () {
    $faker = Faker\Factory::create();
    for($i = 0; $i < 100; $i++){

        Actor::create([
            'name' => $faker->name,
            'lastname' => $faker->lastname
        ]);
    }

    return "Actors are created";
});
