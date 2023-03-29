<?php

namespace App\Controllers;

use CodeIgniter\Validation\Validation;
use CodeIgniter\Controller;

class DataMobil extends BaseController
{
    public function index()
    {
        session();

        $mobil = $this->datamobilModel;
        $merk = $this->datamerkModel;
        $data = [
            // 'session' => $session,
            'mobil' => $mobil->getMobil(),
            'merk' => $merk->getMerk(),
            'joinmobil' => $mobil->joinMobil(),
            'active'  => 'mobil',
            // 'validation' => \Config\Services::validation()
        ];
        return view('data_mobil/index', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'id_merk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama merk Harus diisi',
                ]
            ],
            'nama_mobil' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama mobil Harus diisi',
                ]
            ],
            'warna' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Warna Harus diisi'

                ]
            ],
            'jumlah_kursi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah kursi Harus diisi'
                ]
            ],
            'no_polisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No polisi Harus diisi'
                ]
            ],
            'tahun_beli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun beli Harus diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2048]',
                'errors' => [
                    'is_image' => 'File yang anda upload bukan gambar',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ]

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        // ambil gambar
        $fileGambar = $this->request->getFile('gambar');

        //apakah tidak ada gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default-mobil.jpeg';
        } else {
            //generate nama gambar
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan file ke folder img
            $fileGambar->move('img', $namaGambar);
        }

        $this->datamobilModel->save([
            'id_merk' => $this->request->getVar('id_merk'),
            'nama_mobil' => $this->request->getVar('nama_mobil'),
            'warna' => $this->request->getVar('warna'),
            'jumlah_kursi' => $this->request->getVar('jumlah_kursi'),
            'no_polisi' => $this->request->getVar('no_polisi'),
            'tahun_beli' => $this->request->getVar('tahun_beli'),
            'gambar' => $namaGambar

        ]);
        session()->setFlashdata('pesan', 'Tambah Data Mobil Berhasil');
        return redirect()->to('/data-mobil');
    }


    public function delete($id_mobil)
    {
        // cari gambar berdaasarkan id
        $mobil = $this->datamobilModel->find($id_mobil);

        // cek jika gambar default-mobil.jpeg
        if ($mobil['gambar'] != 'default-mobil.jpeg') {
            //hapus gambar
            unlink('img/' . $mobil['gambar']);
        }

        $this->datamobilModel->delete($id_mobil);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/data-mobil');
    }
    public function edit($id_mobil)
    {
        $datamobil = $this->datamobilModel->getMobil($id_mobil);
        if (empty($datamobil)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Mobil Tidak ditemukan !');
        }

        $mobil = $this->datamobilModel;
        $data = [
            'title' => 'Ubah Data Mobil| SIA',
            'active'  => 'mobil',
            'joinmobil' => $mobil->joinMobil(),
            'validation' => \Config\Services::validation(),
            'merk' => $this->datamerkModel->getMerk(),
            'datamobil' => $this->datamobilModel->getMobil($id_mobil)

        ];
        return view('data_mobil/edit', $data);
    }

    public function update($id_mobil)
    {
        if (!$this->validate([
            'id_merk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama merk Harus diisi',
                ]
            ],
            'nama_mobil' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama mobil Harus diisi',
                ]
            ],
            'warna' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Warna Harus diisi'

                ]
            ],
            'jumlah_kursi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah kursi Harus diisi'
                ]
            ],
            'no_polisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No polisi Harus diisi'
                ]
            ],
            'tahun_beli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun beli Harus diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2048]',
                'errors' => [
                    'is_image' => 'File yang anda upload bukan gambar',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ]

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        // ambil gambar
        $fileGambar = $this->request->getFile('gambar');
        $gambarLama = $this->request->getVar('gambarLama');
        //apakah tidak ada gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } elseif ($gambarLama == 'default-mobil.jpeg') {
            //generate nama gambar
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan file ke folder img
            $fileGambar->move('img', $namaGambar);
        } else {
            //generate nama gambar
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan file ke folder img
            $fileGambar->move('img', $namaGambar);
            // hapus file nama
            unlink('img/' . $this->request->getVar('gambarLama'));
        }

        $this->datamobilModel->save([
            'id_mobil' => $id_mobil,
            'id_merk' => $this->request->getVar('id_merk'),
            'nama_mobil' => $this->request->getVar('nama_mobil'),
            'warna' => $this->request->getVar('warna'),
            'jumlah_kursi' => $this->request->getVar('jumlah_kursi'),
            'no_polisi' => $this->request->getVar('no_polisi'),
            'tahun_beli' => $this->request->getVar('tahun_beli'),
            'gambar' => $namaGambar

        ]);
        session()->setFlashdata('pesan', 'Ubah Data Mobil Berhasil');
        return redirect()->to('/data-mobil');
    }

    public function detail($id_mobil)
    {
        $datamobil = $this->datamobilModel->getMobil($id_mobil);
        if (empty($datamobil)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Mobil Tidak ditemukan !');
        }

        $mobil = $this->datamobilModel;
        $data = [
            'title' => 'Ubah Data Mobil| SIA',
            'active'  => 'mobil',
            'joinmobil' => $mobil->joinMobil(),
            'validation' => \Config\Services::validation(),
            'merk' => $this->datamerkModel->getMerk(),
            'datamobil' => $this->datamobilModel->getMobil($id_mobil)

        ];
        return view('data_mobil/detail', $data);
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
