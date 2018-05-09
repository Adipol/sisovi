<?php

use Illuminate\Database\Seeder;
use App\Person;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Person::create([
			'name'=>'Gabriela',
			'firstName'=>'Iturri',
			'lastName'=>'Coca',
			'identity_card'=>6137907,
			'issued'=>'Lp',
			'ucm'=>1
		]);
		
		Person::create([
			'name'=>'Micaela',
			'firstName'=>'Escobar',
			'lastName'=>'Ponce',
			'identity_card'=>6197904,
			'issued'=>'Sc',
			'ucm'=>1
		]);
    }
}
