<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $allowedFields = ['nama', 'alamat', 'kontak', 'negara', 'tipe_pelanggan'];

    public function findByNama($nama)
    {
        return $this->where('nama', $nama)->first();
    }

    public function getRiwayatPembelian($id_pelanggan)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pesanan');
        return $builder->where('id_pelanggan', $id_pelanggan)
            ->orderBy('tgl_pesan', 'DESC')
            ->get()
            ->getResultArray();
    }
}