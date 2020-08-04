<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    public function login($post)
    {
        return $this->db->table('pelanggan')
            ->where('email', $post['email'])
            ->where('password',md5($post['pass']))
            ->get()->getRowArray();
    }

    public function kode()
    {
        $code = $this->db->query("SELECT MAX(RIGHT(id_pel,3)) AS kd From pelanggan");
        $kd = "";
        if ($code->getFieldCount() > 0) {
            foreach ($code->getResult() as $k) {
                $tmp = ((int)$k->kd) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "PEL" . '-' . date('my') . '-' . $kd;
    }

    public function daftar($post)
    {
        $data = [
            'id_pel' => $this->kode(),
            'nama' => $post['name'],
            'email' => $post['email'],
            'password' => md5($post['pass']),
            'notelp' => $post['notelp'],
            'alamat' => $post['alamat']
        ];
        $this->db->table('pelanggan')
            ->insert($data);
    }
}
