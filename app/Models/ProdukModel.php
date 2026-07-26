<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['nama_produk', 'jenis', 'grade', 'harga', 'foto', 'deskripsi'];

    public function getProdukDenganStok()
    {
        return $this->select('produk.*,
                COALESCE(SUM(stok_log.jumlah_masuk), 0) - COALESCE(SUM(stok_log.jumlah_keluar), 0) as stok_saat_ini')
            ->join('stok_log', 'stok_log.id_produk = produk.id_produk', 'left')
            ->groupBy('produk.id_produk')
            ->findAll();
    }
}