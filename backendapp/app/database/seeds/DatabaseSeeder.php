<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('EmergenciesTableSeeder');
		$this->call('DevicesTableSeeder');
		$this->call('HeartratesTableSeeder');
		$this->call('CaloriesTableSeeder');
		$this->call('StepsTableSeeder');
		$this->call('TemperaturesTableSeeder');
		$this->call('DistancesTableSeeder');
	}

}
