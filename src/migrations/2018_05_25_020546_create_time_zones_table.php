<?php

/**
 * @author @DyanGalih
 * @copyright @2018
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTimeZonesTable
 */

class CreateTimeZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_zones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')
                ->nullable(false)
                ->index();
            $table->string('name')
                ->nullable(false);
            $table->integer('minute')
                ->nullable(false);
            $table->integer('user_id')
                ->unsigned()
                ->nullable(false);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_zones');
    }
}
