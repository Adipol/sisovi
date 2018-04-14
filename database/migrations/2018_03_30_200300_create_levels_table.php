<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
			$table->increments('id');
			
			$table->string('name')->unique();
			$table->string('abreviation')->unique();
			
			$table->softDeletes();
            $table->timestamps();
			$table->integer('ucm')->unsigned();
		});
    }

    public function down()
    {
        Schema::dropIfExists('levels');
    }
}
