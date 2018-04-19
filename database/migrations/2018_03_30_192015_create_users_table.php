<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
			$table->string('password');
			$table->string('keyword');
			
			$table->integer('rol_id')->unsigned();
			$table->foreign('rol_id')->references('id')->on('roles'); //1:administrador|2:solicitante|3:operacional

			$table->rememberToken();
			$table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
