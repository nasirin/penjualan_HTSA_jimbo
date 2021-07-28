<?php

namespace App\Controllers\backend;

use App\Controllers\BaseController;
use App\Models\PesananDetailModel;
use App\Models\PesananModel;

class PesananController extends BaseController
{
    protected $mpesanan;
    protected $detailPesanan;

    public function __construct()
    {
        $this->mpesanan = new PesananModel();
        $this->detailPesanan = new PesananDetailModel();
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

    public function show_invoice($id)
    {
        $data = [
            'title' => "HTSA | Pesanan",
            'active' => "pesanan",
            'head' => $this->detailPesanan->getHead($id),
            'body' => $this->detailPesanan->getBody($id),
            'total' => $this->mpesanan->where('id_pes', $id)->first()
        ];

        // dd($data);
        return view('backend/pages/invoice/invoice', $data);
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
