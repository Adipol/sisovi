<?php

use Illuminate\Database\Seeder;
use App\Level;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
			'name'=>'Normal',
			'abreviation'=>1,
			'ucm'=>1
		]);

		Level::create([
			'name'=>'Alto',
			'abreviation'=>2,
			'ucm'=>1
		]);

    }
}
