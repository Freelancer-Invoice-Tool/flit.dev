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

		DB::table('users')->delete();
		DB::table('clients')->delete();
		DB::table('projects')->delete();

		$this->call('UserTableSeeder');
		$this->call('ClientTableSeeder');
		$this->call('ProjectTableSeeder');
	}

}
