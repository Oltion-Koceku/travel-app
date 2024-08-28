<?php

namespace Database\Seeders;

use App\Functions\Helper;
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
            // Genera una data di inizio casuale in un anno specifico
            $start_date = $faker->dateTimeBetween('this year January 1st', 'this year December 31st');
            // Genera una data di fine entro 7 giorni dalla data di inizio
            $end_date = (clone $start_date)->modify('+' . rand(1, 7) . ' days');
            $new_trip = new Trip();
            $new_trip->name = $faker->name();
            $new_trip->slug = Helper::generateSlug($new_trip->name, Trip::class);
            $new_trip->start_date = $start_date->format('Y-m-d');
            $new_trip->end_date = $end_date->format('Y-m-d');
            $new_trip->description = $faker->text();
            $new_trip->save();
        }
    }
}
