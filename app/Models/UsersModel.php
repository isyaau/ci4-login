<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'tb_users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama', 'no_induk', 'kelas', 'alamat', 'no_hp', 'email', 'username', 'password', 'role', 'foto', 'created_at', 'updated_at'];
    protected $useTimestamps = true;


    public function getUsers($id_user = false)
    {
        if ($id_user == false) {
            return $this->findAll();
        }
        return $this->where(['id_user' => $id_user])->first();
    }
    
    public function hitungJumlahUsers()
    {
        $akun = $this->query('SELECT * FROM users');
        return $akun->getNumRows();
    }
    // public function joinMobil($id_akun = false)
    // {
    //     if ($id_akun == false) {
    //         $db      = \Config\Database::connect();
    //         $builder = $db->table('mobil');
    //         $builder->select('*');
    //         $builder->join('merk', 'merk.id_merk = mobil.id_merk');
    //         $query = $builder->get();
    //         return $query;
    //     }
    //     return $this->where(['id_akun' => $id_akun])->first();
    // }

  
 
}
