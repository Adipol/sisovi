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

			$table->integer('applicant_id');//solicitante id
			$table->integer('operational_id');//operacional id
			$table->time('start_time'); //hora de inico de incidente
			$table->time('ending_time'); //hora de finalizacion de incidente
			
			$table->date('incident_date');//fecha de incidente
			$table->text('applicant_obs');//solicitante
			$table->text('operational_obs');//operacional
			


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
        Schema::dropIfExists('tickets');
    }
}
