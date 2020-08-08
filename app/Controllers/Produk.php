<?php

namespace App\Controllers;

use App\Models\DepartmentModel;
use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $mdepartment;
    protected $mproduk;

    public function __construct()
    {
        $this->mdepartment = new DepartmentModel();
        $this->mproduk = new ProdukModel();
    }

    public function index($id)
    {
        $data = [
            'department' => $this->mdepartment->findAll(),
            'produk' => $this->mproduk->detail($id),
            'varian' => $this->mproduk->varian($id)
        ];

        return view('frontend/pages/detail', $data);
    }

    public function konfirmasi()
    {
        return view('frontend/pages/konfirmasi');
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
        return view('frontend/pages/checkout');
    }
}
