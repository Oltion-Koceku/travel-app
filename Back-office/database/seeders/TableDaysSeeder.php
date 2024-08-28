<?php

namespace Database\Seeders;

use App\Models\Day;
use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableDaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = Trip::all();

        foreach ($data as $trip) {
            // Converte le stringhe delle date in oggetti DateTime
            $start_date = new \DateTime($trip->start_date);
            $end_date = new \DateTime($trip->end_date);

            while ($start_date <= $end_date) {

                $new_day =  new Day();
                $new_day->trip_id  = $trip->id;
                $new_day->date = $start_date->format('Y-m-d');
                $new_day->save();

                $start_date->modify('+1 day');
            }
        }
    }
}
