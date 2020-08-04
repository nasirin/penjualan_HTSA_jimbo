<?php

namespace App\Controllers;

use App\Models\DepartmentModel;
use App\Models\ProdukModel;

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
			'department' => $this->mdepartment->findAll(),
		];
		return view('frontend/pages/home',$data);
	}
}
