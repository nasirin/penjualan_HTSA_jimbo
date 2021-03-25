<?php

namespace App\Controllers;

use App\Models\KeranjangDetailModel;
use App\Models\KeranjangModel;
use App\Models\ProdukModel;

class Keranjang extends BaseController
{
    protected $mkeranjang;
    protected $mdetailkeranjang;
    protected $produk;

    public function __construct()
    {
        $this->mkeranjang = new KeranjangModel();
        $this->mdetailkeranjang = new KeranjangDetailModel();
        $this->produk = new ProdukModel();
    }

    public function index()
    {
        if (session()->get('username') == '') {
            return redirect()->to('/login');
        }

        $data = [
            'keranjang' => $this->mdetailkeranjang->keranjang(session('id')),
            'total_keranjang' => $this->mdetailkeranjang->total_keranjang(),
            'subtotal' => $this->mdetailkeranjang->subtotal()
        ];
        return view('frontend/pages/cart', $data);
    }

    public function tambah($id)
    {
        if (session()->get('username') == '') {
            return redirect()->to('/login');
        }

        $post = $this->request->getVar();

        $cekpel = $this->mkeranjang->cekPel(session('id'));
        $cekproduk = $this->mdetailkeranjang->cekProd($post['idProduk']);
        // dd($cekproduk);


        if ($cekpel) {
            if ($cekproduk) {
                $getProduk = $this->produk->get_data($post['idProduk']);
                // dd($getProduk);
                $this->mdetailkeranjang->stockin($post, $cekproduk, $getProduk);
            } else {
                $getProduk = $this->produk->get_data($post['idProduk']);
                $this->mdetailkeranjang->simpan($post, $cekpel, $getProduk);
            }
        } else {
            $this->mkeranjang->tambah($post);
            $cekpel = $this->mkeranjang->cekPel(session('id'));
            $getProduk = $this->produk->get_data($post['idProduk']);
            $this->mdetailkeranjang->simpan($post, $cekpel, $getProduk);
        }

        return redirect()->to('/');
    }

    public function hapus($id)
    {
        $this->mkeranjang->delete($id);
        return redirect()->to('/cart');
    }
}
