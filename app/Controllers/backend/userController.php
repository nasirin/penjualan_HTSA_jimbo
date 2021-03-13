<?php

namespace App\Controllers\backend;

use App\Controllers\BaseController;
use App\Models\UserModel;

class userController extends BaseController
{

    protected $muser;

    public function __construct()
    {
        $this->muser = new UserModel();
    }

    public function index()
    {
        $data =[
            'title' => 'HTSA | User',
            'active' => 'user',
            'user' => $this->muser->get(),
            'no' => 1,
        ];

        return view('backend/pages/user/user',$data);
    }

    public function tambah()
    {
        $data =[
            'title' => 'HTSA | User',
            'active' => 'user',
        ];

        return view('backend/pages/user/user_tambah',$data);
    }

    public function ganti($id)
    {
        $data =[
            'title' => 'HTSA | User',
            'active' => 'user',
            'user' => $this->muser->get($id),
        ];

        return view('backend/pages/user/user_ubah',$data);
    }

    public function simpan()
    {
        $post = $this->request->getVar();
        // dd($post);

        $this->muser->tambah($post);
        session()->setFlashdata('success','Data Berhasil ditambah');
        return redirect()->to('/user');
    }

    public function ubah($id)
    {
        $post = $this->request->getVar();
        // dd($post);

        $this->muser->ubah($post);
        session()->setFlashdata('success','Data Berhasil ditambah');
        return redirect()->to('/user');
    }

    public function hapus($id)
    {
        $this->muser->hapus($id);
        session()->setFlashdata('success','Data Terhapus');
        return redirect()->to('/user');
    }
}
