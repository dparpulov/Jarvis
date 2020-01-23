<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_provider', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('promote');

            $table->timestamps();
        });

        DB::table('test_provider')->insert(
            array(
                [
                    'name' => 'British Council',
                    'promote' => 1
                ],
                [
                    'name' => 'IDP Australia',
                    'promote' => 0
                ],
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
        Schema::dropIfExists('test_provider');
    }
}
