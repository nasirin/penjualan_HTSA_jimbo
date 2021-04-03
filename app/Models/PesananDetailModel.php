<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananDetailModel extends Model
{
    protected $table = 'pesanan_detail';
    protected $primary = 'id_det';
    protected $allowedFields = ['id_pesanan', 'id_pelanggan', 'id_produk', 'qty_pesanan', 'created_at'];

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
