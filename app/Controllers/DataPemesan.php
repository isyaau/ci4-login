<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DataPemesan extends BaseController
{
    public function index()
    {
        session();

        $pemesan = $this->datapemesanModel;
        $data = [
            // 'session' => $session,
            'pemesan' => $pemesan->getPemesan(),
            'active'  => 'pemesan',
            // 'validation' => \Config\Services::validation()
        ];
        return view('data_pemesan/index', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama_pemesan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus diisi',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin Harus diisi',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat Harus diisi'

                ]
            ],
            'foto' => [
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
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
        // ambil foto
        $fileFoto = $this->request->getFile('foto');

        //apakah tidak ada foto yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default-pemesan.jpg';
        } else {
            //generate nama foto
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan file ke folder img
            $fileFoto->move('img', $namaFoto);
        }

        $this->datapemesanModel->save([
            'nama_pemesan' => $this->request->getVar('nama_pemesan'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $namaFoto

        ]);
        session()->setFlashdata('pesan', 'Tambah Data Pemesan Berhasil');
        return redirect()->to('/data-pemesan');
    }

    public function delete($id_pemesan)
    {
        // cari gambar berdaasarkan id
        $pemesan = $this->datapemesanModel->find($id_pemesan);

        // cek jika gambar default-pemesan.jpg
        if ($pemesan['foto'] != 'default-pemesan.jpg') {
            //hapus gambar
            unlink('img/' . $pemesan['foto']);
        }

        $this->datapemesanModel->delete($id_pemesan);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/data-pemesan');
    }

    public function edit($id_pemesan)
    {
        $datapemesan = $this->datapemesanModel->getPemesan($id_pemesan);
        if (empty($datapemesan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pemesan Tidak ditemukan !');
        }
        $data = [
            'title' => 'Ubah Data Pemesan| SIA',
            'active'  => 'pemesan',
            'validation' => \Config\Services::validation(),
            'pemesan' => $this->datapemesanModel->getPemesan(),
            'datapemesan' => $this->datapemesanModel->getPemesan($id_pemesan)
        ];
        return view('data_pemesan/edit', $data);
    }

    public function update($id_pemesan)
    {
        if (!$this->validate([
            'nama_pemesan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus diisi',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin Harus diisi'

                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat kursi Harus diisi'
                ]
            ],
            'foto' => [
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
                'errors' => [
                    'is_image' => 'File yang anda upload bukan foto',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ]

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        // ambil gambar
        $fileFoto = $this->request->getFile('foto');
        $fotoLama = $this->request->getVar('fotoLama');
        //apakah tidak ada gambar yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } elseif ($fotoLama == "default-pemesan.jpg") {
            //generate nama gambar
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan file ke folder img
            $fileFoto->move('img', $namaFoto);
        } else {
            //generate nama gambar
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan file ke folder img
            $fileFoto->move('img', $namaFoto);
            // hapus file nama
            unlink('img/' . $this->request->getVar('fotoLama'));
        }

        $this->datapemesanModel->save([
            'id_pemesan' => $id_pemesan,
            'nama_pemesan' => $this->request->getVar('nama_pemesan'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $namaFoto

        ]);
        session()->setFlashdata('pesan', 'Ubah Data Pemesan Berhasil');
        return redirect()->to('/data-pemesan');
    }
    public function detail($id_pemesan)
    {
        $datamobil = $this->datapemesanModel->getPemesan($id_pemesan);
        if (empty($datamobil)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pemesan Tidak ditemukan !');
        }
        $data = [
            'title' => 'Detail Data Pemesan| SIA',
            'active'  => 'pemesan',
            'validation' => \Config\Services::validation(),
            'pemesan' => $this->datapemesanModel->getPemesan(),
            'datapemesan' => $this->datapemesanModel->getPemesan($id_pemesan)

        ];
        return view('data_pemesan/detail', $data);
    }
}
