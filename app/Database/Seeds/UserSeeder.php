<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'username' => 'admin',
			'name'    => 'admin',
			'password' => password_hash('admin', PASSWORD_BCRYPT)
		];


		$this->db->table('user')->insert($data);
	}
}
