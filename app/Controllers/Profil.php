<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\PelangganModel;
use App\Models\PesananDetailModel;

class Profil extends BaseController
{
    protected $mkeranjang;
    protected $pelanggan;
    protected $pesananDetail;

    public function __construct()
    {
        $this->mkeranjang = new KeranjangModel();
        $this->pelanggan = new PelangganModel();
        $this->pesananDetail = new PesananDetailModel();
    }

    public function index()
    {
        // $pesanan = $this->pesananDetail->getHead();
        // dd($pesanan);
        $data = [
            'total_keranjang' => $this->mkeranjang->countAllResults(),
            'pelanggan' => $this->pelanggan->find(session('id')),
            'pesananHead' => $this->pesananDetail->getHead(),
            'pesananBody' => $this->pesananDetail->getBody()
        ];
        return view('frontend/pages/profil', $data);
    }

    public function ubah($id)
    {
        $post = $this->request->getPost();
        // dd($post);
        $pelanggan = $this->pelanggan->find(session('id'));
        $this->pelanggan->ubah($post, $id, $pelanggan);
        session()->setFlashdata('success', 'Data Berhasil Di ubah');
        return redirect()->to('/profil');
    }
}
