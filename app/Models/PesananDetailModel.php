<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananDetailModel extends Model
{
    protected $table = 'pesanan_detail';
    protected $primary = 'id_det';
    protected $allowedFields = ['id_pesanan', 'id_pelanggan', 'id_promo', 'id_produk', 'qty_pesanan', 'created_at'];

    public function getHead($id = null)
    {
        if ($id) {
            return $this->db->table($this->table)
                ->join('pesanan', 'pesanan.id_pes = pesanan_detail.id_pesanan', 'left')
                ->join('pelanggan', 'pelanggan.id_pel = pesanan_detail.id_pelanggan', 'left')
                ->join('produk', 'produk.id_prod = pesanan_detail.id_produk', 'left')
                ->where('pesanan.id_pes', $id)
                // ->where('pesanan.status_pesanan !=', 'batal')
                ->get()->getRowArray();
        } else {
            return $this->db->table($this->table)
                ->join('pesanan', 'pesanan.id_pes = pesanan_detail.id_pesanan', 'left')
                ->join('pelanggan', 'pelanggan.id_pel = pesanan_detail.id_pelanggan', 'left')
                ->join('produk', 'produk.id_prod = pesanan_detail.id_produk', 'left')
                ->where('pelanggan.id_pel', session('id'))
                ->where('pesanan.status_pesanan !=', 'batal')
                ->groupBy('id_pes')
                ->get()->getResultArray();
        }
    }
    public function getBody($id = null)
    {
        if ($id) {
            return $this->db->table($this->table)
                ->join('pesanan', 'pesanan.id_pes = pesanan_detail.id_pesanan', 'left')
                ->join('pelanggan', 'pelanggan.id_pel = pesanan_detail.id_pelanggan', 'left')
                ->join('produk', 'produk.id_prod = pesanan_detail.id_produk', 'left')
                ->join('promo', 'promo.id_promo = pesanan_detail.id_promo', 'left')
                ->where('pesanan.id_pes', $id)
                ->get()->getResultArray();
        } else {
            return $this->db->table($this->table)
                ->join('pesanan', 'pesanan.id_pes = pesanan_detail.id_pesanan', 'left')
                ->join('pelanggan', 'pelanggan.id_pel = pesanan_detail.id_pelanggan', 'left')
                ->join('produk', 'produk.id_prod = pesanan_detail.id_produk', 'left')
                ->join('promo', 'promo.id_promo = pesanan_detail.id_promo', 'left')
                ->where('pelanggan.id_pel', session('id'))
                ->where('pesanan.status_pesanan !=', 'batal')
                // ->groupBy('pesanan.created_at')
                ->get()->getResultArray();
        }
    }

    public function total($id)
    {
        return $this->db->table($this->table)
            ->join('pesanan', 'pesanan.id_pes = pesanan_detail.id_pesanan', 'left')
            ->join('pelanggan', 'pelanggan.id_pel = pesanan_detail.id_pelanggan', 'left')
            ->join('produk', 'produk.id_prod = pesanan_detail.id_produk', 'left')
            ->where('pesanan.id_pes', $id)
            // ->where('pesanan.status_pesanan !=', 'batal')
            ->countAllResults();
    }

    public function simpan($getlastpesanan, $post, $total)
    {
        for ($i = 0; $i < $total; $i++) {
            $this->insert([
                'id_pesanan' => $getlastpesanan['id_pes'],
                'id_pelanggan' => session('id'),
                'id_produk' => $post['idProduk'][$i],
                'id_promo' => $post['idPromo'][$i],
                'qty_pesanan' => $post['qty'][$i],
            ]);
        }
    }

    public function totalPesanan()
    {
        return $this->db->table($this->table)
            ->join('pesanan', 'pesanan.id_pes = pesanan_detail.id_pesanan', 'left')
            ->where('pesanan_detail.id_pelanggan', session('id'))
            ->where('pesanan.status_pesanan !=', 'batal')
            ->countAllResults();
    }
}
