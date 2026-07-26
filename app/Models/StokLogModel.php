<?php

namespace App\Models;

use CodeIgniter\Model;

class StokLogModel extends Model
{
    protected $table = 'stok_log';
    protected $primaryKey = 'id_stok';
    protected $allowedFields = ['id_produk', 'jumlah_masuk', 'jumlah_keluar', 'tanggal'];

    // Hitung stok saat ini per produk (total masuk - total keluar)
    public function getStokPerProduk()
    {
        return $this->select('produk.id_produk, produk.nama_produk, produk.jenis,
                COALESCE(SUM(stok_log.jumlah_masuk), 0) as total_masuk,
                COALESCE(SUM(stok_log.jumlah_keluar), 0) as total_keluar,
                (COALESCE(SUM(stok_log.jumlah_masuk), 0) - COALESCE(SUM(stok_log.jumlah_keluar), 0)) as stok_saat_ini')
            ->join('produk', 'produk.id_produk = stok_log.id_produk', 'right')
            ->groupBy('produk.id_produk')
            ->findAll();
    }

    // Riwayat keluar masuk untuk 1 produk tertentu
    public function getRiwayatByProduk($id_produk)
    {
        return $this->where('id_produk', $id_produk)
            ->orderBy('tanggal', 'DESC')
            ->findAll();
    }
}