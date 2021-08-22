<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{

	public function index()
	{
		$obatModel = new \App\Models\Obat();
		$jumlah_obat = $obatModel->countAll();
		echo view('pages/dashboard', compact('jumlah_obat'));
	}
}
