<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $allowedFields = ['id_pelanggan', 'tgl_pesan', 'status', 'total_harga', 'ongkir'];

    public function getPesananByPelanggan($id_pelanggan)
    {
        return $this->where('id_pelanggan', $id_pelanggan)
            ->orderBy('tgl_pesan', 'DESC')
            ->findAll();
    }

    public function getSemuaPesanan()
    {
        return $this->select('pesanan.*, pelanggan.nama as nama_pelanggan')
            ->join('pelanggan', 'pelanggan.id_pelanggan = pesanan.id_pelanggan')
            ->orderBy('tgl_pesan', 'DESC')
            ->findAll();
    }
}