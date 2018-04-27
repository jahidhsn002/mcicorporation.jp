<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WishList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wish_list', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('rel_wish_list_taxonomy_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wish_list_id');
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
        Schema::dropIfExists('wish_list');
        Schema::dropIfExists('rel_wish_list_taxonomy_meta');
    }
}
