<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananDetailModel extends Model
{
    protected $table = 'pesanan_detail';
    protected $primary = 'id_det';
    protected $allowedFields = ['id_pesanan', 'id_pelanggan', 'id_produk', 'qty_pesanan', 'created_at'];

    public function getHead()
    {
        return $this->db->table($this->table)
            ->join('pesanan', 'pesanan.id_pes = pesanan_detail.id_pesanan', 'left')
            ->join('pelanggan', 'pelanggan.id_pel = pesanan_detail.id_pelanggan', 'left')
            ->join('produk', 'produk.id_prod = pesanan_detail.id_produk', 'left')
            ->where('pelanggan.id_pel', session('id'))
            ->where('pesanan.status_pesanan !=', 'batal')
            ->get()->getRowArray();
    }
    public function getBody()
    {
        return $this->db->table($this->table)
            ->join('pesanan', 'pesanan.id_pes = pesanan_detail.id_pesanan', 'left')
            ->join('pelanggan', 'pelanggan.id_pel = pesanan_detail.id_pelanggan', 'left')
            ->join('produk', 'produk.id_prod = pesanan_detail.id_produk', 'left')
            ->where('pelanggan.id_pel', session('id'))
            ->where('pesanan.status_pesanan !=', 'batal')
            ->get()->getResultArray();
    }
    public function simpan($getlastpesanan, $post, $total)
    {
        for ($i = 0; $i < $total; $i++) {
            $this->insert([
                'id_pesanan' => $getlastpesanan['id_pes'],
                'id_pelanggan' => session('id'),
                'id_produk' => $post['idProduk'][$i],
                'qty_pesanan' => $post['qty'][$i],
            ]);
        }
    }
}
