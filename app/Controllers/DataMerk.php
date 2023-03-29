<?php

namespace App\Controllers;

use CodeIgniter\Validation\Validation;
use CodeIgniter\Controller;

class DataMerk extends BaseController
{
    public function index()
    {
        session();

        $merk = $this->datamerkModel;
        $data = [
            // 'session' => $session,
            'merk' => $merk->getMerk(),
            'active'  => 'merk',
            // 'validation' => \Config\Services::validation()
        ];
        return view('data_merk/index', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nama_merk' => [
                'rules' => 'required|is_unique[merk.nama_merk]',
                'errors' => [
                    'required' => 'Nama merk Harus diisi',
                    'is_unique' => 'Nama merk sudah ada. Nama merk tidak boleh sama'
                ]
            ]

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->datamerkModel->save([
            'nama_merk' => $this->request->getVar('nama_merk'),

        ]);
        session()->setFlashdata('pesan', 'Tambah Data Merk Berhasil');
        return redirect()->to('/data-merk');
    }


    public function delete($id_merk)
    {

        $this->datamerkModel->delete($id_merk);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/data-merk');
    }
    public function edit($id_merk)
    {
        $datamerk = $this->datamerkModel->getMerk($id_merk);
        if (empty($datamerk)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Merk Tidak ditemukan !');
        }
        $data = [
            'title' => 'Ubah Data Merk| SIA',
            'active'  => 'merk',
            'validation' => \Config\Services::validation(),
            'datamerk' => $this->datamerkModel->getMerk($id_merk)

        ];
        return view('data_merk/edit', $data);
    }

    public function update($id_merk)
    {
        if (!$this->validate([
            'nama_merk' => [
                'rules' => 'required|is_unique[merk.nama_merk]',
                'errors' => [
                    'required' => 'Nama merk Harus diisi',
                    'is_unique' => 'Nama merk sudah ada. Nama merk tidak boleh sama'
                ]
            ]

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->datamerkModel->save([
            'id_merk' => $id_merk,
            'nama_merk' => $this->request->getVar('nama_merk'),

        ]);
        session()->setFlashdata('pesan', 'Ubah Data Merk Berhasil');
        return redirect()->to('/data-merk');
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
