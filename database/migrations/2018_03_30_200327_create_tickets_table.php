<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
			$table->increments('id');

			$table->integer('code_area'); //codigo de area

			$table->integer('applicant_id');//solicitante id
			$table->integer('operational_id');//operacional id
			
			$table->date('incident_date');//fecha de incidente
			$table->time('start_time'); //hora de inico de incidente
			$table->time('ending_time'); //hora de finalizacion de incidente
			
			$table->text('applicant_obs');// obs solicitante
			$table->text('operational_obs');//obs operacional
			$table->string('file')->nullable();

			$table->integer('bus_id')->unsigned();
			$table->foreign('bus_id')->references('id')->on('buses');

			$table->integer('grade_id')->unsigned();
			$table->foreign('grade_id')->references('id')->on('degrees');

			$table->integer('area_id')->unsigned();
			$table->foreign('area_id')->references('id')->on('areas');

			
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
