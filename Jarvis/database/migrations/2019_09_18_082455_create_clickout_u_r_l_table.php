<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClickoutURLTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clickout_u_r_l', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('trackingLinkName')->nullable();
            $table->string('shortTrackingLink')->nullable();
            $table->string('landingPage')->nullable();
            $table->date('clickmeterCreationDate')->nullable();

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
        Schema::dropIfExists('clickout_u_r_l');
    }
}
