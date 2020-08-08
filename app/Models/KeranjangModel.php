<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table = 'keranjang';
    protected $primaryKey = 'id_ker';
    protected $allowedFields = ['id_pelanggan', 'id_produk', 'varian_pesanan', 'qty', 'created_at', 'updated_at'];
    protected $useTimestamps = false;

    public function get()
    {
        return $this->db->table('keranjang')
            ->join('pelanggan', 'pelanggan.id_pel = keranjang.id_pelanggan', 'left')
            ->join('produk', 'produk.id_prod = keranjang.id_produk', 'left')
            ->join('promo', 'promo.id_promo = keranjang.id_promo', 'left')
            ->get()->getResultArray();
    }

    public function tambah($post)
    {
        $data = [
            'id_pelanggan' => $post['idPel'],
            'id_produk' => $post['idProduk'],
            'id_promo' => $post['promo'],
            'qty' => $post['qty'],
            'created_at' => date('ymd')
        ];

        $this->db->table('keranjang')
            ->insert($data);
    }

    public function tambah_qty($post)
    {
        $qty = $this->db->table('keranjang')
        ->where('id_produk',$post['idProduk'])
        ->get()->getRowArray();
        $data = [
            'qty' => $qty['qty'] + $post['qty'],
            'updated_at' => date('ymd')
        ];

        return $this->db->table('keranjang')
            ->where('id_produk', $post['idProduk'])
            ->update($data);
    }
}
