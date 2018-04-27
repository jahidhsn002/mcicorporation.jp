<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Taxonomy;
use App\TaxonomyMeta;

class TaxonomySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear previous data
        Taxonomy::truncate();

        $tax = $this->make('Make');
            $this->make_meta('TOYOTA', $tax->id, 'uploads/toyota.png');
            $this->make_meta('NISSAN', $tax->id, 'uploads/nissan.png');
            $this->make_meta('HONDA', $tax->id, 'uploads/honda.png');
            $this->make_meta('MITSUBISHI', $tax->id, 'uploads/mitsubishi.png');
            $this->make_meta('BMW', $tax->id, 'uploads/bmw.png');
            //$this->make_meta('FERRARI', $tax->id, 'uploads/ferrari.png');
            $this->make_meta('SUZUKI', $tax->id, 'uploads/suzuki.png');
            $this->make_meta('ISUZU', $tax->id, 'uploads/isuzu.png');
            $this->make_meta('SUBARU', $tax->id, 'uploads/subaru.png');
            $this->make_meta('HINO', $tax->id, 'uploads/hino.png');
            $this->make_meta('LEXUS', $tax->id, 'uploads/lexus.png');
            $this->make_meta('MERCEDIZ BENZ', $tax->id, 'uploads/mercedezbenz.png');
            $this->make_meta('FORD', $tax->id, 'uploads/ford.png');
            $this->make_meta('AUDI', $tax->id, 'uploads/audi.png');
            $this->make_meta('VOLVO', $tax->id, 'uploads/volvo.png');
            $this->make_meta('VOLKS WEAGAN', $tax->id, 'uploads/volksweaon.png');           
            $this->make_meta('JEEP', $tax->id, 'uploads/jeep.png');
            $this->make_meta('HYUNDAI', $tax->id, 'uploads/hyundai.png');
            $this->make_meta('KIA', $tax->id, 'uploads/kia.png');
            $this->make_meta('LAND ROVER', $tax->id, 'uploads/landrover.png');
            $this->make_meta('JAGUAR', $tax->id, 'uploads/jaguar.png');
            $this->make_meta('DAIHATSU', $tax->id, 'uploads/daihatsu.png');
            $this->make_meta('MAZDA', $tax->id, 'uploads/mazda.png');
            $this->make_meta('SS,ANGYONG', $tax->id, 'uploads/ss,aynyong.png');
            $this->make_meta('SS,PEUGEOT', $tax->id, 'uploads/peugeot.png');
            
        $tax = $this->make('Model');
            $this->make_meta('1 Series (50)', $tax->id);
            $this->make_meta('1007(1)', $tax->id);
            $this->make_meta('156(2)', $tax->id);
            $this->make_meta('180sx (1)', $tax->id);
            $this->make_meta('206(8)', $tax->id);
            $this->make_meta('207(9)', $tax->id);
            $this->make_meta('3SERIES(137)', $tax->id);
            $this->make_meta('3008(1)', $tax->id);
            $this->make_meta('300(C)', $tax->id);
            $this->make_meta('300(M)', $tax->id);
            $this->make_meta('306', $tax->id);
            $this->make_meta('307', $tax->id);
            $this->make_meta('308', $tax->id);
            $this->make_meta('323', $tax->id);
            $this->make_meta('39030S', $tax->id);
            $this->make_meta('3D VR HEADSET(2)', $tax->id);
            $this->make_meta('3D VR HEADSET(1)', $tax->id);
            $this->make_meta('900', $tax->id);
            $this->make_meta('901', $tax->id);
            $this->make_meta('ALTEZZA', $tax->id);
            $this->make_meta('ALPHEON', $tax->id);

        $tax = $this->make('Fuel');
            $this->make_meta('CNG', $tax->id);
            $this->make_meta('Diesel', $tax->id);
            $this->make_meta('Electric', $tax->id);
            $this->make_meta('LPG', $tax->id);
            $this->make_meta('Petrol', $tax->id);
            $this->make_meta('Other', $tax->id);

        $tax = $this->make('Drivetrain');
            $this->make_meta('2 wheel drive', $tax->id);
            $this->make_meta('4 wheel drive', $tax->id);
            $this->make_meta('All wheel drive', $tax->id);

        $tax = $this->make('Body Type');
            $this->make_meta('SUV', $tax->id, 'uploads/suv.png');
            $this->make_meta('TRUCK', $tax->id, 'uploads/truck.png');
            $this->make_meta('PICK-UP', $tax->id, 'uploads/pickup.png');
            $this->make_meta('VAN', $tax->id, 'uploads/van.png');
            $this->make_meta('SEDAN', $tax->id, 'uploads/sedan.png');
            $this->make_meta('BUS', $tax->id, 'uploads/bus.png');
            $this->make_meta('MINI BUS', $tax->id, 'uploads/minibus.png');
            $this->make_meta('MINI VAN', $tax->id, 'uploads/minivan.png');
            $this->make_meta('HATCHBACK', $tax->id, 'uploads/hatchback.png');
            $this->make_meta('COUPE', $tax->id, 'uploads/coupe.png');
            $this->make_meta('CONVERTIBLE', $tax->id, 'uploads/convertible.png');
            $this->make_meta('WAGON', $tax->id, 'uploads/wagon.png');
            $this->make_meta('FORKLIFT', $tax->id, 'uploads/forklift.png');
            $this->make_meta('MACHINERY', $tax->id, 'uploads/machinery.png');
            $this->make_meta('TRACTOR', $tax->id, 'uploads/tractor.png');
            $this->make_meta('MOTOR CYCLE', $tax->id, 'uploads/motorcycle.png');
            $this->make_meta('ELECTRONICS', $tax->id, 'uploads/electronics.png');
            $this->make_meta('OTHERS', $tax->id, 'uploads/others.png');

        $tax = $this->make('Steering');
            $this->make_meta('Left', $tax->id);
            $this->make_meta('Right', $tax->id);

        $tax = $this->make('Transmission');
            $this->make_meta('Automatic', $tax->id);
            $this->make_meta('CVT', $tax->id);
            $this->make_meta('DCT', $tax->id);
            $this->make_meta('Manual', $tax->id);
            $this->make_meta('Semi Automatic', $tax->id);
            $this->make_meta('Sport AT', $tax->id);
            $this->make_meta('Unspecified', $tax->id);

        $tax = $this->make('Color');
            $this->make_meta('Black', $tax->id);
            $this->make_meta('Blue', $tax->id);
            $this->make_meta('Green', $tax->id);
            $this->make_meta('Brown', $tax->id);

        $tax = $this->make('Sub body type');
            $this->make_meta('Audio', $tax->id);
            $this->make_meta('Bot', $tax->id);
            $this->make_meta('Cammera', $tax->id);
            $this->make_meta('Cargo', $tax->id);
        $tax = $this->make('Status');
            $this->make_meta('New Arrivals', $tax->id);
            $this->make_meta('Bast Deals', $tax->id);
            $this->make_meta('Premium Class', $tax->id);
            $this->make_meta('Popular', $tax->id);
            $this->make_meta('Best of Type', $tax->id);
    }

    public function make($name)
    {
    	$slug = str_slug($name);
        return Taxonomy::create([
		    'name' => $name,
		    'slug' => $slug
        ]);
    }

    public function make_meta($name, $id, $logo = null)
    {
        if($logo) $logo = '["/uploads/taxonomy/'.$logo.'"]';

    	$slug = str_slug($name);
        return TaxonomyMeta::create([
		    'taxonomy_id' => $id,
		    'name' => $name,
            'slug' => $slug,
		    'logo' => $logo
        ]);
    }
}
