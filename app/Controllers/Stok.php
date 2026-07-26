<?php

namespace App\Controllers;

use App\Models\StokLogModel;
use App\Models\ProdukModel;

class Stok extends BaseController
{
    protected function cekAdmin()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }
        return null;
    }

    public function index()
    {
        if ($redirect = $this->cekAdmin()) return $redirect;

        $stokModel = new StokLogModel();
        $data['stok'] = $stokModel->getStokPerProduk();

        return view('stok/index', $data);
    }

    public function tambah($id_produk)
    {
        if ($redirect = $this->cekAdmin()) return $redirect;

        $produkModel = new ProdukModel();
        $data['produk'] = $produkModel->find($id_produk);

        return view('stok/tambah', $data);
    }

    public function simpanMasuk()
    {
        if ($redirect = $this->cekAdmin()) return $redirect;

        $stokModel = new StokLogModel();
        $stokModel->save([
            'id_produk'     => $this->request->getPost('id_produk'),
            'jumlah_masuk'  => $this->request->getPost('jumlah'),
            'jumlah_keluar' => 0,
            'tanggal'       => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/stok')->with('success', 'Stok masuk berhasil dicatat');
    }

    public function simpanKeluar()
    {
        if ($redirect = $this->cekAdmin()) return $redirect;

        $stokModel = new StokLogModel();
        $stokModel->save([
            'id_produk'     => $this->request->getPost('id_produk'),
            'jumlah_masuk'  => 0,
            'jumlah_keluar' => $this->request->getPost('jumlah'),
            'tanggal'       => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/stok')->with('success', 'Stok keluar berhasil dicatat');
    }

    public function riwayat($id_produk)
    {
        if ($redirect = $this->cekAdmin()) return $redirect;

        $stokModel = new StokLogModel();
        $produkModel = new ProdukModel();

        $data['produk'] = $produkModel->find($id_produk);
        $data['riwayat'] = $stokModel->getRiwayatByProduk($id_produk);

        return view('stok/riwayat', $data);
    }
}