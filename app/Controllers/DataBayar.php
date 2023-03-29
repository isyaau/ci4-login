<?php

namespace App\Controllers;

use CodeIgniter\Validation\Validation;
use CodeIgniter\Controller;

class DataBayar extends BaseController
{
    public function index()
    {
        session();

        $bayar = $this->databayarModel;
        $data = [
            // 'session' => $session,
            'bayar' => $bayar->getBayar(),
            'active'  => 'bayar',
            // 'validation' => \Config\Services::validation()
        ];
        return view('data_bayar/index', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'jenis_bayar' => [
                'rules' => 'required|is_unique[jenis_bayar.jenis_bayar]',
                'errors' => [
                    'required' => 'Jenis bayar Harus diisi',
                    'is_unique' => 'Jenis bayar sudah ada. Jenis bayar tidak boleh sama'
                ]
            ]

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->databayarModel->save([
            'jenis_bayar' => $this->request->getVar('jenis_bayar'),

        ]);
        session()->setFlashdata('pesan', 'Tambah Data Jenis Bayar Berhasil');
        return redirect()->to('/data-bayar');
    }


    public function delete($id_jenisbayar)
    {

        $this->databayarModel->delete($id_jenisbayar);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/data-bayar');
    }
    public function edit($id_jenisbayar)
    {
        $data_bayar = $this->databayarModel->getBayar($id_jenisbayar);
        if (empty($data_bayar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Jenis Bayar Tidak ditemukan !');
        }
        $data = [
            'title' => 'Ubah Data Jenis Bayar| SIA',
            'active'  => 'bayar',
            'validation' => \Config\Services::validation(),
            'databayar' => $this->databayarModel->getBayar($id_jenisbayar)

        ];
        return view('data_bayar/edit', $data);
    }

    public function update($id_jenisbayar)
    {
        if (!$this->validate([
            'jenis_bayar' => [
                'rules' => 'required|is_unique[jenis_bayar.jenis_bayar]',
                'errors' => [
                    'required' => 'Jenis Bayar Harus diisi',
                    'is_unique' => 'Jenis Bayar sudah ada. Jenis Bayar tidak boleh sama'
                ]
            ]

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->databayarModel->save([
            'id_jenisbayar' => $id_jenisbayar,
            'jenis_bayar' => $this->request->getVar('jenis_bayar'),

        ]);
        session()->setFlashdata('pesan', 'Ubah Data Jenis Bayar Berhasil');
        return redirect()->to('/data-bayar');
    }
    // public function update()
    // {

    //     $merk = $this->datamerkModel;
    //     $id = $this->request->getPost('id');
    //     $data = array(
    //         'nama_merk'        => $this->request->getPost('nama_merk'),
    //     );
    //     $merk->updateMerk($data, $id);
    //     return redirect()->to('/data-merk');
    // }
}
