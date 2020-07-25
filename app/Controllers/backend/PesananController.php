<?php

namespace App\Controllers\backend;

use App\Controllers\BaseController;

class PesananController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "HTSA | Pesanan",
            'active' => "pesanan"
        ];
        return view('backend/pages/pesanan', $data);
    }
}
