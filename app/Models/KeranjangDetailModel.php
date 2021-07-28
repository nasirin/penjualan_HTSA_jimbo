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

    public function simpan($post, $keranjang)
    {
        $data['id_produk'] = $post['idProduk'];
        if ($post['promo']) {
            $data['id_promo'] = $post['promo'];
        }
        $data['qty_keranjang'] = $post['qty'];

        $data['subtotal_keranjang'] = $post['total'];
        $data['id_keranjang'] = $keranjang['id_ker'];

        $this->db->table($this->table)->insert($data);
    }

    public function stockin($post, $keranjang)
    {

        $data['qty_keranjang'] = $keranjang['qty_keranjang'] + $post['qty'];

        $data['subtotal_keranjang'] = $post['total'];

        $this->db->table($this->table)
            ->where('id_produk', $post['idProduk'])
            ->update($data);
    }

    public function subtotal()
    {
        return $this->db->table($this->table)
            ->selectSum('subtotal_keranjang')
            ->join('keranjang', 'keranjang.id_ker = detailkeranjang.id_keranjang', 'left')
            ->where('id_pelanggan', session('id'))
            ->get()->getRowArray();
    }

    public function totalqty()
    {
        return $this->db->table($this->table)
            ->selectSum('qty_keranjang')
            ->join('keranjang', 'keranjang.id_ker = detailkeranjang.id_keranjang', 'left')
            ->where('id_pelanggan', session('id'))
            ->get()->getRowArray();
    }

    public function total_keranjang()
    {
        return $this->db->table($this->table)
            ->join('keranjang', 'keranjang.id_ker = detailkeranjang.id_keranjang', 'left')
            ->where('id_pelanggan', session()->get('id'))->countAllResults();
    }

    public function hapus($id)
    {
        $this->db->table($this->table)
            ->where('id_keranjang', $id)
            ->delete();
    }
}
