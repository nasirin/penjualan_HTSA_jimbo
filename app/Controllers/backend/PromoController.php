<?php

namespace App\Controllers\backend;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\PromoModel;

class PromoController extends BaseController
{

    protected $mprommo;
    protected $mproduk;

    public function __construct()
    {
        $this->mprommo = new PromoModel();
        $this->mproduk = new ProdukModel();
    }

    public function index()
    {

        $data = [
            'title' => 'HTSA | Promo',
            'active' => 'promo',
            'promo' => $this->mprommo->findAll(),
            // 'department' => $this->mdepartment->findAll(),
            'validasi' => \Config\Services::validation(),
            // 'get' => $this->mproduk->get(),
        ];

        return view('backend/pages/promo/promo', $data);
    }

    public function tambah()
    {

        $data = [
            'title' => 'HTSA | Promo',
            'active' => 'promo',
            'promo' => $this->mprommo->findAll(),
            // 'department' => $this->mdepartment->findAll(),
            'validasi' => \Config\Services::validation(),
            'kode' => $this->mprommo->kode(),
        ];

        return view('backend/pages/promo/promo_tambah', $data);
    }

    public function simpan()
    {
        // valdation
        $valid = [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom {field} wajib di isi!'
            ]
        ];
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[promo.nama_promo]',
                'errors' => [
                    'required' => 'Kolom {field} wajib di isi!',
                    'is_unique' => 'Nama promo sudah tersedia!'
                ]
            ],
            'potongan' => $valid,
            'status' => $valid,
        ])) {
            return redirect()->to('/promo/tambah')->withInput();
        }

        // ambil inputan
        $post = $this->request->getVar();

        $this->mprommo->simpan($post,);
        session()->setFlashdata('success', 'Data Berhasil Di Tambah');
        return redirect()->to('/admin/promo');
    }

    public function detail($id)
    {
        $data = [
            'title' => 'HTSA | Promo',
            'active' => 'promo',
            'promo' => $this->mprommo->findAll(),
            // 'department' => $this->mdepartment->findAll(),
            'validasi' => \Config\Services::validation(),
            'get' => $this->mprommo->find($id),
            'produk' => $this->mproduk->produkPromo($id),
            'no'=>1,
        ];
        return view('backend/pages/promo/promo_detail', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'HTSA | Promo',
            'active' => 'promo',
            'promo' => $this->mprommo->findAll(),
            'validasi' => \Config\Services::validation(),
            'get' => $this->mprommo->find($id),
        ];
        return view('backend/pages/promo/promo_ubah', $data);
    }

    public function ubah($id)
    {
        $post = $this->request->getVar();

        $valid = [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom {field} wajib di isi!'
            ]
        ];
        if (!$this->validate([
            'nama' => $valid,
            'potongan' => $valid,
            'status' => $valid,
        ])) {
            return redirect()->to('/promo/edit/' . $id)->withInput();
        }


        $this->mprommo->ubah($post);
        session()->setFlashdata('success', 'Data Promo Berhasil Di Ubah');
        return redirect()->to('/admin/promo');
    }

    public function hapus($id)
    {
        $this->mprommo->delete($id);
        session()->setFlashdata('success', 'Data terhapus');
        return redirect()->to('/admin/promo');
    }
}
