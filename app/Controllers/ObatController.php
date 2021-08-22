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
		$validation = \Config\Services::validation();
		$request = \Config\Services::request();
		$obatModel = new \App\Models\Obat();

		$validation->setRules([
			'nama' => 'required',
			'berat' => 'required',
			'tanggal_exp' => 'required',
			'harga' => 'required',
			'kategori' => 'required',
			'stok' => 'required'
		]);


		if (!$validation->run($request->getVar())) {
			session()->setFlashData('errors', $validation->getErrors());
			return redirect()->to(route_to('obat.create'))->withInput();
		} else {
			$data = [
				'nama' => $request->getVar('nama'),
				'berat' => $request->getVar('berat'),
				'tanggal_exp' => $request->getVar('tanggal_exp'),
				'harga' => $request->getVar('harga'),
				'kategori' => $request->getVar('kategori'),
				'stok' => $request->getVar('stok'),
			];
			$obatModel->insert($data);
			session()->setFlashData('success', 'Berhasil Menambahkan Data!');
		}


		return redirect()->to(route_to('obat.index'));
	}

	public function edit($id)
	{
		$obatModel = new \App\Models\Obat();
		$obat = $obatModel->find($id);
		echo view('pages/obat/edit', compact('obat'));
	}

	public function update($id)
	{
		$obatModel = new \App\Models\Obat();
		$request = \Config\Services::request();


		$data = [
			'nama' => $request->getVar('nama'),
			'berat' => $request->getVar('berat'),
			'tanggal_exp' => $request->getVar('tanggal_exp'),
			'harga' => $request->getVar('harga'),
			'kategori' => $request->getVar('kategori'),
			'stok' => $request->getVar('stok'),
		];
		$obat = $obatModel->update($id, $data);
		session()->setFlashData('success', 'Berhasil Mengubah Data!');
		return redirect()->to(route_to('obat.index'));
	}

	public function delete($id)
	{
		$obatModel = new \App\Models\Obat();
		$obatModel->delete($id);
		session()->setFlashData('success', 'Berhasil Menghapus Data!');
		return redirect()->to(route_to('obat.index'));
	}

	public function obat_habis()
	{
		$obatModel = new \App\Models\Obat();

		$obat = $obatModel->where('stok', 0)->findAll();
		echo view('pages/obat/obat_habis', compact('obat'));
	}

	public function obat_kadaluarsa()
	{
		$obatModel = new \App\Models\Obat();

		$obat = $obatModel->where("(tanggal_exp <= now())")->findAll();

		echo view('pages/obat/obat_kadaluarsa', compact('obat'));
	}
}
