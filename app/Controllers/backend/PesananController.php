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
        return view('backend/pages/pesanan/pesanan', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => "HTSA | Pesanan",
            'active' => "pesanan",
            'pesanan' => $this->mpesanan->detail($id),
            'detail' => $this->mpesanan->get_detail($id),
        ];
        return view('backend/pages/pesanan/pesanan_detail', $data);
    }
    public function show_invoice()
    {

        $data = [
            'title' => "HTSA | Pesanan",
            'active' => "pesanan",
            // 'pesanan' => $this->mpesanan->detail()
        ];
        return view('backend/pages/pesanan/invoice', $data);
    }

    public function print()
    {

        $data = [
            'title' => "HTSA | Pesanan",
            'active' => "pesanan",
            // 'pesanan' => $this->mpesanan->detail()
        ];
        return view('backend/pages/pesanan/invoice_print', $data);
    }
}
