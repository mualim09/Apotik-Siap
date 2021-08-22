<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TransaksiController extends BaseController
{
	public function beli_obat()
	{
		echo view('pages/transaksi/beli_obat');
	}

	public function penjualan()
	{
		echo view('pages/transaksi/penuualan');
	}
}
