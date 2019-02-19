<?php

use Faker\Generator as Faker;

$factory->define(App\Productos::class, function (Faker $faker) {
    return [

      'nombre'=> $faker->text(rand(15,25)),
      'descripcion'=>$faker->text(rand(25,49)),
      'stock'=>rand(5,25)
    ];
});
