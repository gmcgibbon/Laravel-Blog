<?php


/**
 * Database Seeder
 * 
 * Insert initial data into database
 */
class DatabaseSeeder extends Seeder 
{

	/**
	 * Run table seeders
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('PostTableSeeder');
	}

}
