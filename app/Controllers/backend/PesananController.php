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
        if (session()->get('username') == '') {
            return view('backend/login');
        } elseif (session()->get('level') != 'admin') {
            return redirect()->to('/');
        } else {
            $data = [
                'title' => "HTSA | Pesanan",
                'active' => "pesanan",
                'pesanan' => $this->mpesanan->get_all()
            ];
            return view('backend/pages/pesanan', $data);
        }
    }

    public function detail($id)
    {
        if (session()->get('username') == '') {
            return view('backend/login');
        } elseif (session()->get('level') != 'admin') {
            return redirect()->to('/');
        } else {
            $data = [
                'title' => "HTSA | Pesanan",
                'active' => "pesanan",
                'pesanan' => $this->mpesanan->detail($id),
                'detail' => $this->mpesanan->get_detail($id),
            ];
            return view('backend/pages/pesanan_detail', $data);
        }
    }
    public function show_invoice()
    {
        if (session()->get('username') == '') {
            return view('backend/login');
        } elseif (session()->get('level') != 'admin') {
            return redirect()->to('/');
        } else {
            $data = [
                'title' => "HTSA | Pesanan",
                'active' => "pesanan",
                // 'pesanan' => $this->mpesanan->detail()
            ];
            return view('backend/pages/invoice', $data);
        }
    }

    public function print()
    {
        if (session()->get('username') == '') {
            return view('backend/login');
        } elseif (session()->get('level') != 'admin') {
            return redirect()->to('/');
        } else {
            $data = [
                'title' => "HTSA | Pesanan",
                'active' => "pesanan",
                // 'pesanan' => $this->mpesanan->detail()
            ];
            return view('backend/pages/invoice_print', $data);
        }
    }
}
