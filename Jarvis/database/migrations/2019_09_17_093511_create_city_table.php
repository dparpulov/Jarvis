<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city', function (Blueprint $table) {
            $table->integer('id');

            $table->string('countryId')->references('id')->on('country')->onDelete('cascade');
            $table->integer('stateId')->references('id')->on('state')->onDelete('cascade');
            $table->string('name');
            $table->string('alternativeName')->nullable();
            $table->double('lng');
            $table->double('lat');
            $table->longText('description');
            $table->bigInteger('inhabitants');


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
        Schema::dropIfExists('city');
    }
}
