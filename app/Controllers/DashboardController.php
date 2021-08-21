<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
	public function __construct()
	{
		helper(['form', 'url']);
	}
	public function index()
	{
		echo view('pages/admin/dashboard');
	}
}
