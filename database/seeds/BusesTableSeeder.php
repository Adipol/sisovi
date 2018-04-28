<?php

use Illuminate\Database\Seeder;
use App\Bus;

class BusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Bus::create([
			'code'=>'BA-001',
			'license_plate'=>'APK-123',
			'patio_id'=>1,
			'ucm'=>1
		]);

		Bus::create([
			'code'=>'BA-002',
			'license_plate'=>'AP2SDK-123',
			'patio_id'=>2,
			'ucm'=>1
		]);

		Bus::create([
			'code'=>'BA-003',
			'license_plate'=>'APK-123443',
			'patio_id'=>3,
			'ucm'=>1
		]);
    }
}
