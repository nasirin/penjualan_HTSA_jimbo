<?php

namespace App\Controllers\backend;

use App\Models\DepartmentModel;
use App\Models\ProdukModel;
use App\Controllers\BaseController;
use App\Models\PelangganModel;
use App\Models\PesananModel;

class Home extends BaseController
{

	protected $mproduk;
	protected $mdepartment;
	protected $mpesanan;
	protected $mpelanggan;

	public function __construct()
	{
		$this->mproduk = new ProdukModel();
		$this->mdepartment = new DepartmentModel();
		$this->mpesanan = new PesananModel();
		$this->mpelanggan = new PelangganModel();
		
	}

	public function index()
	{
		// $totalProduk = $this->mpesanan->lastPesanan();
		// dd($totalProduk);
		$data = [
			'title' => 'HTSA | Department',
			'active' => 'home',
			'totalProduk' => $this->mproduk->totalProduk(),
			'totalPenjualan' => $this->mpesanan->totalPesananSuccess(),
			'totalPelanggan' => $this->mpelanggan->totalPelanggan(),
			'lastOrder' => $this->mpesanan->lastPesanan(),
		];
		return view('backend/pages/home', $data);
	}
}
