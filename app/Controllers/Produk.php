<?php

namespace App\Controllers;

use App\Models\DepartmentModel;
use App\Models\KeranjangDetailModel;
use App\Models\KeranjangModel;
use App\Models\PesananDetailModel;
use App\Models\PesananModel;
use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $mdepartment;
    protected $mproduk;
    protected $mkeranjang;
    protected $mdetailkeranjang;
    protected $pesanan;
    protected $pesananDetail;


    public function __construct()
    {
        $this->mdepartment = new DepartmentModel();
        $this->mproduk = new ProdukModel();
        $this->mkeranjang = new KeranjangModel();
        $this->mdetailkeranjang = new KeranjangDetailModel();
        $this->pesanan = new PesananModel();
        $this->pesananDetail = new PesananDetailModel();
    }

    public function index($id)
    {
        $data = [
            'department' => $this->mdepartment->findAll(),
            'produk' => $this->mproduk->detail($id),
            'varian' => $this->mproduk->varian($id),
            'total_keranjang' => $this->mdetailkeranjang->total_keranjang(),
        ];

        return view('frontend/pages/detail', $data);
    }

    public function konfirmasi()
    {
        $data = [
            'total_keranjang' => $this->mdetailkeranjang->total_keranjang(),
        ];
        return view('frontend/pages/konfirmasi', $data);
    }

    public function produk()
    {
        $data = [
            'department' => $this->mdepartment->findAll(),
        ];

        return view('frontend/pages/produk_grid', $data);
    }

    public function checkout()
    {
        $post = $this->request->getVar();
        // dd($post);
        $total = $this->mdetailkeranjang->total_keranjang(session('id'));

        $this->pesanan->simpan($post);
        $getLastPesanan = $this->pesanan->getLastPesanan();
        $this->pesananDetail->simpan($getLastPesanan, $post, $total);
        $this->mdetailkeranjang->hapus($post['idKeranjang']);
        $this->mkeranjang->hapus();

        return view('frontend/pages/checkout');
    }
}
