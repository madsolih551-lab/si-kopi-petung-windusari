<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Stok - Kopi Petung Windusari</title>
</head>
<body>
    <h2>Kelola Stok</h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <table border="1" cellpadding="8">
        <tr>
            <th>Nama Produk</th>
            <th>Jenis</th>
            <th>Total Masuk</th>
            <th>Total Keluar</th>
            <th>Stok Saat Ini</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($stok as $s) : ?>
        <tr>
            <td><?= esc($s['nama_produk']) ?></td>
            <td><?= esc($s['jenis']) ?></td>
            <td><?= $s['total_masuk'] ?></td>
            <td><?= $s['total_keluar'] ?></td>
            <td>
                <?= $s['stok_saat_ini'] ?>
                <?php if ($s['stok_saat_ini'] <= 5) : ?>
                    <strong style="color:red;"> (Stok menipis!)</strong>
                <?php endif; ?>
            </td>
            <td>
                <a href="/stok/tambah/<?= $s['id_produk'] ?>">Tambah/Kurangi Stok</a> |
                <a href="/stok/riwayat/<?= $s['id_produk'] ?>">Riwayat</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="/admin/dashboard">Kembali ke Dashboard</a>
</body>
</html>