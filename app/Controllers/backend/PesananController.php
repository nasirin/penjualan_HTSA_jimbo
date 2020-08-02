<?php

namespace App\Controllers\backend;

use App\Controllers\BaseController;
use App\Models\PesananModel;

class PesananController extends BaseController
{
    protected $mpesanan;

    public function __construct()
    {
        $this->mpesanan = new PesananModel();
    }
    public function index()
    {
        $data = [
            'title' => "HTSA | Pesanan",
            'active' => "pesanan",
            'pesanan' => $this->mpesanan->get_all()
        ];
        return view('backend/pages/pesanan', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => "HTSA | Pesanan",
            'active' => "pesanan",
            'pesanan' => $this->mpesanan->detail($id)
        ];
        return view('backend/pages/detail_pesanan', $data);
    }
    public function show_invoice()
    {
        $data = [
            'title' => "HTSA | Pesanan",
            'active' => "pesanan",
            // 'pesanan' => $this->mpesanan->detail()
        ];
        return view('backend/pages/invoice', $data);
    }

    public function print()
    {
        $data = [
            'title' => "HTSA | Pesanan",
            'active' => "pesanan",
            // 'pesanan' => $this->mpesanan->detail()
        ];
        return view('backend/pages/invoice_print',$data);
    }
}
