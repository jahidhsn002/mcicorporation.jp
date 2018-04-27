<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear previous data
        Feature::truncate();

        $this->make('CD Player');
        $this->make('Sun Roof');
        $this->make('Leather Seat');
        $this->make('Alloy Wheels');
        $this->make('Power Steering');
        $this->make('Power Window');
        $this->make('A/C');
        $this->make('ABS');
        $this->make('Airbag');
        $this->make('Radio');
        $this->make('CD Changer');
        $this->make('DVD');
        $this->make('TV');
        $this->make('Power Seat');
        $this->make('Back Tire');
        $this->make('Grill Guard');
        $this->make('Rear Spoiler');
        $this->make('Central Locking');
        $this->make('Jack');
        $this->make('Spare Tire');
        $this->make('Wheel Spanner');
    }

    public function make($name)
    {
    	$slug = str_slug($name);
        Feature::create([
		    'name' => $name,
		    'slug' => $slug
        ]);
    }

}
