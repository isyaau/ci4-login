<?php

namespace App\Models;

use CodeIgniter\Model;

class DataBayarModel extends Model
{
    protected $table      = 'jenis_bayar';
    protected $primaryKey = 'id_jenisbayar';
    protected $allowedFields = ['jenis_bayar'];



    public function getBayar($id_jenisbayar = false)
    {
        if ($id_jenisbayar == false) {
            return $this->findAll();
        }
        return $this->where(['id_jenisbayar' => $id_jenisbayar])->first();
    }

    public function hitungJumlahMerk()
    {
        $user = $this->query('SELECT * FROM jenis_bayar');
        return $user->getNumRows();
    }
    public function updateBayar($data, $id_jenisbayar)
    {
        $query = $this->db->table('jenis_bayar')->update($data, array('id_jenisbayar' => $id_jenisbayar));
        return $query;
    }
    // ...
}
