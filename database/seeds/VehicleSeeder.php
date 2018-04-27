<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Vehicle;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear previous data
        Vehicle::truncate();

        $faker = Factory::create();

        // Generate new data
        for ($i = 0; $i < 30; $i++) {
        	Vehicle::create([
		        'name' => $faker->sentence(2, true),
		        'price' => $faker->randomFloat(2, 2526, 26582),
		        'manufacture' => $faker->date('m/Y', 'now'),
		        'engine' => $faker->numberBetween(50, 8000),
		        'mileage' => $faker->numberBetween(2420, 16890),
		        'ref_no' => $faker->bothify('H#G#???')
            ]);
        }
    }
}
