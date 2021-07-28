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
            'total' => $this->mdetailkeranjang->total_keranjang(session('id')),
            'total_keranjang' => $this->mdetailkeranjang->total_keranjang(),
            'subtotal' => $this->mdetailkeranjang->subtotal(),
            'qtytotal' => $this->mdetailkeranjang->totalqty(),
        ];
        // dd($data);
        return view('frontend/pages/cart', $data);
    }

    public function tambah($id)
    {
        if (session()->get('username') == '') {
            return redirect()->to('/login');
        }

        $post = $this->request->getVar();

        // dd($post);

        $cekpel = $this->mkeranjang->cekPel(session('id'));
        $cekproduk = $this->mdetailkeranjang->cekProd($post['idProduk']);
        // dd($cekproduk);


        if ($cekpel) {
            if ($cekproduk) {
                $getProduk = $this->produk->get_data($post['idProduk']);
                $this->mdetailkeranjang->stockin($post, $cekproduk);
            } else {
                $getProduk = $this->produk->get_data($post['idProduk']);
                $this->mdetailkeranjang->simpan($post, $cekpel);
            }
        } else {
            $this->mkeranjang->tambah($post);
            $cekpel = $this->mkeranjang->cekPel(session('id'));
            $getProduk = $this->produk->get_data($post['idProduk']);
            $this->mdetailkeranjang->simpan($post, $cekpel);
        }

        return redirect()->to('/cart');
    }

    public function hapus($id)
    {
        $post = $this->request->getVar();
        $this->mdetailkeranjang->delete($id);
        $detailkeranjang = $this->mdetailkeranjang->where('id_keranjang', $post['idker'])->first();        
        if ($detailkeranjang) {
            return redirect()->to('/cart');
        } else {
            $this->mkeranjang->delete($post['idker']);
            return redirect()->to('/cart');
        }
    }
}
