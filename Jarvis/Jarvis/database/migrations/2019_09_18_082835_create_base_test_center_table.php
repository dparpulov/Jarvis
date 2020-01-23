<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseTestCenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_test_center', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('testCenterAssociation')->nullable();
            $table->string('centerNumber')->nullable();
            $table->string('venue')->nullable();
            $table->integer('cityId')->references('id')->on('city');
            $table->integer('testProviderId')->references('id')->on('test_provider');
            $table->string('ieltsId');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('clickoutURLId')->nullable()->references('id')->on('clickout_u_r_l');

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
        Schema::dropIfExists('base_test_center');
    }
}
