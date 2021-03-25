<?php

namespace App\Controllers;

use App\Models\DepartmentModel;
use App\Models\KeranjangDetailModel;
use App\Models\KeranjangModel;
use App\Models\ProdukModel;

class Home extends BaseController
{

	protected $mproduk;
	protected $mdepartment;
	protected $mkeranjang;
	protected $mdetailkeranjang;

	public function __construct()
	{
		$this->mproduk = new ProdukModel();
		$this->mdepartment = new DepartmentModel();
		$this->mkeranjang = new KeranjangModel();
		$this->mdetailkeranjang = new KeranjangDetailModel();
	}

	public function index()
	{
		// $produk = $this->mproduk->getNonPromo();
		// dd($produk);
		$data = [
			'department' => $this->mdepartment->findAll(),
			'promo' => $this->mproduk->promo(),
			'produk' => $this->mproduk->getNonPromo(),
			'total_keranjang' => $this->mdetailkeranjang->total_keranjang()
		];
		return view('frontend/pages/home', $data);
	}
}
