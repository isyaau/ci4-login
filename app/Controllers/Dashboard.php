<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        // $mobil = $this->datamobilModel;
        // $pemesan = $this->datapemesanModel;
        // $pesanan = $this->datapesananModel;
        // $akun = $this->dataakunModel;
        $data = [
            'session' => $session,
            // 'akun' => $akun->hitungJumlahAkun(),
            // 'mobil' => $mobil->hitungJumlahMobil(),
            // 'pemesan' => $pemesan->hitungJumlahPemesan(),
            // 'pesanan' => $pesanan->hitungJumlahPesanan(),
            'active'  => 'dashboard'
        ];
        if (session()->get('role') == 1) {
            return "Role Admin";
        } elseif (session()->get('role') == 2) {
            return "Role Kepala Sekolah";
        } elseif (session()->get('role') == 3) {
            return "Role Siswa";
        } else {
            return "Role Tidak Valid";
        }
    }
}
