<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(App\User::class, function (Faker $faker) {    
    return [
        'name' => $faker->firstName . ' ' . $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'hospital' => $faker->company,
        'area' => $faker->country,
        'is_admin' => 0,
        'phone' => '123456'
    ];
});


$factory->define(App\Transport::class, function (Faker $faker) {    
    return [
        'from' => $faker->city,
        'to' => $faker->city,
        'people' => $faker->randomNumber(2),
        'driver' => $faker->randomElement(['سيارة اجرة','متطوع']),
        'price_share' => $faker->randomNumber(3)
    ];
});

$factory->define(App\Tool::class, function (Faker $faker) {    
    return [
        'patient' =>  $faker->firstName,
        'hospital' => $faker->company,
        'tool' => $faker->randomElement(['سماعة طبية', 'جهاز فحص نظر', 'مقياس حرارة', 'ايكو']),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'patient_phone' => $faker->e164PhoneNumber
    ];
});
$factory->define(App\Help::class, function (Faker $faker) {    
    return [
        'patient' =>  $faker->firstName,
        'hospital' => $faker->company,
        'help_type' => $faker->randomElement(['جهاز طبي', 'دواء', 'مساهمة في تكلفة الفحص', 'اغراض شخصية', 'اخر']),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'asked_from' => $faker->randomElement(['طاقم اداري', 'طاقم طبي', 'مريض'])
    ];
});

$factory->define(App\Donate::class, function (Faker $faker) {    
    return [
        'donor_name' =>  $faker->firstName . ' ' . $faker->lastName,
        'donate_type' => $faker->randomElement(['جهاز طبي', 'دواء', 'مساهمة في تكلفة الفحص', 'اغراض شخصية', 'اخر']),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true)
    ];
});



/* $factory->define(App\Transport::class, function (Faker $faker) {
    // $faker->locale('ar_SA'); 
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'hospital' => $faker->name,
        'area' => $faker->country,
        'is_admin' => 0,
        'phone' => 123456
    ];
}); */