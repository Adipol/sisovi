<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//Admin
		User::create([
			'name'=>'Admin',
			'email'=>'adipol13@gmail.com',
			'password'=>bcrypt('siri'),
			'rol_id'=>1,
			'keyword'=>bcrypt('siri'),
			'ucm'=>1
		]);

		User::create([
			'name'=>'Solicitante',
			'email'=>'solicitante@email.com',
			'password'=>bcrypt('secret'),
			'rol_id'=>2,
			'keyword'=>bcrypt('secret'),
			'ucm'=>1
		]);

		User::create([
			'name'=>'Operacional',
			'email'=>'operacional@email.com',
			'password'=>bcrypt('secret'),
			'rol_id'=>3,
			'keyword'=>bcrypt('secret'),
			'ucm'=>1
		]);
		
    }
}
