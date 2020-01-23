<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditTestDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edit_test_date', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('regularTestDate');
            $table->integer('testTypeId')->references('id')->on('test_type');
            $table->date('testDate');
            $table->double('testFee');
            $table->string('feeCurrency');
            $table->bigInteger('baseTestCenterId')->nullable()->references('id')->on('base_test_center');
            $table->bigInteger('rawTestDateId')->references('id')->on('raw_test_date');

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
        Schema::dropIfExists('edit_test_date');
    }
}
