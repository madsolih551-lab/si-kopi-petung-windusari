<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPesananModel extends Model
{
    protected $table = 'detail_pesanan';
    protected $primaryKey = 'id_detail';
    protected $allowedFields = ['id_pesanan', 'id_produk', 'qty', 'subtotal'];

    public function getDetailByPesanan($id_pesanan)
    {
        return $this->select('detail_pesanan.*, produk.nama_produk')
            ->join('produk', 'produk.id_produk = detail_pesanan.id_produk')
            ->where('id_pesanan', $id_pesanan)
            ->findAll();
    }
}