<?php

namespace App\Controllers;

use App\Models\PesananModel;
use Dompdf\Dompdf;

class Laporan extends BaseController
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

        // Default periode: bulan ini
        $dari   = $this->request->getGet('dari') ?? date('Y-m-01');
        $sampai = $this->request->getGet('sampai') ?? date('Y-m-t');

        $pesananModel = new PesananModel();
        $data['pesanan'] = $pesananModel->getLaporanPeriode($dari, $sampai);
        $data['dari']    = $dari;
        $data['sampai']  = $sampai;

        $totalPenjualan = 0;
        foreach ($data['pesanan'] as $p) {
            $totalPenjualan += $p['total_harga'];
        }
        $data['total_penjualan'] = $totalPenjualan;
        $data['jumlah_pesanan']  = count($data['pesanan']);

        return view('laporan/index', $data);
    }

    public function exportPdf()
    {
        if ($redirect = $this->cekAdmin()) return $redirect;

        $dari   = $this->request->getGet('dari') ?? date('Y-m-01');
        $sampai = $this->request->getGet('sampai') ?? date('Y-m-t');

        $pesananModel = new PesananModel();
        $data['pesanan'] = $pesananModel->getLaporanPeriode($dari, $sampai);
        $data['dari']    = $dari;
        $data['sampai']  = $sampai;

        $totalPenjualan = 0;
        foreach ($data['pesanan'] as $p) {
            $totalPenjualan += $p['total_harga'];
        }
        $data['total_penjualan'] = $totalPenjualan;
        $data['jumlah_pesanan']  = count($data['pesanan']);

        $html = view('laporan/pdf', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream('laporan-penjualan-' . $dari . '-sd-' . $sampai . '.pdf', ['Attachment' => true]);
        exit;
    }
}