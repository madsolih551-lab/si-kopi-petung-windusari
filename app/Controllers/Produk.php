<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
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

        $produkModel = new ProdukModel();
        $data['produk'] = $produkModel->findAll();

        return view('produk/index', $data);
    }

    public function create()
    {
        if ($redirect = $this->cekAdmin()) return $redirect;

        return view('produk/create');
    }

    public function store()
    {
        if ($redirect = $this->cekAdmin()) return $redirect;

        $produkModel = new ProdukModel();
        $produkModel->save([
            'nama_produk' => $this->request->getPost('nama_produk'),
            'jenis'       => $this->request->getPost('jenis'),
            'grade'       => $this->request->getPost('grade'),
            'harga'       => $this->request->getPost('harga'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('/produk')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        if ($redirect = $this->cekAdmin()) return $redirect;

        $produkModel = new ProdukModel();
        $data['produk'] = $produkModel->find($id);

        return view('produk/edit', $data);
    }

    public function update($id)
    {
        if ($redirect = $this->cekAdmin()) return $redirect;

        $produkModel = new ProdukModel();
        $produkModel->update($id, [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'jenis'       => $this->request->getPost('jenis'),
            'grade'       => $this->request->getPost('grade'),
            'harga'       => $this->request->getPost('harga'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('/produk')->with('success', 'Produk berhasil diupdate');
    }

    public function delete($id)
    {
        if ($redirect = $this->cekAdmin()) return $redirect;

        $produkModel = new ProdukModel();
        $produkModel->delete($id);

        return redirect()->to('/produk')->with('success', 'Produk berhasil dihapus');
    }
}