<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan</title>
</head>
<body>
    <h2>Laporan Penjualan</h2>

    <form method="get" action="/laporan">
        <label>Dari:</label>
        <input type="date" name="dari" value="<?= $dari ?>">
        <label>Sampai:</label>
        <input type="date" name="sampai" value="<?= $sampai ?>">
        <button type="submit">Filter</button>
    </form>

    <p>Total Pesanan: <?= $jumlah_pesanan ?></p>
    <p>Total Penjualan: Rp <?= number_format($total_penjualan, 0, ',', '.') ?></p>

    <a href="/laporan/pdf?dari=<?= $dari ?>&sampai=<?= $sampai ?>">Unduh PDF</a>

    <table border="1" cellpadding="8">
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

    <br>
    <a href="/admin/dashboard">Kembali ke Dashboard</a>
</body>
</html>