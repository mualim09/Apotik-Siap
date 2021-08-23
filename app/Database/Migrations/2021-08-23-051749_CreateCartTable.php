<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCartTable extends Migration
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
			'jumlah'       => [
				'type'       => 'INT',
			],
			'sub_total'       => [
				'type'       => 'INT',
			],
			'id_obat'       => [
				'type'       => 'INT',
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('cart');
	}

	public function down()
	{
		//
	}
}
