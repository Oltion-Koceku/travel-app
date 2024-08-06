<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class TableTripseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 7; $i++) {
            $new_trip = new Trip();
            $new_trip->name = $faker->name();
            $new_trip->start_date = $faker->date();
            $new_trip->end_date = $faker->date();
            $new_trip->save();
        }
    }
}
