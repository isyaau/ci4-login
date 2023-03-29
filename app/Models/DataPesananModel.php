<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPesananModel extends Model
{
    protected $table      = 'pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $allowedFields = ['harga', 'tgl_pinjam', 'tgl_kembali', 'id_pemesan', 'id_mobil', 'id_perjalanan', 'id_jenisbayar'];



    public function getPesanan($id_pesanan = false)
    {
        if ($id_pesanan == false) {
            return $this->findAll();
        }
        return $this->where(['id_pesanan' => $id_pesanan])->first();
    }
    public function joinPesanan($id_pesanan = false)
    {
        if ($id_pesanan == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('pesanan');
            $builder->select('*');
            $builder->join('pemesan', 'pemesan.id_pemesan = pesanan.id_pemesan');
            $builder->join('mobil', 'mobil.id_mobil = pesanan.id_mobil');
            $builder->join('perjalanan', 'perjalanan.id_perjalanan = pesanan.id_perjalanan');
            $builder->join('jenis_bayar', 'jenis_bayar.id_jenisbayar = pesanan.id_jenisbayar');
            $query = $builder->get();
            return $query;
        }
        return $this->where(['id_pesanan' => $id_pesanan])->first();
    }

    public function hitungJumlahPesanan()
    {
        $pesanan = $this->query('SELECT * FROM pesanan');
        return $pesanan->getNumRows();
    }
    public function updatePesanan($data, $id_pesanan)
    {
        $query = $this->db->table('pesanan')->update($data, array('id_pesanan' => $id_pesanan));
        return $query;
    }
    // ...
}
