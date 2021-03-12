<?php

namespace App\Controllers\backend;

use App\Controllers\BaseController;
use App\Models\DepartmentModel;
use App\Models\ProdukModel;
use App\Models\PromoModel;

class ProdukController extends BaseController
{
    protected $mproduk;
    protected $mdepartment;
    protected $mpromo;

    public function __construct()
    {
        $this->mproduk = new ProdukModel();
        $this->mdepartment = new DepartmentModel();
        $this->mpromo = new PromoModel();
    }

    public function index()
    {

        $data = [
            'title' => 'HTSA | Produk',
            'active' => 'produk',
            'department' => $this->mdepartment->findAll(),
            'validasi' => \Config\Services::validation(),
            'get' => $this->mproduk->get(),
        ];

        return view('backend/pages/produk', $data);
    }

    public function tambah()
    {

        $data = [
            'title' => 'HTSA | Produk',
            'active' => 'produk',
            'department' => $this->mdepartment->findAll(),
            'validasi' => \Config\Services::validation(),
            'kode' => $this->mproduk->kode(),
            'promo' => $this->mpromo->findAll()
        ];
        return view('backend/pages/produk_tambah', $data);
    }

    public function edit($id)
    {

        $data = [
            'title' => 'HTSA | Produk',
            'active' => 'produk',
            'department' => $this->mdepartment->findAll(),
            'produk' => $this->mproduk->get_data($id),
            'promo' => $this->mpromo->findAll(),
            'validasi' => \Config\Services::validation(),
        ];
        return view('backend/pages/produk_ubah', $data);
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
            'idProduk' => $valid,
            'department' => $valid,
            'nama' => [
                'rules' => 'required|is_unique[produk.nama_produk]',
                'errors' => [
                    'required' => 'Kolom {field} wajib di isi!',
                    'is_unique' => 'Nama produk sudah tersedia!'
                ]
            ],
            'varian' => $valid,
            'qty' => $valid,
            'harga' => $valid,
            'size' => $valid,
            'keterangan' => $valid,
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,1025]|mime_in[gambar,image/jpg,image/jpeg]|is_image[gambar]',
                'errors' => [
                    'uploaded' => ' {field} tidak boleh kosong',
                    'max_size' => '{field} Terlalu Besar',
                    'mime_in' => 'Format gambar tidak di perbolehkan',
                    'is_image' => 'File yang anda masukan bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/produk/tambah')->withInput();
        }
        // ambil inputan
        $input = $this->request->getVar();
        // ambil gambar
        $gambar = $this->request->getFile('gambar');
        $fileGambar = $gambar->getRandomName();
        $gambar->move('img/produk/', $fileGambar);

        // dd($gambar);

        $this->mproduk->simpan($input, $fileGambar);
        session()->setFlashdata('success_produk', 'Data Berhasil Di Tambah');
        return redirect()->to('/admin/produk');
    }

    public function hapus($id)
    {
        // cari file
        $gambar = $this->mproduk->find($id);
        // hapus file
        unlink('img/produk/' . $gambar['image_produk']);

        $this->mproduk->delete($id);

        session()->setFlashdata('success_produk', 'Data berhasil di hapus');
        return redirect()->to('/produk');
    }

    public function ubah($id)
    {
        // valdation
        $valid = [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom {field} wajib di isi!'
            ]
        ];
        if (!$this->validate([
            'department' => $valid,
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} wajib di isi!',
                ]
            ],
            'varian' => $valid,
            'qty' => $valid,
            'harga' => $valid,
            'size' => $valid,
            'keterangan' => $valid,
            'gambar' => [
                'rules' => 'max_size[gambar,1025]|mime_in[gambar,image/jpg,image/jpeg]|is_image[gambar]',
                'errors' => [
                    'max_size' => '{field} Terlalu Besar',
                    'mime_in' => 'Format gambar tidak di perbolehkan',
                    'is_image' => 'File yang anda masukan bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/produk/edit/' . $id)->withInput();
        }

        // ambil inputan
        $input = $this->request->getVar();
        // ambil gambar
        $gambar = $this->request->getFile('gambar');

        if ($gambar->getError() == 4) {
            $insert = $input['gambarLama'];
        } else {
            $getname = $input['gambarLama'];
            unlink('img/produk/' . $getname);
            $insert = $gambar->getRandomname();
            $gambar->move('img/produk/', $insert);
        }

        $this->mproduk->ubah($input, $insert);
        session()->setFlashdata('success_produk', 'Data Berhasil Di ubah');
        return redirect()->to('/admin/produk');
    }

    public function detail($id)
    {

        $data = [
            'title' => 'HTSA | Detail produk',
            'active' => 'produk',
            'department' => $this->mdepartment->findAll(),
            'produk' => $this->mproduk->get_data($id),
        ];
        return view('backend/pages/produk_detail', $data);
    }
}
