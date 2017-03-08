<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		DB::table('users')->truncate();

		$users = array(
			'firstname' => 'Achyut',
			'lastname' => 'Paudel',
			'email' => 'achyut@mailinator.com',
			'password' => Hash::make('tuyhca'),
			'usertype' => 'manager'
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}
