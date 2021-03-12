<?php namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model{

    public function totalPelanggan()
    {
        return $this->db->table('pelanggan')->countAllResults();
    }
}