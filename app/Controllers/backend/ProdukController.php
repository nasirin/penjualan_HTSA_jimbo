<?php
namespace App\Controllers\backend;
use App\Controllers\BaseController;

class ProdukController extends BaseController
{
    public function index()
    {
        $data = [
            'title'=> 'HTSA | Produk',
            'active' => 'produk'
        ];

        return view('backend/pages/produk',$data);
    }

    public function tambah()
    {
        $data = [
            'title'=> 'HTSA | Produk',
            'active' => 'produk'
        ];

        return view('backend/pages/form-produk',$data);
    }

}