<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    public function get_all()
    {
        return $this->db->table('pesanan')
        ->join('keranjang','keranjang.id_ker = pesanan.id_keranjang','left')
        ->join('produk','produk.id_prod = pesanan.id_produk','left')
        ->join('pelanggan','pelanggan.id_pel = pesanan.id_pelanggan','left')
        ->get()->getResultArray();
        
    }

    public function detail($id)
    {
        return $this->db->table('pesanan')
        ->join('keranjang','keranjang.id_ker = pesanan.id_keranjang','left')
        ->join('produk','produk.id_prod = pesanan.id_produk','left')
        ->join('pelanggan','pelanggan.id_pel = pesanan.id_pelanggan','left')
        ->where('id_pes',$id)
        ->get()->getRowArray();
    }
}
