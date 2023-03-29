<?php

namespace App\Models;

use CodeIgniter\Model;

class DataMerkModel extends Model
{
    protected $table      = 'merk';
    protected $primaryKey = 'id_merk';
    protected $allowedFields = ['nama_merk'];



    public function getMerk($id_merk = false)
    {
        if ($id_merk == false) {
            return $this->findAll();
        }
        return $this->where(['id_merk' => $id_merk])->first();
    }

    public function hitungJumlahMerk()
    {
        $user = $this->query('SELECT * FROM merk');
        return $user->getNumRows();
    }
    public function updateMerk($data, $id_merk)
    {
        $query = $this->db->table('merk')->update($data, array('id_merk' => $id_merk));
        return $query;
    }
    // ...
}
