<?php

namespace App\Controllers;

use App\Models\KeranjangModel;

class Keranjang extends BaseController
{
    protected $mkeranjang;

    public function __construct()
    {
        $this->mkeranjang = new KeranjangModel();
    }

    public function index()
    {
        if (session()->get('username') == '') {
            return redirect()->to('/login');
        }

        $data = [
            'keranjang' => $this->mkeranjang->get(),
            'total_keranjang' => $this->mkeranjang->countAllResults()
        ];
        return view('frontend/pages/cart', $data);
    }

    public function tambah($id)
    {
        if (session()->get('username') == '') {
            return redirect()->to('/login');
        }

        $post = $this->request->getVar();
        $data = $this->mkeranjang->findAll();
        foreach ($data as $key) {
            if ($key['id_produk'] == $post['idProduk']) {
                $this->mkeranjang->tambah_qty($post);
                return redirect()->to('/');
            }
        }

        $this->mkeranjang->tambah($post);
        return redirect()->to('/');
    }

    public function hapus($id)
    {
        $this->mkeranjang->delete($id);
        return redirect()->to('/cart');
    }
}
