<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
			$table->increments('id');
			
			$table->string('name');
			$table->string('firstName');
			$table->string('lastName');
			$table->integer('identity_card')->unique();
			$table->string('issued');

			$table->timestamps();
			$table->integer('ucm')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
