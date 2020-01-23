<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('testId')->references('id')->on('test');
            $table->string('type');

            $table->timestamps();
        });

        DB::table('test_type')->insert(
            array(
                [
                    'testId' => '1',
                    'type' => 'Academic'
                ],
                [
                    'testId' => '1',
                    'type' => 'General Training'
                ],
                [
                    'testId' => '1',
                    'type' => 'UKVI General Training'
                ],
                [
                    'testId' => '1',
                    'type' => 'UKVI Academic'
                ],
                [
                    'testId' => '1',
                    'type' => 'UKVI Life Skills A1'
                ],
                [
                    'testId' => '1',
                    'type' => '	UKVI Life Skills B1'
                ]
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_type');
    }
}
