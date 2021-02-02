<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		// Create table users
		// Users field
		$this->forge->addField([
			'id' 		=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'nip' 		=> ['type' => 'int', 'constraint' => 11],
			'username' 	=> ['type' => 'varchar', 'constraint' => 100],
			'password' 	=> ['type' => 'varchar', 'constraint' => 100],
			'fullname' 	=> ['type' => 'varchar', 'constraint' => 100, 'null' => true],
			'phone'    	=> ['type' => 'varchar', 'constraint' => 12, 'null' => true],
			'email'    	=> ['type' => 'varchar', 'constraint' => 100, 'null' => true],
			'division' 	=> ['type' => 'varchar', 'constraint' => 100, 'null' => true],
			'photo'		=> ['type' => 'varchar', 'constraint' => 100, 'default' => 'default.jpg'],
			'level'    	=> ['type' => 'varchar', 'constraint' => 100, 'null' =>  true],
			'role_id'  	=> ['type' => 'int', 'constraint' => 2, 'default' => 2],
			'token'		=> ['type' => 'varchar', 'constraint' => 100],
			'created_at'	=> ['type' => 'DATETIME'],
			'updated_at'   => ['type' => 'DATETIME']
		]);

		// Add key for field
		$this->forge->addKey('id', true);
		$this->forge->addUniqueKey('email');
		$this->forge->addUniqueKey('nip');
		$this->forge->addUniqueKey('username');

		// Create table
		$this->forge->createTable('users', true);

		// Create role users
		// Create field for users table
		$this->forge->addField([
			'id'			=> ['type' => 'int', 'unsigned' => true, 'auto_increment' => true],
			'role_name'	=> ['type' => 'varchar', 'constraint' => 100]
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('role_users', true);

		// Create nip users table
		$this->forge->addField([
			'id'		=> ['type' => 'int', 'unsigned' => true, 'auto_increment' => true],
			'nip'	=> ['type' => 'int']
		]);

		$this->forge->addKey('id', true);
		$this->forge->addUniqueKey('nip');
		$this->forge->createTable('nip_users');

		// Create ruang table
		$this->forge->addField([
			'id'				=> ['type' => 'int', 'unsigned' => true, 'auto_increment' => true],
			'loaner_id'		=> ['type' => 'int'],
			'loaner_name'		=> ['type' => 'varchar', 'constraint' => 100],
			'division'		=> ['type' => 'varchar', 'constraint' => 100],
			'phone'			=> ['type' => 'varchar', 'constraint' => 12],
			'activity_name'	=> ['type' => 'varchar', 'constraint' => 100],
			'activity_type'	=> ['type' => 'varchar', 'constraint' => 100],
			'start_time'		=> ['type' => 'datetime'],
			'end_time'		=> ['type' => 'datetime'],
			'involved_party' 	=> ['type' => 'varchar', 'constraint' => 100],
			'invitation_number' => ['type' => 'int', 'constraint' => 4],
			'room' 			=> ['type' => 'varchar', 'constraint' => 100],
			'proposal' 		=> ['type' => 'varchar', 'constraint' => 100, 'null' => true],
			'status' 			=> ['type' => 'ENUM("MENUNGGU","BATAL","SETUJU")', 'default' => 'MENUNGGU'],
			'created_at'		=> ['type' => 'DATETIME'],
			'updated_at'		=> ['type' => 'DATETIME']
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('room');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('users', true);
		$this->forge->dropTable('role_users', true);
		$this->forge->dropTable('nip_users', true);
		$this->forge->dropTable('room', true);
	}
}
