<?php

namespace App\Controllers\backend;

use App\Controllers\BaseController;
use App\Models\DepartmentModel;
// use App\Models\departmentModel;

class DepartmentController extends BaseController
{

    // protected $mdepartment;
    protected $mdepartment;

    public function __construct()
    {
        // $this->mdepartment = new departmentModel();
        $this->mdepartment = new DepartmentModel();
    }

    public function index()
    {
        $data = [
            'title' => 'HTSA | Department',
            'active' => 'department',
            'department' => $this->mdepartment->findAll(),
            'validasi' => \Config\Services::validation(),
            'get' => $this->mdepartment->get(),
        ];

        return view('backend/pages/department', $data);
    }

    public function simpan()
    {
        $data = $this->request->getVar('department');
        // buat validasi
        if (!$this->validate([
            'department' => [
                'rules' => 'required|is_unique[department.nama_department]',
                'errors' => [
                    'required' => 'Kolom Tidak boleh kosong!',
                    'is_unique' => 'Department Sudah Tersedia'
                ]
            ]
        ])) {
            session()->setFlashdata('error', 'Opss! input gagal, Silahkan periksa kembali.');
            return redirect()->to('/department')->withInput();
        };

        // simpan data
        $this->mdepartment->simpan($data);
        session()->setFlashdata('success', 'Data Berhasil Di Tambah');
        return redirect()->to('/department');
    }

    public function ubah($id)
    {
        $data = $this->request->getVar('department');
        // buat validasi
        if (!$this->validate([
            'department' => [
                'rules' => 'required|is_unique[department.nama_department]',
                'errors' => [
                    'required' => 'Kolom Tidak boleh kosong!',
                    'is_unique' => 'Department Sudah Tersedia'
                ]
            ]
        ])) {
            session()->setFlashdata('error', 'Opss! input gagal, Silahkan periksa kembali.');
            return redirect()->to('/department')->withInput();
        };

        // simpan data
        $this->mdepartment->ubah($data, $id);
        session()->setFlashdata('success', 'Data Berhasil Di Ubah');
        return redirect()->to('/department');
    }

    public function hapus($id)
    {
        $this->mdepartment->delete($id);
        session()->setFlashdata('success', 'Data berhasil di hapus');
        return redirect()->to("/department");
    }
}
