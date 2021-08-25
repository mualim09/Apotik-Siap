<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use Config\View;

class TransaksiController extends BaseController
{

	public function beli_obat()
	{
		$db      = \Config\Database::connect();
		$obatModel = new \App\Models\Obat();
		$cartModel = new \App\Models\Cart();
		$obat = $obatModel->findAll();


		///ambil data cart
		$builder = $db->table('cart');
		$builder->select('cart.id as id_cart,obat.id as id_obat,cart.jumlah,cart.sub_total,obat.nama,obat.harga');
		$builder->join('obat', 'cart.id_obat = obat.id');
		$query = $builder->get();
		$cart = $query->getResult();


		//hitung total
		$builder = $db->table('cart');
		$builder->select('SUM(sub_total) as total');
		$query = $builder->get();
		$total = $query->getResult()[0];
		$count_cart = $cartModel->countAll();

		echo view('pages/transaksi/beli_obat', compact('obat', 'cart', 'count_cart', 'total'));
	}


	public function beli_obat_process()
	{

		$request = \Config\Services::request();
		$cartModel = new \App\Models\Cart();
		$transaksiModel = new \App\Models\Transaksi();
		$obatModel = new \App\Models\Obat();
		$itemsTransaksiModel = new \App\Models\ItemsTransaksi();
		$validation = \Config\Services::validation();


		$cart = $cartModel->findAll();

		$data = [
			'nama_pembeli' => $request->getVar('nama_pembeli'),
			'tanggal_transaksi' => new Time('now', 'Asia/Jakarta'),
			'tanggal_transaksi' => new Time('now', 'Asia/Jakarta'),
			'total_harga' => $request->getVar('total')
		];
		$transaksi = $transaksiModel->insert($data);



		$validation->setRules([
			'nama_pembeli' => 'required',
		]);

		if (!$validation->run($request->getVar())) {
			session()->setFlashData('errors', 'Periksa kembali input!');
			return redirect()->to(route_to('transaksi.beli_obat'));
		} else {

			if ($transaksi) {
				foreach ($cart as $item) {

					//insert data item transaksi
					$data = [
						'id_transaksi' => $transaksi,
						'jumlah' => $item->jumlah,
						'sub_total' => $item->sub_total,
						'id_obat' => $item->id_obat
					];
					$itemsTransaksiModel->insert($data);


					//ambil data obat dan update stok
					$obat = $obatModel->find($item->id_obat);
					$new_stok = $obat->stok - $item->jumlah;
					$obatModel->update($item->id_obat, [
						'stok' => $new_stok
					]);
				}

				//kosongkan cart
				$cartModel->emptyTable();

				session()->setFlashData('success', 'Transaksi berhasil di proses!');
				return redirect()->to(route_to('transaksi.beli_obat'));
			} else {
				session()->setFlashData('errors', 'Transaksi gagal!');
				return redirect()->to(route_to('transaksi.beli_obat'));
			}
		}
	}

	public function add_to_cart()
	{
		$db      = \Config\Database::connect();
		$request = \Config\Services::request();
		$cartModel = new \App\Models\Cart();
		$obatModel = new \App\Models\Obat();



		//ambil data obat
		$obat = $obatModel->find($request->getVar('id_obat'));

		if ($obat->stok < $request->getVar('jumlah')) {
			session()->setFlashData('errors', 'Stok obat tidak cukup!');
			return redirect()->to(route_to('transaksi.beli_obat'));
		} else {

			if ($cartModel->where('id_obat', $request->getVar('id_obat'))->countAllResults() > 0) {

				$builder = $db->table('cart');
				$builder->select('cart.id as id_cart,obat.id as id_obat,cart.jumlah,cart.sub_total,obat.nama,obat.harga');
				$builder->where('id_obat', $request->getVar('id_obat'));
				$builder->join('obat', 'cart.id_obat = obat.id');
				$query = $builder->get();
				$cart = $query->getResult();


				$newJumlah = $request->getVar('jumlah') + $cart[0]->jumlah;
				$new_sub_total = $cart[0]->harga * $newJumlah;


				$data = [
					'sub_total' => $new_sub_total,
					'jumlah' => $newJumlah
				];


				$builder = $db->table('cart');
				$builder->set($data);
				$builder->where('id_obat', $request->getVar('id_obat'));
				$builder->update();
			} else {

				//hitung sub totaL
				$sub_total = $obat->harga * $request->getVar('jumlah');

				$data = [
					'id_obat' => $request->getVar('id_obat'),
					'sub_total' => $sub_total,
					'jumlah' => $request->getVar('jumlah')
				];

				$cartModel->insert($data);
			}

			session()->setFlashData('success', 'Berhasil menambahkan ke keranjang!');
			return redirect()->to(route_to('transaksi.beli_obat'));
		}
	}

	public function delete_from_cart($id)
	{
		$cartModel = new \App\Models\Cart();
		$cartModel->delete($id);

		session()->setFlashData('success', 'Berhasil menghapus dari keranjang!');
		return redirect()->to(route_to('transaksi.beli_obat'));
	}

	public function penjualan()
	{
		$transaksiModel = new \App\Models\Transaksi();

		$transaksi = $transaksiModel->orderBy('tanggal_transaksi DESC')->findAll();

		echo view('pages/transaksi/penjualan', compact('transaksi'));
	}

	public function invoice($id)
	{
		$transaksiModel = new \App\Models\Transaksi();
		$db      = \Config\Database::connect();



		//transaksi
		$transaksi = $transaksiModel->find($id);

		///ambil data items 
		$builder = $db->table('items_transaksi');
		$builder->select('items_transaksi.id as id_items_transaksi,obat.id as id_obat,items_transaksi.jumlah,items_transaksi.sub_total,obat.nama,obat.harga');
		$builder->join('obat', 'items_transaksi.id_obat = obat.id');
		$builder->where('items_transaksi.id_transaksi', $id);
		$query = $builder->get();
		$items_transaksi = $query->getResult();

		echo View('pages/transaksi/invoice', compact('transaksi', 'items_transaksi'));
	}


	public function print_invoice($id)
	{
		$transaksiModel = new \App\Models\Transaksi();
		$db      = \Config\Database::connect();



		//transaksi
		$transaksi = $transaksiModel->find($id);

		///ambil data items 
		$builder = $db->table('items_transaksi');
		$builder->select('items_transaksi.id as id_items_transaksi,obat.id as id_obat,items_transaksi.jumlah,items_transaksi.sub_total,obat.nama,obat.harga');
		$builder->join('obat', 'items_transaksi.id_obat = obat.id');
		$builder->where('items_transaksi.id_transaksi', $id);
		$query = $builder->get();
		$items_transaksi = $query->getResult();

		echo View('pages/transaksi/invoice', compact('transaksi', 'items_transaksi'));
	}
}
