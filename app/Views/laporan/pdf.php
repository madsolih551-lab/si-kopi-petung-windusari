<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #333; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h2>Laporan Penjualan Kopi Petung Windusari</h2>
    <p>Periode: <?= $dari ?> s/d <?= $sampai ?></p>
    <p>Total Pesanan: <?= $jumlah_pesanan ?></p>
    <p>Total Penjualan: Rp <?= number_format($total_penjualan, 0, ',', '.') ?></p>

    <table>
        <tr>
            <th>No. Pesanan</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Total</th>
        </tr>
        <?php foreach ($pesanan as $p) : ?>
        <tr>
            <td>#<?= $p['id_pesanan'] ?></td>
            <td><?= esc($p['nama_pelanggan']) ?></td>
            <td><?= $p['tgl_pesan'] ?></td>
            <td><?= esc($p['status']) ?></td>
            <td>Rp <?= number_format($p['total_harga'], 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>