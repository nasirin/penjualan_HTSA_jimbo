<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table = 'keranjang';
    protected $primaryKey = 'id_ker';
    protected $allowedFields = ['id_pelanggan', 'created_at', 'updated_at'];
    protected $useTimestamps = false;

    public function get()
    {
        return $this->db->table('keranjang')
            ->join('pelanggan', 'pelanggan.id_pel = keranjang.id_pelanggan', 'left')
            ->where('id_pelanggan', session()->get('id'))
            ->get()->getResultArray();
    }

    public function cekPel($id)
    {
        return $this->db->table('keranjang')
            ->join('pelanggan', 'pelanggan.id_pel = keranjang.id_pelanggan', 'left')
            ->where('id_pelanggan', $id)
            ->get()->getRowArray();
    }

    public function get_qty($post)
    {
        return $this->db->table('keranjang')
            ->where('id_produk', $post['idProduk'])
            ->get()->getRowArray();
    }

    public function tambah($post)
    {
        $data = [
            'id_pelanggan' => $post['idPel'],
            // 'created_at' => date('ymd')
        ];

        $this->db->table('keranjang')
            ->insert($data);
    }

    public function tambah_qty($post)
    {
        $qty = $this->db->table('keranjang')
            ->where('id_produk', $post['idProduk'])
            ->get()->getRowArray();
        $cek = $this->db->table('keranjang')
            ->where('id_produk', $post['idProduk'])
            ->get()->getRowArray();

        $data['qty'] = $qty['qty'] + $post['qty'];
        $data['subtotal_keranjang'] = $data['qty'] * $post['total'];
        $data['updated_at'] = date('ymd');

        return $this->db->table('keranjang')
            ->where('id_ker', $cek['id_ker'])
            ->update($data);
    }

    public function hapus()
    {
        $this->db->table($this->table)->where('id_pelanggan', session('id'))->delete();
    }
}
