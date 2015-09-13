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
		 $this->call('LocationTableSeeder');
		 $this->call('VoucherTableSeeder');
		 $this->call('AccountTableSeeder');
		 $this->call('SettingsTableSeeder');
		 $this->call('UsersTableSeeder');
	}

}
