<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
	public function __construct()
	{
		helper(['form', 'url']);
	}

	public function login()
	{
		echo view('auth/login');
	}


	public function login_process()
	{
		$validation = \Config\Services::validation();
		$request = \Config\Services::request();



		$validation->setRules([
			'username' => 'required',
			'password' => 'required'
		]);

		if (!$validation->run($request->getVar())) {
			session()->setFlashData('errors', $validation->getErrors());
			return redirect()->to('login')->withInput();
		} else {
			var_dump($request->getVar());
		}
	}
}
