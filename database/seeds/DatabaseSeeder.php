<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		 $this->call(AreasTableSeeder::class);
		 $this->call(RolesTableSeeder::class);
		 $this->call(UsersTableSeeder::class);
		 $this->call(PatiosTableSeeder::class);
		 $this->call(BusesTableSeeder::class);
		 $this->call(LevelsTableSeeder::class);
		 $this->call(CodesTableSeeder::class);
		 $this->call(PeopleTableSeeder::class);
		 $this->call(TicketsTableSeeder::class);

    }
}
