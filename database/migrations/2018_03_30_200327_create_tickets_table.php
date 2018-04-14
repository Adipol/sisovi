<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
			$table->increments('id');

			$table->string('code_area'); //codigo de area
			$table->integer('applicant_id');//solicitante id
			$table->integer('operational_id')->nullable();//operacional id
			
			$table->date('incident_date');//fecha de incidente

			$table->string('driver');    //conductor
			$table->string('host');      //anfitrion

			$table->text('applicant_obs');// obs solicitante
			$table->text('operational_obs')->nullable();//obs operacional
			$table->string('file')->nullable();
			$table->integer('patio');
			$table->string('area');

			$table->integer('code_id')->unsigned()->default(1);
			$table->foreign('code_id')->references('id')->on('codes');

			$table->integer('bus_id')->unsigned();
			$table->foreign('bus_id')->references('id')->on('buses');

			$table->integer('level_id')->unsigned();
			$table->foreign('level_id')->references('id')->on('levels');
			
			$table->timestamps();
			
			$table->integer('ucm')->unsigned();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
