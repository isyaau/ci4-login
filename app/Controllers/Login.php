<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AkunModel;

class Login extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    }

    public function auth()
    {
        $session = session();
        $model = new AkunModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id_akun'       => $data['id_akun'],
                    'nama'          => $data['nama'],
                    'username'      => $data['username'],
                    'foto'          => $data['foto'],
                    'date'          => date("Y-d-m"),
                    'time'          => date("H:i:s A"),
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('msg', 'Username not Found');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
