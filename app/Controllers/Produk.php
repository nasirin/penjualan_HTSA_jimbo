<?php

namespace App\Controllers;

use App\Models\DepartmentModel;

class Produk extends BaseController
{
    protected $mdepartment;

    public function __construct()
    {
        $this->mdepartment = new DepartmentModel();
    }

    public function index()
    {
        $data = [
            'department' => $this->mdepartment->findAll(),
        ];

        return view('frontend/pages/detail', $data);
    }

    public function cart()
    {
        return view('frontend/pages/cart');
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
}
