<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'user';

    public function get($id = null)
    {
        if ($id) {
            return $this->db->table($this->table)
            ->where('id_user',$id)
            ->get()->getRowArray();
        }else {
            return $this->db->table($this->table)
            ->get()->getResultArray();
        }
    }

    public function kode()
    {
        $code = $this->db->query("SELECT MAX(RIGHT(id_user,3)) AS kd From user");
        $kd = "";
        if ($code->getFieldCount() > 0) {
            foreach ($code->getResult() as $k) {
                $tmp = ((int)$k->kd) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "User" . '-' . date('my') . '-' . $kd;
    }

    public function tambah($post)
    {
        $data = [
            'id_user' => $this->kode(),
            'nama_user' => $post['nama'],
            'email_user' => $post['email'],
            'password_user' => $post['password'],
            'notelp_user' => $post['notelp'],
            'alamat_user' => $post['alamat'],
        ];

        $this->db->table('user')->insert($data);
    }

    public function ubah($post)
    {
        $data = [
            'nama_user' => $post['nama'],
            'email_user' => $post['email'],
            'password_user' => $post['password'],
            'notelp_user' => $post['notelp'],
            'alamat_user' => $post['alamat'],
        ];

        $this->db->table('user')->where('id_user',$post['id'])->update($data);
    }

    public function hapus($id)
    {
        $this->db->table('user')->where('id_user',$id)->delete();
    }


}