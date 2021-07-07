<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangDetailModel extends Model
{
    protected $table = 'detailkeranjang';
    protected $primaryKey = 'id_detail_keranjang';
    protected $allowedFields = ['id_produk', 'id_promo', 'qty_keranjang', 'subtotal_keranjang', 'id_keranjang'];
    protected $useTimestamps = false;

    public function get($id = null)
    {
        if ($id) {
            return $this->db->table($this->table)
                ->join('keranjang', 'keranjang.id_ker = detailkeranjang.id_keranjang', 'left')
                ->join('produk', 'produk.id_prod = detailkeranjang.id_produk', 'left')
                ->join('promo', 'promo.id_promo = detailkeranjang.id_promo', 'left')
                ->where('detailkeranjang.id_detail_keranjang', $id)
                ->get()->getRowArray();
        } else {
            return $this->db->table($this->table)
                ->join('keranjang', 'keranjang.id_ker = detailkeranjang.id_keranjang', 'left')
                ->join('produk', 'produk.id_prod = detailkeranjang.id_produk', 'left')
                ->join('promo', 'promo.id_promo = detailkeranjang.id_promo', 'left')
                ->get()->getResultArray();
        }
    }

    public function keranjang($id)
    {
        return $this->db->table($this->table)
            ->join('keranjang', 'keranjang.id_ker = detailkeranjang.id_keranjang', 'left')
            ->join('produk', 'produk.id_prod = detailkeranjang.id_produk', 'left')
            ->join('promo', 'promo.id_promo = detailkeranjang.id_promo', 'left')
            ->where('id_pelanggan', $id)
            ->get()->getResultArray();
    }

    public function cekPel($id)
    {
        return $this->db->table($this->table)
            ->join('keranjang', 'keranjang.id_ker = detailkeranjang.id_keranjang', 'left')
            ->join('produk', 'produk.id_prod = detailkeranjang.id_produk', 'left')
            ->join('promo', 'promo.id_promo = detailkeranjang.id_promo', 'left')
            ->where('detailkeranjang.id_detail_keranjang', $id)
            ->get()->getRowArray();
    }

    public function cekProd($id)
    {
        return $this->db->table($this->table)
            ->join('keranjang', 'keranjang.id_ker = detailkeranjang.id_keranjang', 'left')
            ->join('produk', 'produk.id_prod = detailkeranjang.id_produk', 'left')
            ->join('promo', 'promo.id_promo = detailkeranjang.id_promo', 'left')
            ->where('id_produk', $id)
            ->get()->getRowArray();
    }

    public function simpan($post, $keranjang, $produk)
    {
        $subtotal1 = $produk['harga_produk'] * $post['qty'];
        $subtotal2 = ($produk['harga_produk'] * $produk['potongan'] / 100) * $post['qty'];

        $data['id_produk'] = $post['idProduk'];
        if ($post['promo']) {
            $data['id_promo'] = $post['promo'];
        }
        $data['qty_keranjang'] = $post['qty'];

        if ($post['promo']) {
            $data['subtotal_keranjang'] = $subtotal2;
        } else {
            $data['subtotal_keranjang'] = $subtotal1;
        }
        $data['id_keranjang'] = $keranjang['id_ker'];

        $this->db->table($this->table)->insert($data);
    }

    public function stockin($post, $keranjang, $produk)
    {
        $subtotal1 = $produk['harga_produk'] * $post['qty'];
        $subtotal2 = ($produk['harga_produk'] * $produk['potongan'] / 100) * $post['qty'];

        $data['qty_keranjang'] = $keranjang['qty_keranjang'] + $post['qty'];

        if ($post['promo']) {
            $data['subtotal_keranjang'] = $subtotal2;
        } else {
            $data['subtotal_keranjang'] = $subtotal1;
        }

        $this->db->table($this->table)
            ->where('id_produk', $post['idProduk'])
            ->update($data);
    }

    public function subtotal()
    {
        return $this->db->table($this->table)
            ->selectSum('subtotal_keranjang')->get()->getRowArray();
    }

    public function total_keranjang()
    {
        return $this->db->table($this->table)
            ->join('keranjang', 'keranjang.id_ker = detailkeranjang.id_keranjang', 'left')
            ->where('id_pelanggan', session()->get('id'))->countAllResults();
    }

    public function hapus($keranjang, $produk)
    {
        $this->db->table($this->table)
            ->where('id_keranjang', $keranjang)
            ->where('id_produk', $produk)
            ->delete();
    }
}
