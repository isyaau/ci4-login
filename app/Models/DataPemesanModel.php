<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPemesanModel extends Model
{
    protected $table      = 'pemesan';
    protected $primaryKey = 'id_pemesan';
    protected $allowedFields = ['id_pemesaan', 'nama_pemesan', 'alamat', 'jenis_kelamin', 'foto'];



    public function getPemesan($id_pemesan = false)
    {
        if ($id_pemesan == false) {
            return $this->findAll();
        }
        return $this->where(['id_pemesan' => $id_pemesan])->first();
    }
    public function joinMobil($id_pemesan = false)
    {
        if ($id_pemesan == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('pemesan');
            $builder->select('*');
            $builder->join('merk', 'merk.id_merk = mobil.id_merk');
            $query = $builder->get();
            return $query;
        }
        return $this->where(['id_pemesan' => $id_pemesan])->first();
    }

    public function hitungJumlahPemesan()
    {
        $pemesan = $this->query('SELECT * FROM pemesan');
        return $pemesan->getNumRows();
    }
    public function updateMerk($data, $id_pemesan)
    {
        $query = $this->db->table('mobil')->update($data, array('id_pemesan' => $id_pemesan));
        return $query;
    }
    // ...
}
