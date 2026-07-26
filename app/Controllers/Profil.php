<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class Profil extends BaseController
{
    protected function cekPelanggan()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'pelanggan') {
            return redirect()->to('/login');
        }
        return null;
    }

    public function index()
    {
        if ($redirect = $this->cekPelanggan()) return $redirect;

        $pelangganModel = new PelangganModel();
        $id_pelanggan = session()->get('id_pelanggan');

        $data['pelanggan'] = $id_pelanggan ? $pelangganModel->find($id_pelanggan) : null;

        return view('profil/index', $data);
    }

    public function update()
    {
        if ($redirect = $this->cekPelanggan()) return $redirect;

        $pelangganModel = new PelangganModel();
        $id_pelanggan = session()->get('id_pelanggan');

        $dataUpdate = [
            'nama'           => session()->get('username'),
            'alamat'         => $this->request->getPost('alamat'),
            'kontak'         => $this->request->getPost('kontak'),
            'negara'         => $this->request->getPost('negara'),
            'tipe_pelanggan' => $this->request->getPost('tipe_pelanggan'),
        ];

        if ($id_pelanggan) {
            // Sudah ada data, tinggal update
            $pelangganModel->update($id_pelanggan, $dataUpdate);
        } else {
            // Belum ada data sama sekali, buat baru
            $id_pelanggan = $pelangganModel->insert($dataUpdate);
            session()->set('id_pelanggan', $id_pelanggan);
        }

        return redirect()->to('/profil')->with('success', 'Profil berhasil diupdate');
    }
}