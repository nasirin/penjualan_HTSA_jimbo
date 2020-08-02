<?php

namespace App\Controllers;

use App\Models\LoginModel;

class LoginController extends BaseController
{
  protected $mlogin;

  public function __construct()
  {
    $this->mlogin = new LoginModel();
  }

  public function login()
  {
    $post = $this->request->getVar();
    $user = $this->mlogin->cek($post);

    if ($user) {
      $data = [
        'username' => $user['nama_user'],
        'level' => $user['level_user']
      ];
      session()->set($data);
      return redirect()->to('/dashboard');
    } else {
      session()->setFlashdata('error', 'username atau password salah');
      return redirect()->to('/');
    }
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to('/');
  }

  public function daftar()
  {
    $post = $this->request->getVar();
    $this->mlogin->daftar($post);

    if ($this->db->affectedRows() > 0) {
      session()->setFlashdata('success', 'Pendaftaran user baru berhasil');
      return redirect()->to('user');
    } else {
      session()->setFlashdata('error', 'Pendaftaran gagal!');
      return redirect()->to('user');
    }
  }
}
