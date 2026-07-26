<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Katalog extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukModel();
        $data['produk'] = $produkModel->getProdukDenganStok();

        return view('katalog/index', $data);
    }
}