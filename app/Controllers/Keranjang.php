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
            'total_keranjang' => $this->mkeranjang->total_keranjang()->countAllResults(),
            'subtotal' => $this->mkeranjang->subtotal()
        ];
        return view('frontend/pages/cart', $data);
    }

    public function tambah($id)
    {
        if (session()->get('username') == '') {
            return redirect()->to('/login');
        }

        $post = $this->request->getVar();
        // $keranjang = $this->mkeranjang->findAll();
        $keranjang = $this->mkeranjang->get_qty($post);

        if ($keranjang['id_produk'] == $post['idProduk']) {
            // update qty
            $this->mkeranjang->tambah_qty($post);
            return redirect()->to('/');
        } else {
            // insert data baru
            $this->mkeranjang->tambah($post);
            return redirect()->to('/');
        }
    }

    public function hapus($id)
    {
        $this->mkeranjang->delete($id);
        return redirect()->to('/cart');
    }
}
