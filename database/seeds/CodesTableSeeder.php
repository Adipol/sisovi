<?php

use Illuminate\Database\Seeder;
use App\Code;

class CodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Code::create([
			'name'=>'Solicitud',
		]);

		Code::create([
			'name'=>'Finalizado',
		]);

		Code::create([
			'name'=>'Archivado',
		]);
    }
}
