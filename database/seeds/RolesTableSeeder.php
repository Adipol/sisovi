<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
			'name'=>'Administrador',
			'abreviation'=>'admin'
		]);

		Rol::create([
			'name'=>'Solicitante',
			'abreviation'=>'sol'
		]);

		Rol::create([
			'name'=>'Operacional',
			'abreviation'=>'ope'
		]);

    }
}
