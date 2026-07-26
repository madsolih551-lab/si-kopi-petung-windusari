<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pelanggan</title>
</head>
<body>
    <h2><?= esc($pelanggan['nama']) ?></h2>
    <p>Alamat: <?= esc($pelanggan['alamat']) ?></p>
    <p>Kontak: <?= esc($pelanggan['kontak']) ?></p>
    <p>Tipe: <?= esc($pelanggan['tipe_pelanggan']) ?></p>
    <p>Negara: <?= esc($pelanggan['negara']) ?></p>

    <h3>Riwayat Pembelian</h3>
    <table border="1" cellpadding="8">
        <tr>
            <th>No. Pesanan</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Total</th>
        </tr>
        <?php foreach ($riwayat as $r) : ?>
        <tr>
            <td>#<?= $r['id_pesanan'] ?></td>
            <td><?= $r['tgl_pesan'] ?></td>
            <td><?= esc($r['status']) ?></td>
            <td>Rp <?= number_format($r['total_harga'], 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="/data-pelanggan">Kembali</a>
</body>
</html>