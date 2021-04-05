<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{


    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pel';
    protected $allowedFields = ['id_pel', 'nama', 'email', 'password', 'notelp', 'alamat'];

    public function totalPelanggan()
    {
        return $this->db->table('pelanggan')->countAllResults();
    }

    public function ubah($post, $id, $pelanggan)
    {
        if ($post['password']) {
            $password = $post['password'];
        } else {
            $password = $pelanggan['password'];
        }
        $data = [
            'nama' => $post['nama'],
            'email' => $post['email'],
            'password' => $password,
            'notelp' => $post['notelp'],
            'alamat' => $post['alamat'],
        ];

        $this->update([$this->primaryKey, $id], $data);
    }
}
