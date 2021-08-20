<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'name'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
			],
			'username'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'password'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('user');
	}

	public function down()
	{
		//
	}
}
