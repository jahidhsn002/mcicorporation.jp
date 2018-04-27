<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaxonomyMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxonomies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('taxonomy_metas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('taxonomy_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('logo')->nullable();
            $table->timestamps();
        });

        Schema::create('rel_vehicle_taxonomy_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id');
            $table->integer('taxonomy_meta_id');
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
        Schema::dropIfExists('taxonomies');
        Schema::dropIfExists('taxonomy_metas');
        Schema::dropIfExists('rel_vehicle_taxonomy_meta');
    }
}
