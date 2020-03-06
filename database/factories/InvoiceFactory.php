<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use App\Seller;
use App\Invoice;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    $start_date = Carbon::now()->subWeek();
    $final_date = Carbon::now();
    return [
        'issued_at' => $faker->dateTimeBetween($start_date, $final_date),
        'description' => $faker->realText(30),
        'client_id' => factory(Client::class),
        'seller_id' => factory(Seller::class)
    ];
});
