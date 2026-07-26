<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class DataPelanggan extends BaseController
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

        $pelangganModel = new PelangganModel();
        $data['pelanggan'] = $pelangganModel->findAll();

        return view('pelanggan_admin/index', $data);
    }

    public function detail($id_pelanggan)
    {
        if ($redirect = $this->cekAdmin()) return $redirect;

        $pelangganModel = new PelangganModel();
        $data['pelanggan'] = $pelangganModel->find($id_pelanggan);
        $data['riwayat']   = $pelangganModel->getRiwayatPembelian($id_pelanggan);

        return view('pelanggan_admin/detail', $data);
    }
}