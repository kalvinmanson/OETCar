<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cars', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->integer('driver_id')->default(0);
        $table->integer('owner_id')->default(0);
        $table->string('register')->unique();
        $table->string('color')->nullable();
        $table->string('brand')->nullable();
        $table->string('type')->nullable();
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
        Schema::dropIfExists('cars');
    }
}
