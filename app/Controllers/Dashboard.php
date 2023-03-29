<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        $mobil = $this->datamobilModel;
        $pemesan = $this->datapemesanModel;
        $pesanan = $this->datapesananModel;
        $akun = $this->dataakunModel;
        $data = [
            'session' => $session,
            'akun' => $akun->hitungJumlahAkun(),
            'mobil' => $mobil->hitungJumlahMobil(),
            'pemesan' => $pemesan->hitungJumlahPemesan(),
            'pesanan' => $pesanan->hitungJumlahPesanan(),
            'active'  => 'dashboard'
        ];
        return view('dashboard/index', $data);
    }
}
