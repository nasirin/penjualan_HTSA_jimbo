<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    public function kode()
    {
        $code = $this->db->query("SELECT MAX(RIGHT(id_pes,3)) AS kd From pesanan");
        $kd = "";
        if ($code->getFieldCount() > 0) {
            foreach ($code->getResult() as $k) {
                $tmp = ((int)$k->kd) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "INV" . '-' . date('my') . '-' . $kd;
    }

    public function get_all()
    {
        return $this->db->table('pesanan')
            // ->join('keranjang','keranjang.id_ker = pesanan.id_keranjang','left')
            // ->join('produk','produk.id_prod = pesanan.id_produk','left')
            ->join('pelanggan', 'pelanggan.id_pel = pesanan.id_pelanggan', 'left')
            ->get()->getResultArray();
    }

    public function detail($id)
    {
        return $this->db->table('pesanan_detail')
            ->join('pesanan', 'pesanan.id_pes = pesanan_detail.id_pesanan', 'left')
            ->join('produk', 'produk.id_prod = pesanan_detail.id_produk', 'left')
            ->join('pelanggan', 'pelanggan.id_pel = pesanan_detail.id_pelanggan', 'left')
            ->where('id_pesanan', $id)
            ->get()->getRowArray();
    }

    public function get_detail($id)
    {
        return $this->db->table('pesanan_detail')
            ->join('pesanan', 'pesanan.id_pes = pesanan_detail.id_pesanan', 'left')
            ->join('produk', 'produk.id_prod = pesanan_detail.id_produk', 'left')
            ->where('id_pesanan', $id)
            ->get()->getResultArray();
    }

    public function totalPesananSuccess()
    {
        return $this->db->table('pesanan')
            ->where('status_pesanan', 'success')
            ->countAllResults();
    }

    public function lastPesanan()
    {
        return $this->db->table('pesanan')
            ->limit(10)
            ->orderBy('id_pes', 'desc')
            ->get()->getResultArray();
    }

    public function getLastPesanan()
    {
        return $this->db->table('pesanan')
            ->limit(1)
            ->where('id_pelanggan', session('id'))
            ->orderBy('id_pes', 'desc')
            ->get()->getRowArray();
    }

    public function simpan($post)
    {
        $data = [
            'id_pes' => $this->kode(),
            'id_pelanggan' => session('id'),
            'total_pesanan' => $post['totalBayar'],
            'status_pesanan' => 'pending',
        ];

        $this->db->table('pesanan')->insert($data);
    }
}
