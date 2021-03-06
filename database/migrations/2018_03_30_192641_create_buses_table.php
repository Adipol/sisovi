<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusesTable extends Migration
{
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
			$table->increments('id');
			
			$table->string('code')->unique();
			$table->string('license_plate')->unique();

			$table->integer('patio_id')->unsigned();
			$table->foreign('patio_id')->references('id')->on('patios');

			$table->softDeletes();
			$table->timestamps();
			$table->integer('ucm')->unsigned();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buses');
    }
}
