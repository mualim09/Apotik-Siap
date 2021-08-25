<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{

	public function index()
	{

		$db      = \Config\Database::connect();
		$obatModel = new \App\Models\Obat();
		$transaksiModel = new \App\Models\Transaksi();



		$jumlah_obat = $obatModel->countAll();

		$pendapatan_bulan_ini = $db->query('SELECT SUM(total_harga) as pendapatan_bulan_ini from transaksi where MONTH(tanggal_transaksi) = MONTH(CURDATE())')->getResult()[0];

		$obat_kadaluarsa = $obatModel->where("(tanggal_exp <= now())")->countAllResults();

		$transaksi_bulan_ini = $transaksiModel->where("MONTH(tanggal_transaksi) = MONTH(CURDATE())")->countAllResults();


		echo view('pages/dashboard', compact('jumlah_obat', 'pendapatan_bulan_ini', 'obat_kadaluarsa', 'transaksi_bulan_ini'));
	}
}
