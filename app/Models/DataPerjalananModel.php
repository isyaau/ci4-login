<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPerjalananModel extends Model
{
    protected $table      = 'perjalanan';
    protected $primaryKey = 'id_perjalanan';
    protected $allowedFields = ['asal', 'tujuan', 'jarak'];



    public function getPerjalanan($id_perjalanan = false)
    {
        if ($id_perjalanan == false) {
            return $this->findAll();
        }
        return $this->where(['id_perjalanan' => $id_perjalanan])->first();
    }

    public function hitungJumlahPerjalanan()
    {
        $user = $this->query('SELECT * FROM perjalanan');
        return $user->getNumRows();
    }
    public function updatePerjalanan($data, $id_perjalanan)
    {
        $query = $this->db->table('perjalanan')->update($data, array('id_perjalanan' => $id_perjalanan));
        return $query;
    }
    // ...
}
