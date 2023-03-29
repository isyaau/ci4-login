<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;

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
            'no_induk'      => 'required|min_length[3]|max_length[50]',
            'kelas'         => 'required',
            'alamat'        => 'required',
            'no_hp'         => 'required',
            'email'         => 'required',
            'username'      => 'required|min_length[6]|max_length[50]|is_unique[tb_users.username]',
            'role'          => 'required',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $model = new UsersModel();
            $foto = "default.jpg";
            $data = [
                'nama'     => $this->request->getVar('nama'),
                'no_induk' => $this->request->getVar('no_induk'),
                'kelas'    => $this->request->getVar('kelas'),
                'alamat'   => $this->request->getVar('alamat'),
                'no_hp'    => $this->request->getVar('no_hp'),
                'email'    => $this->request->getVar('email'),
                'role'     => $this->request->getVar('role'),
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'foto'     => $foto
            ];
            $model->save($data);
            return redirect()->to('/');
        } else {
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
    }
}
