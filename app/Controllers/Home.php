<?php

namespace App\Controllers;

use App\Models\DepartmentModel;
use App\Models\KeranjangModel;
use App\Models\ProdukModel;

class Home extends BaseController
{

	protected $mproduk;
	protected $mdepartment;
	protected $mkeranjang;

	public function __construct()
	{
		$this->mproduk = new ProdukModel();
		$this->mdepartment = new DepartmentModel();
		$this->mkeranjang = new KeranjangModel();
	}

	public function index()
	{
		$data = [
			'department' => $this->mdepartment->findAll(),
			'promo' => $this->mproduk->promo(),
			'produk' => $this->mproduk->get(),
			'total_keranjang' => $this->mkeranjang->countAllResults()
		];
		return view('frontend/pages/home',$data);
	}
}
