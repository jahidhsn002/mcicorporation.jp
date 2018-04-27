<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VehicleMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('price', 8, 2);
            $table->float('actual_price', 8, 2)->nullable();
            $table->text('thumbnail')->nullable();
            $table->string('model_code')->nullable();
            $table->string('manufacture')->nullable();
            $table->integer('engine')->default(0);
            $table->integer('mileage')->default(0);
            $table->longText('gallery')->nullable();
            $table->string('ref_no')->nullable();

                $table->string('chassis')->nullable();
                $table->string('engine_code')->nullable();
                $table->string('seats')->nullable();
                $table->string('dors')->nullable();
                $table->string('dimension')->nullable();
                $table->string('m3')->nullable();
                $table->string('weight')->nullable();
                $table->string('registration')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
