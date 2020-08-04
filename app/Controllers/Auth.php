<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    protected $mauth;

    public function __construct()
    {
        $this->mauth = new AuthModel();
    }

    public function index()
    {
        return view('frontend/login');
    }

    public function login()
    {
        $post = $this->request->getVar();
        // $pass = md5($post['pass']);
        // dd($pass);
        $user = $this->mauth->login($post);

        if ($user) {
            $data = [
                'username' => $user['nama'],
                'level' => 'pelanggan'
            ];
            session()->set($data);
            return redirect()->to('/');
        } else {
            session()->setFlashdata('error', 'email atau password salah');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function daftar()
    {
        return view('frontend/daftar');
    }

    public function register()
    {
        // buat validasi untuk email tidak boleh sama
        
        $post = $this->request->getVar();
        $data = $this->mauth->daftar($post);

        if($this->mauth->affectedRows() > 0){
            session()->setFlashdata('success','Pendaftaran Berhasil Silahkan Login');
            return redirect()->to('/login');
        }else{
            session()->setFlashdata('error','failed');
            return redirect()->to('/daftar');
        }

    }
}
