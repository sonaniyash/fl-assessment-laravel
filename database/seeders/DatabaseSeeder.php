<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            'London',
            'Birmingham',
            'Leeds',
            'Glasgow',
            'Sheffield',
            'Bradford',
            'Liverpool',
            'Edinburgh',
            'Manchester',
            'Bristol',
            'Kirklees',
            'Fife',
            'Wirral',
            'North Lanarkshire',
            'Wakefield',
            'Cardiff',
            'Dudley',
            'Wigan',
            'East Riding',
            'South Lanarkshire',
        ];

        foreach ($cities as $city) {
            City::factory()->create([
                'name' => $city
            ]);
        }
    }
}
