<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LaporanController extends BaseController
{
	public function grafik()
	{
		$db      = \Config\Database::connect();

		$pendapatan = $db->query('SELECT SUM(total_harga) as total_pendapatan,MONTH(tanggal_transaksi) as bulan from transaksi where YEAR(tanggal_transaksi) = YEAR(CURDATE()) GROUP BY YEAR(tanggal_transaksi),MONTH(tanggal_transaksi) ORDER BY MONTH(tanggal_transaksi) ASC')->getResult();

		echo view('pages/laporan/grafik', compact('pendapatan'));
	}
}
