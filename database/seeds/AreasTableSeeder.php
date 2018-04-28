<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Area::create([
			'name'=>'Legal',
			'abreviation'=>'Lg',
			'ucm'=>1
		]);

		Area::create([
			'name'=>'Operaciones',
			'abreviation'=>'Op',
			'ucm'=>1
		]);

		Area::create([
			'name'=>'Atención al cliente',
			'abreviation'=>'Ac',
			'ucm'=>1
		]);
    }
}
