<?php

namespace App\Controllers;

use CodeIgniter\Validation\Validation;
use CodeIgniter\Controller;

class DataPesanan extends BaseController
{
    public function index()
    {
        session();

        $pesanan = $this->datapesananModel;
        $mobil = $this->datamobilModel;
        $pemesan = $this->datapemesanModel;
        $perjalanan = $this->dataperjalananModel;
        $bayar = $this->databayarModel;
        $data = [
            // 'session' => $session,
            'pesanan' => $pesanan->getPesanan(),
            'mobil' => $mobil->getMobil(),
            'pemesan' => $pemesan->getPemesan(),
            'perjalanan' => $perjalanan->getPerjalanan(),
            'bayar' => $bayar->getBayar(),
            'joinpesanan' => $pesanan->joinPesanan(),
            'active'  => 'pesanan',
            // 'validation' => \Config\Services::validation()
        ];
        return view('data_pesanan/index', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'id_pemesan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pemesan harus diisi',
                ]
            ],
            'id_mobil' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama mobil harus diisi',
                ]
            ],
            'id_perjalanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Perjalanan Harus diisi'

                ]
            ],
            'id_jenisbayar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Bayar harus diisi'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Harus diisi'
                ]
            ],
            'tgl_pinjam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tgl pinjam harus diisi'
                ]
            ],
            'tgl_kembali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tgl kembali harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->datapesananModel->save([
            'id_pemesan' => $this->request->getVar('id_pemesan'),
            'id_mobil' => $this->request->getVar('id_mobil'),
            'id_perjalanan' => $this->request->getVar('id_perjalanan'),
            'id_jenisbayar' => $this->request->getVar('id_jenisbayar'),
            'harga' => $this->request->getVar('harga'),
            'tgl_pinjam' => $this->request->getVar('tgl_pinjam'),
            'tgl_kembali' => $this->request->getVar('tgl_kembali')
        ]);
        session()->setFlashdata('pesan', 'Tambah Data Pesanan Berhasil');
        return redirect()->to('/data-pesanan');
    }


    public function delete($id_pesanan)
    {

        $this->datapesananModel->delete($id_pesanan);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/data-pesanan');
    }

    public function edit($id_pesanan)
    {
        $datapesanan = $this->datapesananModel->getPesanan($id_pesanan);
        if (empty($datapesanan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Mobil Tidak ditemukan !');
        }

        $pesanan = $this->datapesananModel;
        $pemesan = $this->datapemesanModel;
        $perjalanan = $this->dataperjalananModel;
        $bayar = $this->databayarModel;
        $mobil = $this->datamobilModel;
        $data = [
            'title' => 'Ubah Data Pesanan| SIA',
            'active'  => 'pesanan',
            'mobil' => $mobil->getMobil(),
            'pemesan' => $pemesan->getPemesan(),
            'perjalanan' => $perjalanan->getPerjalanan(),
            'bayar' => $bayar->getBayar(),
            'joinpesanan' => $pesanan->joinPesanan(),
            'validation' => \Config\Services::validation(),
            'merk' => $this->datamerkModel->getMerk(),
            'datapesanan' => $this->datapesananModel->getPesanan($id_pesanan)

        ];
        return view('data_pesanan/edit', $data);
    }

    public function update($id_pesanan)
    {
        if (!$this->validate([
            'id_pemesan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pemesan harus diisi',
                ]
            ],
            'id_mobil' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama mobil harus diisi',
                ]
            ],
            'id_perjalanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Perjalanan Harus diisi'

                ]
            ],
            'id_jenisbayar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Bayar harus diisi'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Harus diisi'
                ]
            ],
            'tgl_pinjam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tgl pinjam harus diisi'
                ]
            ],
            'tgl_kembali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tgl kembali harus diisi'
                ]
            ]

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->datapesananModel->save([
            'id_pesanan' => $id_pesanan,
            'id_pemesan' => $this->request->getVar('id_pemesan'),
            'id_mobil' => $this->request->getVar('id_mobil'),
            'id_perjalanan' => $this->request->getVar('id_perjalanan'),
            'id_jenisbayar' => $this->request->getVar('id_jenisbayar'),
            'harga' => $this->request->getVar('harga'),
            'tgl_pinjam' => $this->request->getVar('tgl_pinjam'),
            'tgl_kembali' => $this->request->getVar('tgl_kembali')

        ]);
        session()->setFlashdata('pesan', 'Ubah Data Pesanan Berhasil');
        return redirect()->to('/data-pesanan');
    }

    public function detail($id_pesanan)
    {

        $datapesanan = $this->datapesananModel->getPesanan($id_pesanan);
        if (empty($datapesanan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Mobil Tidak ditemukan !');
        }

        $pesanan = $this->datapesananModel;
        $pemesan = $this->datapemesanModel;
        $perjalanan = $this->dataperjalananModel;
        $bayar = $this->databayarModel;
        $mobil = $this->datamobilModel;
        $data = [
            'title' => 'Ubah Data Pesanan| SIA',
            'active'  => 'pesanan',
            'mobil' => $mobil->getMobil(),
            'pemesan' => $pemesan->getPemesan(),
            'perjalanan' => $perjalanan->getPerjalanan(),
            'bayar' => $bayar->getBayar(),
            'joinpesanan' => $pesanan->joinPesanan(),
            'validation' => \Config\Services::validation(),
            'merk' => $this->datamerkModel->getMerk(),
            'datapesanan' => $this->datapesananModel->getPesanan($id_pesanan)

        ];
        return view('data_pesanan/detail', $data);
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
