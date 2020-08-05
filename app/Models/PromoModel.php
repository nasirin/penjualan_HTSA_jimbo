<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class PromoModel extends Model
{
    protected $table = 'promo';
    protected $primaryKey = 'id_promo';
    protected $allowedFields = ['id_promo', 'potongan', 'nama_promo', 'status_promo','created_at','updated_at'];

    public function kode()
    {
        $code = $this->db->query("SELECT MAX(RIGHT(id_promo,3)) AS kd From promo");
        $kd = "";
        if ($code->getFieldCount() > 0) {
            foreach ($code->getResult() as $k) {
                $tmp = ((int)$k->kd) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "PROM" . '-' . date('my') . '-' . $kd;
    }

    public function simpan($post)
    {
        $data = [
            'id_promo' => $post['idPromo'],
            'nama_promo' => $post['nama'],
            'potongan' => $post['potongan'],
            'status_promo' => $post['status'],
            'created_at' => date('ymd')
        ];

        $this->db->table('promo')
            ->insert($data);
    }

    public function ubah($post)
    {
        $data = [
            'nama_promo' => $post['nama'],
            'potongan' => $post['potongan'],
            'status_promo' => $post['status'],
            'created_at' => $post['created'],
            'updated_at' => date('ymd')
        ];

        $this->db->table('promo')
            ->where('id_promo', $post['idPromo'])
            ->update($data);
    }
}
