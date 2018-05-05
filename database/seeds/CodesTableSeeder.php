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
			'name'=>'SOLICITADO',
		]);

		Code::create([
			'name'=>'ARCHIVO ENVIADO',
		]);

		Code::create([
			'name'=>'FINALIZADO',
		]);

		Code::create([
			'name'=>'REENVIADO',
		]);
    }
}
