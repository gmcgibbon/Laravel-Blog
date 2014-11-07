<?php

/**
 * User Table Seeder
 * 
 * Add default values to users table
 */
class UserTableSeeder extends Seeder
{
	/**
	 * Seed table
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

		User::create(
			[
				'email'    => 'admin@localhost',
				'password' => Hash::make('3secret9you')
			]
		);
	}
}

?>

