<?php

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
        $this->call(UserSeeder::class);
        $this->call(TaxonomySeeder::class);
        $this->call(FeatureSeeder::class);
        //$this->call(VehicleSeeder::class);
    }
}
