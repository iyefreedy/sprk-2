<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleUsers extends Seeder
{
	public function run()
	{
		//
		$this->db->table('role_users')->insert(['role_name' => 'Administrator']);
		$this->db->table('role_users')->insert(['role_name' => 'User']);
	}
}
