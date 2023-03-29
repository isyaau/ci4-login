<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AkunModel;

class Register extends Controller
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }

    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'nama'          => 'required|min_length[3]|max_length[50]',
            'username'         => 'required|min_length[6]|max_length[50]|is_unique[akun.username]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $model = new AkunModel();
            $foto = "default.jpg";
            $data = [
                'nama'     => $this->request->getVar('nama'),
                'username'    => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'foto' => $foto
            ];
            $model->save($data);
            return redirect()->to('/');
        } else {
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
    }
}
