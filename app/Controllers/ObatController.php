<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ObatController extends BaseController
{

	public function __construct()
	{
		helper(['form', 'url']);
	}

	public function index()
	{
		$obatModel = new \App\Models\Obat();

		$obat = $obatModel->findAll();
		echo view('pages/obat/index', compact('obat'));
	}

	public function create()
	{
		echo view('pages/obat/create');
	}

	public function store()
	{
		$request = \Config\Services::request();
		$obatModel = new \App\Models\Obat();


		$data = [
			'nama' => $request->getVar('nama'),
			'merk' => $request->getVar('merk'),
			'tanggal_exp' => $request->getVar('tanggal_exp'),
			'harga' => $request->getVar('harga'),
			'stok' => $request->getVar('stok'),
		];
		$obatModel->insert($data);
		session()->setFlashData('success', 'Berhasil Menghapus Data!');
		return redirect()->to(route_to('obat.index'));
	}

	public function edit($id)
	{
	}

	public function update($id)
	{
	}

	public function delete($id)
	{
		$obatModel = new \App\Models\Obat();
		$obatModel->delete($id);
		session()->setFlashData('success', 'Berhasil Menghapus Data!');
		return redirect()->to(route_to('obat.index'));
	}
}
