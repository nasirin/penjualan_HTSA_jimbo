<?php

namespace App\Controllers\backend;

use App\Models\DepartmentModel;
use App\Models\ProdukModel;
use App\Controllers\BaseController;

class Home extends BaseController
{

	protected $mproduk;
	protected $mdepartment;

	public function __construct()
	{
		$this->mproduk = new ProdukModel();
		$this->mdepartment = new DepartmentModel();
	}

	public function index()
	{

		$data = [
			'title' => 'HTSA | Department',
			'active' => 'home',
		];
		return view('backend/pages/home', $data);
	}
}
