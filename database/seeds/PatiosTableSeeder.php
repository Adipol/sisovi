<?php

use Illuminate\Database\Seeder;
use App\Patio;

class PatiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Patio::create([
			'name'=>'Caja Ferroviaria',
			'abreviation'=>'CF',
			'ucm'=>1
		]);

		Patio::create([
			'name'=>'Incallojeta',
			'abreviation'=>'INK',
			'ucm'=>1
		]);

		Patio::create([
			'name'=>'Villa Salome',
			'abreviation'=>'VS',
			'ucm'=>1
		]);

		Patio::create([
			'name'=>'Chasquipampa',
			'abreviation'=>'CHA',
			'ucm'=>1
		]);		
    }
}
