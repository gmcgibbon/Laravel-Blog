<?php

use Faker\Factory as Faker;

/**
 * Post Table Seeder
 * 
 * Add default values to posts table
 */
class PostTableSeeder extends Seeder
{
	/**
	 * Seed table
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		DB::table('posts')->delete();

		// create 36 random posts
		foreach (range(1, 36) as $i)
		{
			// build fake data, then create
			$fake_title   = $faker->sentence(rand(3, 8));
			$fake_content = array_map(function($elem)
				{ 
					return "<p>{$elem}</p>";

				}, $faker->paragraphs(rand(3, 12)));

			Post::create(
					[
						'title'   => "{$fake_title}",
						'content' => implode('', $fake_content),
						'user_id' => User::first()->id
					]
				);
		}
	}
}

?>

