<?php

use Illuminate\Database\Seeder;
use App\Ticket;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Ticket::create([
			'code_area'=>'1',
			'applicant_id'=>2,
			'incident_date'=>'2007-05-29 22:30:48',
			'applicant_obs'=>'HOLA COMOE SYAS',
			'operational_obs'=>'HOLA COMO ESTAS TI',
			'code_id'=>1,
			'bus_id'=>1,
			'level_id'=>1,
			'area_id'=>1,
			'patio'=>1,
			'ucm'=>1,
			'driver'=>'carlos guerra',
			'host'=>'ivone peredo'
		]);
		Ticket::create([
			'code_area'=>'1',
			'applicant_id'=>2,
			'incident_date'=>'2007-05-29 22:30:48',
			'applicant_obs'=>'HOLA COMOE SYAS',
			'operational_obs'=>'HOLA COMO ESTAS TI',
			'code_id'=>1,
			'bus_id'=>1,
			'level_id'=>1,
			'area_id'=>1,
			'patio'=>1,
			'ucm'=>1,
			'driver'=>'carlos endara',
			'host'=>'ivone iturri'
		]);
    }
}
