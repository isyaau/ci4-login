<?php

namespace App\Controllers;

use CodeIgniter\Validation\Validation;
use CodeIgniter\Controller;

class DataPerjalanan extends BaseController
{
    public function index()
    {
        session();

        $perjalanan = $this->dataperjalananModel;
        $data = [
            // 'session' => $session,
            'perjalanan' => $perjalanan->getPerjalanan(),
            'active'  => 'perjalanan',
            // 'validation' => \Config\Services::validation()
        ];
        return view('data_perjalanan/index', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Asal Harus diisi',
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan Harus diisi',
                ]
            ],
            'jarak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jarak Harus diisi',
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->dataperjalananModel->save([
            'asal' => $this->request->getVar('asal'),
            'tujuan' => $this->request->getVar('tujuan'),
            'jarak' => $this->request->getVar('jarak'),

        ]);
        session()->setFlashdata('pesan', 'Tambah Data Perjalanan Berhasil');
        return redirect()->to('/data-perjalanan');
    }


    public function delete($id_perjalanan)
    {

        $this->dataperjalananModel->delete($id_perjalanan);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/data-perjalanan');
    }
    public function edit($id_perjalanan)
    {
        $dataperjalanan = $this->dataperjalananModel->getPerjalanan($id_perjalanan);
        if (empty($dataperjalanan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Perjalanan Tidak ditemukan !');
        }
        $data = [
            'title' => 'Ubah Data Perjalanan| SIA',
            'active'  => 'perjalanan',
            'validation' => \Config\Services::validation(),
            'dataperjalanan' => $this->dataperjalananModel->getPerjalanan($id_perjalanan)

        ];
        return view('data_perjalanan/edit', $data);
    }

    public function update($id_perjalanan)
    {
        if (!$this->validate([
            'asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Asal Harus diisi',
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan Harus diisi',
                ]
            ],
            'jarak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jarak Harus diisi',
                ]
            ]

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->dataperjalananModel->save([
            'id_perjalanan' => $id_perjalanan,
            'asal' => $this->request->getVar('asal'),
            'tujuan' => $this->request->getVar('tujuan'),
            'jarak' => $this->request->getVar('jarak'),

        ]);
        session()->setFlashdata('pesan', 'Ubah Data Perjalanan Berhasil');
        return redirect()->to('/data-perjalanan');
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
