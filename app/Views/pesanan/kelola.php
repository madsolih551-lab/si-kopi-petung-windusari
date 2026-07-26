<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pesanan</title>
</head>
<body>
    <h2>Kelola Pesanan</h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <table border="1" cellpadding="8">
        <tr>
            <th>No. Pesanan</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($pesanan as $p) : ?>
        <tr>
            <td>#<?= $p['id_pesanan'] ?></td>
            <td><?= esc($p['nama_pelanggan']) ?></td>
            <td><?= $p['tgl_pesan'] ?></td>
            <td><?= esc($p['status']) ?></td>
            <td>Rp <?= number_format($p['total_harga'], 0, ',', '.') ?></td>
            <td><a href="/pesanan/detail/<?= $p['id_pesanan'] ?>">Lihat Detail</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="/admin/dashboard">Kembali ke Dashboard</a>
</body>
</html>