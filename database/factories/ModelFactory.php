<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->email,
        'email_verified_at' => $faker->dateTime,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, static function (Faker\Generator $faker) {
    return [
        'firstName' => $faker->sentence,
        'lastName' => $faker->sentence,
        'username' => $faker->sentence,
        'email' => $faker->email,
        'is_active' => $faker->boolean(),
        'avatar' => $faker->sentence,
        'email_verified_token' => $faker->sentence,
        'email_verified_at' => $faker->dateTime,
        'last_active_at' => $faker->dateTime,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Game::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'is_private' => $faker->boolean(),
        'is_active' => $faker->boolean(),
        'is_admin_playing' => $faker->boolean(),
        'is_auto_accepted' => $faker->boolean(),
        'code' => $faker->sentence,
        'description' => $faker->sentence,
        'date_start' => $faker->dateTime,
        'date_end' => $faker->dateTime,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\UserGame::class, static function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->sentence,
        'game_id' => $faker->sentence,
        'joined_at' => $faker->dateTime,
        'is_active' => $faker->boolean(),
        'is_admin' => $faker->boolean(),
        'is_banned' => $faker->boolean(),
        'is_waiting' => $faker->boolean(),
        'color' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Target::class, static function (Faker\Generator $faker) {
    return [
        'hunter_id' => $faker->sentence,
        'victim_id' => $faker->sentence,
        'game_id' => $faker->sentence,
        'date_start' => $faker->dateTime,
        'date_end' => $faker->dateTime,
        'code_eliminate' => $faker->sentence,
        'is_validated' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
