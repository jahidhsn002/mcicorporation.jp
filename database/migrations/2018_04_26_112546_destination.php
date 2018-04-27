<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Destination extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('ports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('country_id');
            $table->float('insurance', 8, 2);
            $table->float('inspection', 8, 2);
            $table->float('certificate', 8, 2);
            $table->float('warranty', 8, 2);
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
        Schema::dropIfExists('countries');
        Schema::dropIfExists('ports');
    }
}
