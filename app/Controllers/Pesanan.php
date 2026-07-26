<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\PelangganModel;
use App\Models\PesananModel;
use App\Models\DetailPesananModel;
use App\Models\StokLogModel;

class Pesanan extends BaseController
{
    protected function cekPelanggan()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'pelanggan') {
            return redirect()->to('/login');
        }
        return null;
    }

    protected function cekAdmin()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }
        return null;
    }

    // Form pemesanan
    public function buat($id_produk)
    {
        if ($redirect = $this->cekPelanggan()) return $redirect;

        $produkModel = new ProdukModel();
        $data['produk'] = $produkModel->find($id_produk);

        return view('pesanan/buat', $data);
    }

    // Simpan pesanan baru
    public function simpan()
    {
        if ($redirect = $this->cekPelanggan()) return $redirect;

        $id_produk = $this->request->getPost('id_produk');
        $qty       = (int) $this->request->getPost('qty');
        $alamat    = $this->request->getPost('alamat');
        $kontak    = $this->request->getPost('kontak');
        $negara    = $this->request->getPost('negara');
        $tipe      = $this->request->getPost('tipe_pelanggan');

        $produkModel = new ProdukModel();
        $produk = $produkModel->find($id_produk);

        // Cari atau buat data pelanggan berdasarkan session
        $pelangganModel = new PelangganModel();
        $id_pelanggan = session()->get('id_pelanggan');

        if (!$id_pelanggan) {
            $id_pelanggan = $pelangganModel->insert([
                'nama'           => session()->get('username'),
                'alamat'         => $alamat,
                'kontak'         => $kontak,
                'negara'         => $negara,
                'tipe_pelanggan' => $tipe,
            ]);
            session()->set('id_pelanggan', $id_pelanggan);
        } else {
            $pelangganModel->update($id_pelanggan, [
                'alamat'         => $alamat,
                'kontak'         => $kontak,
                'negara'         => $negara,
                'tipe_pelanggan' => $tipe,
            ]);
        }

        // Hitung total harga + ongkir sederhana
        $subtotal = $produk['harga'] * $qty;
        $ongkir   = ($tipe === 'ekspor') ? 150000 : 20000;
        $total    = $subtotal + $ongkir;

        // Simpan pesanan
        $pesananModel = new PesananModel();
        $id_pesanan = $pesananModel->insert([
            'id_pelanggan' => $id_pelanggan,
            'tgl_pesan'    => date('Y-m-d H:i:s'),
            'status'       => 'diterima',
            'total_harga'  => $total,
            'ongkir'       => $ongkir,
        ]);

        // Simpan detail pesanan
        $detailModel = new DetailPesananModel();
        $detailModel->insert([
            'id_pesanan' => $id_pesanan,
            'id_produk'  => $id_produk,
            'qty'        => $qty,
            'subtotal'   => $subtotal,
        ]);

        // Otomatis kurangi stok
        $stokModel = new StokLogModel();
        $stokModel->insert([
            'id_produk'     => $id_produk,
            'jumlah_masuk'  => 0,
            'jumlah_keluar' => $qty,
            'tanggal'       => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/pesanan/riwayat')->with('success', 'Pesanan berhasil dibuat dengan nomor #' . $id_pesanan);
    }

    // Riwayat pesanan pelanggan
    public function riwayat()
    {
        if ($redirect = $this->cekPelanggan()) return $redirect;

        $id_pelanggan = session()->get('id_pelanggan');
        $pesananModel = new PesananModel();

        $data['pesanan'] = $id_pelanggan ? $pesananModel->getPesananByPelanggan($id_pelanggan) : [];

        return view('pesanan/riwayat', $data);
    }

    // ==== SISI ADMIN ====

    public function kelola()
    {
        if ($redirect = $this->cekAdmin()) return $redirect;

        $pesananModel = new PesananModel();
        $data['pesanan'] = $pesananModel->getSemuaPesanan();

        return view('pesanan/kelola', $data);
    }

    public function detail($id_pesanan)
    {
        if ($redirect = $this->cekAdmin()) return $redirect;

        $pesananModel = new PesananModel();
        $detailModel = new DetailPesananModel();

        $data['pesanan'] = $pesananModel->find($id_pesanan);
        $data['detail']  = $detailModel->getDetailByPesanan($id_pesanan);

        return view('pesanan/detail', $data);
    }

    public function updateStatus($id_pesanan)
    {
        if ($redirect = $this->cekAdmin()) return $redirect;

        $pesananModel = new PesananModel();
        $pesananModel->update($id_pesanan, [
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/pesanan/kelola')->with('success', 'Status pesanan berhasil diupdate');
    }
}