<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class JemaatSeeder extends Seeder
{
	public function run()
	{
		$faker = \Faker\Factory::create('id_ID');
		for ($i = 0; $i < 100; $i++) {
			$data = [
				'name' 		 => $faker->name,
				'address'    => $faker->address,
				'created_at' => Time::createFromTimestamp($faker->unixTime()),
				'updated_at' => Time::now(),
			];
			$this->db->table('jemaat')->insert($data);
		}

		// Simple Queries
		// $this->db->query("INSERT INTO jemaat (name, address, created_at, updated_at) VALUES(:name:, :address:, :created_at:, :updated_at:)", $data);

		// Using Query Builder
	}
}
