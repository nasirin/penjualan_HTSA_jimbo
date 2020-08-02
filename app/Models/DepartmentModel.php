<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table = 'department';
    protected $primaryKey = 'id_depart';
    protected $allowedFields = ['department'];

    public function simpan($data)
    {
        $isi = [
            'nama_department' => $data
        ];
        return $this->db->table('department')
            ->insert($isi);
    }

    public function ubah($data,$id)
    {
        $update = [
            'nama_department' => $data,
        ];

        return $this->db->table('department')
        ->where('id_depart',$id)
        ->update($update);
    }
}
