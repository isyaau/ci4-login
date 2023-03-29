<?php

namespace App\Controllers;

use CodeIgniter\Validation\Validation;
use CodeIgniter\Controller;

class DataAkun extends BaseController
{
    public function index()
    {
        session();
        helper(['form']);
        $akun = $this->dataakunModel;
        $data = [
            // 'session' => $session,
            'akun' => $akun->getAkun(),
            'active'  => 'akun',
            // 'validation' => \Config\Services::validation()
        ];
        return view('data_akun/index', $data);
    }


    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username Harus diisi',
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[akun.username]',
                'errors' => [
                    'required' => 'Username Harus diisi',
                    'is_unique' => 'Username tersebut sudah dipakai',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Warna Harus diisi'

                ]
            ],
            'confpassword' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi password tidak cocok'
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
        // ambil gambar
        $fileFoto = $this->request->getFile('foto');

        //apakah tidak ada gambar yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default-akun.png';
        } else {
            //generate nama 

            $namaFoto = $fileFoto->getRandomName();
            // pindahkan file ke folder img
            $fileFoto->move('img', $namaFoto);
        }

        $this->dataakunModel->save([
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'foto' => $namaFoto

        ]);
        session()->setFlashdata('pesan', 'Tambah Data Akun Berhasil');
        return redirect()->to('/data-akun');
    }


    public function delete($id_akun)
    {
        // cari gambar berdaasarkan id
        $akun = $this->dataakunModel->find($id_akun);

        // cek jika gambar default-akun.png
        if ($akun['foto'] != 'default-akun.png') {
            //hapus gambar
            unlink('img/' . $akun['foto']);
        }

        $this->dataakunModel->delete($id_akun);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/data-akun');
    }
    public function edit($id_akun)
    {
        $dataakun = $this->dataakunModel->getAkun($id_akun);
        if (empty($dataakun)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Mobil Tidak ditemukan !');
        }

        $akun = $this->dataakunModel;
        $data = [
            'title' => 'Ubah Data Akun| SIA',
            'active'  => 'akun',
            'validation' => \Config\Services::validation(),
            'merk' => $this->dataakunModel->getAkun(),
            'dataakun' => $this->dataakunModel->getAkun($id_akun)

        ];
        return view('data_akun/edit', $data);
    }

    public function update2($id_akun)
    {

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username Harus diisi',
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username Harus diisi',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Harus diisi'

                ]
            ],
            'confpassword' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi password tidak cocok'
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
        $password = $this->request->getVar('password');
        if ($password == "") {
            $passwordLama = $this->request->getVar('passwordLama');
        } else {
            $passwordLama = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        // ambil gambar
        $fileFoto = $this->request->getFile('foto');
        $fotoLama = $this->request->getVar('fotoLama');

        //apakah tidak ada gambar yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } elseif ($fotoLama == 'default-akun.png') {
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

        $this->dataakunModel->save([
            'id_akun' => $id_akun,
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => $passwordLama,
            'foto' => $namaFoto

        ]);
        session()->setFlashdata('pesan', 'Ubah Data Akun Berhasil');
        return redirect()->to('/data-akun');
    }


    public function update($id_akun)
    {
        $password = $this->request->getVar('password');
        if ($password == "") {
            $passwordLama = $this->request->getVar('passwordLama');
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username Harus diisi',
                    ]
                ],
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username Harus diisi',
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


            // ambil gambar
            $fileFoto = $this->request->getFile('foto');
            $fotoLama = $this->request->getVar('fotoLama');

            //apakah tidak ada gambar yang diupload
            if ($fileFoto->getError() == 4) {
                $namaFoto = $this->request->getVar('fotoLama');
            } elseif ($fotoLama == 'default-akun.png') {
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

            $this->dataakunModel->save([
                'id_akun' => $id_akun,
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'password' => $passwordLama,
                'foto' => $namaFoto

            ]);
        } else {
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username Harus diisi',
                    ]
                ],
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username Harus diisi',
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password Harus diisi'

                    ]
                ],
                'confpassword' => [
                    'rules' => 'matches[password]',
                    'errors' => [
                        'matches' => 'Konfirmasi password tidak cocok'
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
            // ambil gambar
            $fileFoto = $this->request->getFile('foto');
            $fotoLama = $this->request->getVar('fotoLama');

            //apakah tidak ada gambar yang diupload
            if ($fileFoto->getError() == 4) {
                $namaFoto = $this->request->getVar('fotoLama');
            } elseif ($fotoLama == 'default-akun.png') {
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

            $this->dataakunModel->save([
                'id_akun' => $id_akun,
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'foto' => $namaFoto

            ]);
        }
        session()->setFlashdata('pesan', 'Ubah Data Akun Berhasil');
        return redirect()->to('/data-akun');
    }

    public function detail($id_akun)
    {
        $dataakun = $this->dataakunModel->getAkun($id_akun);
        if (empty($dataakun)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Akun Tidak ditemukan !');
        }

        $akun = $this->dataakunModel;
        $data = [
            'title' => 'Detail Data Akun| SIA',
            'active'  => 'akun',
            'joinmobil' => $akun->joinMobil(),
            'validation' => \Config\Services::validation(),
            'merk' => $this->datamerkModel->getMerk(),
            'dataakun' => $this->dataakunModel->getAkun($id_akun)

        ];
        return view('data_akun/detail', $data);
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
