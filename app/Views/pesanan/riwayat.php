<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Pesanan</title>
</head>
<body>
    <h2>Riwayat Pesanan Saya</h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <table border="1" cellpadding="8">
        <tr>
            <th>No. Pesanan</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Total</th>
        </tr>
        <?php foreach ($pesanan as $p) : ?>
        <tr>
            <td>#<?= $p['id_pesanan'] ?></td>
            <td><?= $p['tgl_pesan'] ?></td>
            <td><?= esc($p['status']) ?></td>
            <td>Rp <?= number_format($p['total_harga'], 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="/pelanggan/beranda">Kembali ke Beranda</a>
</body>
</html>