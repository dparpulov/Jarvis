<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawTestDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_test_date', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('importFileId')->references('id')->on('import_files')->onDelete('cascade');
            
            $table->string('sheet');
            $table->string('country');
            $table->string('center');
            $table->string('centerNumber');
            $table->string('venue');
            $table->string('town');
            $table->date('testDate')->nullable();
            $table->string('testName');
            $table->double('testFee', 15, 8)->nullable()->default('0');
            $table->string('feeCurrency')->nullable()->default('');

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
        Schema::dropIfExists('raw_test_date');
    }
}
