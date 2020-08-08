<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_prod';
    protected $allowedFields = ['id_prod', 'id_department', 'id_promo', 'nama_produk', 'varian_produk', 'image_produk', 'qty_produk', 'harga_produk', 'ukuran_produk', 'slug_produk', 'keterangan_produk'];
    protected $useTimestamps = false;

    public function get_data($id)
    {
        return $this->db->table('produk')
            ->join('department', 'department.id_depart = produk.id_department')
            ->join('promo', 'promo.id_promo = produk.id_promo', 'left')
            ->where('id_prod', $id)
            ->get()->getRowArray();
    }

    public function detail($id)
    {
        return $this->db->table('produk')
            // ->join('department', 'department.id_depart = produk.id_department')
            ->join('promo', 'promo.id_promo = produk.id_promo', 'left')
            ->where('slug_produk', $id)
            ->get()->getRowArray();
    }

    public function kode()
    {
        $code = $this->db->query("SELECT MAX(RIGHT(id_prod,3)) AS kd From produk");
        $kd = "";
        if ($code->getFieldCount() > 0) {
            foreach ($code->getResult() as $k) {
                $tmp = ((int)$k->kd) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "PRO" . '-' . date('my') . '-' . $kd;
    }

    public function simpan($data, $fileGambar)
    {
        $insert = [
            'id_prod' => $data['idProduk'],
            'id_department' => $data['department'],
            'id_promo' => $data['promo'],
            'nama_produk' => $data['nama'],
            'varian_produk' => $data['varian'],
            'image_produk' => $fileGambar,
            'qty_produk' => $data['qty'],
            'harga_produk' => $data['harga'],
            'ukuran_produk' => $data['size'],
            'slug_produk' => url_title($data['nama'], '-', 'true'),
            'keterangan_produk' => $data['keterangan'],
        ];

        return $this->db->table('produk')
            ->insert($insert);
    }

    public function get()
    {
        return $this->db->table('produk')
            ->join('department', 'department.id_depart = produk.id_department')
            ->join('promo', 'promo.id_promo = produk.id_promo', 'left')
            ->get()->getResultArray();
    }

    public function ubah($data, $gambar)
    {
        $insert['id_department'] = $data['department'];
        $insert['id_promo'] = $data['promo'];
        $insert['nama_produk'] = $data['nama'];
        $insert['varian_produk'] = $data['varian'];
        $insert['image_produk'] = $gambar;
        $insert['qty_produk'] = $data['qty'];
        $insert['harga_produk'] = $data['harga'];
        $insert['ukuran_produk'] = $data['size'];
        $insert['slug_produk'] = url_title($data['nama'], '-', 'true');
        $insert['keterangan_produk'] = $data['keterangan'];

        return $this->db->table('produk')
            ->where('id_prod', $data['idProduk'])
            ->update($insert);
    }

    public function promo()
    {
        return $this->db->table('produk')
            ->join('promo', 'promo.id_promo = produk.id_promo', 'left')
            ->join('department', 'department.id_depart = produk.id_department', 'left')
            ->where('status_promo', 'aktif')
            ->get()->getResultArray();
    }

    public function varian($id)
    {
        return $this->db->table('produk')
            ->select('varian_produk')
            ->where('slug_produk', $id)
            ->get()->getResultArray();
    }
}
