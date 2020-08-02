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
			'title' => 'HTSA|Dashboard',
			'active' => 'home'
		];
		return view('backend/pages/home', $data);
	}

	public function hapus($id)
	{
		$this->mdepartment->delete($id);
		session()->setFlashdata('success', 'Data berhasil di hapus');
		return redirect()->to("/produk");
	}
}
