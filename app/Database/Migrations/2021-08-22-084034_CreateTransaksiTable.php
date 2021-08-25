<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransaksiTable extends Migration
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
			'nama_pembeli'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'bulan'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'tanggal_transaksi'       => [
				'type'       => 'DATETIME',
			],
			'total_harga'       => [
				'type'       => 'INT',
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('transaksi');
	}

	public function down()
	{
		//
	}
}
