<?php

namespace App\Controllers;

use App\Models\PesananDetailModel;
use App\Models\PesananModel;

class Pesanan extends BaseController
{
    protected $pesanan;
    protected $pesananDetail;

    public function __construct()
    {
        $this->pesanan = new PesananModel();
        $this->pesananDetail = new PesananDetailModel();
    }

    public function batal($id)
    {
        $this->pesanan->batal($id);
        session()->setFlashdata('success', 'Pesanan Di Batalkan');
        return redirect()->to('/profil');
    }

    public function konfirmasi($id)
    {
        echo 'halaman konfirmasi';
    }

    public function invoice($id)
    {        
        $data = [
            'pessananBody' => $this->pesananDetail->getBody(),
            'pessananHead' => $this->pesananDetail->getHead(),
        ];

        return view('frontend/pages/invoice/invoice', $data);
    }
}
