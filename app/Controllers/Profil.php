<?php

namespace App\Controllers;

use App\Models\KeranjangModel;

class Profil extends BaseController
{
    protected $mkeranjang;

    public function __construct()
    {
        $this->mkeranjang = new KeranjangModel();
    }
    public function index()
    {
        $data = [
            'total_keranjang' => $this->mkeranjang->countAllResults()
        ];
        return view('frontend/pages/profil', $data);
    }
}
