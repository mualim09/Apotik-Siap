<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateObatTable extends Migration
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
			'nama'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
			],
			'merk'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'tanggal_exp'       => [
				'type'       => 'DATE',
			],
			'harga'       => [
				'type'       => 'INT',
			],
			'stok'       => [
				'type'       => 'INT',
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('obat');
	}

	public function down()
	{
		//
	}
}
