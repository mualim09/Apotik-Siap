<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableItemsTransaksi extends Migration
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
			'id_transaksi'       => [
				'type'           => 'INT',
			],
			'id_obat'       => [
				'type'           => 'INT',
			],
			'jumlah'       => [
				'type'       => 'INT',
			],
			'subtotal'       => [
				'type'       => 'INT',
			],
		]);


		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('items_transaksi');
	}

	public function down()
	{
		//
	}
}
