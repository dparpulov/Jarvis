<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country', function (Blueprint $table) {
            $table->string('id', 2)->unique();
            $table->integer('spId');
            $table->string('name');
            $table->string('continent');
            $table->string('currencyCode');
            $table->string('currencyName');
            $table->string('geonameId',7)->unique();
            $table->string('description')->default('No description available. ');
            $table->string('languages')->default('EN');

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
        Schema::dropIfExists('country');
    }

}
