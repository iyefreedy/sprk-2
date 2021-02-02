<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NIPUsers extends Seeder
{
	public function run()
	{
		// Masukkan data secara berulang selama 11 kali
		for ($i = 0; $i <= 10; $i++) {
			$min = pow(10, 8 - 1);
			$max = pow(10, 8) - 1;
			$nip = mt_rand($min, $max);
			$this->db->table('nip_users')->insert(['nip' => $nip]);
		}
	}
}
