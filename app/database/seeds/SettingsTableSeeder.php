<?php

class SettingsTableSeeder extends Seeder{
	public function run(){
		DB::table('settings')->insert(array(
				'key'			=>	'default_background',
				'value'			=>	'#222'
			));
		DB::table('settings')->insert(array(
				'key'			=>	'default_font',
				'value'			=>	'#fff'
			));
		DB::table('settings')->insert(array(
				'key'			=>	'background',
				'value'			=>	'#222'
			));
		DB::table('settings')->insert(array(
				'key'			=>	'font',
				'value'			=>	'#fff'
			));
	}
}