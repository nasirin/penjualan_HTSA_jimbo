<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';

    // public function cek($email,$password)
    public function cek($post)
    {
        return $this->db->table('user')
            // ->where(array('email_user' => $email, 'password_user' => $password))
            ->where('email_user',$post['email'])
            ->where('password_user',$post['password'])
            ->get()->getRowArray();
    }
}
