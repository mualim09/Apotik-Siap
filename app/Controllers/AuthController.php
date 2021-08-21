<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{

	public function login()
	{
		echo view('auth/login');
	}


	public function login_process()
	{
		$validation = \Config\Services::validation();
		$request = \Config\Services::request();
		$userModel = new \App\Models\User();



		$validation->setRules([
			'username' => 'required',
			'password' => 'required'
		]);

		if (!$validation->run($request->getVar())) {
			session()->setFlashData('errors', $validation->getErrors());
			return redirect()->to('login')->withInput();
		} else {
			if ($user = $userModel->where('username', $request->getVar('username'))->first()) {
				if (password_verify($request->getVar('password'), $user->password)) {
					session()->set([
						'id' => $user->id,
						'username' => $user->username,
						'name' => $user->name,
						'logged_in' => true
					]);
					return redirect()->to('dashboard');
				} else {
					session()->setFlashData('errors', 'Password Salah!');
					return redirect()->to('login');
				}
			} else {
				session()->setFlashData('errors', 'Username tidak di temukan!');
				return redirect()->to('login');
			}
		}
	}

	public function logout()
	{
		session()->destroy();
		session()->setFlashData('success', 'Berhasil logout!');
		return redirect()->to('login');
	}
}
