<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TransaksiController extends BaseController
{
	public function beli_obat()
	{

		$obatModel = new \App\Models\Obat();

		$obat = $obatModel->findAll();
		echo view('pages/transaksi/beli_obat', compact('obat'));
	}

	public function add_to_cart()
	{
		$request = \Config\Services::request();
		$obatModel = new \App\Models\Obat();


		session()->setFlashData('success', 'Berhasil menambahkan ke keranjang!');
		return redirect()->to(route_to('transaksi.beli_obat'));
	}

	public function penjualan()
	{
		$obatModel = new \App\Models\Obat();

		$obat = $obatModel->findAll();

		echo view('pages/transaksi/penuualan');
	}
}
