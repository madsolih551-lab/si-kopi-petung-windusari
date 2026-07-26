<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Produk - Kopi Petung Windusari</title>
</head>
<body>
    <h2>Kelola Produk</h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <a href="/produk/create">+ Tambah Produk</a>
    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>Nama Produk</th>
            <th>Jenis</th>
            <th>Grade</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($produk as $p) : ?>
        <tr>
            <td><?= esc($p['nama_produk']) ?></td>
            <td><?= esc($p['jenis']) ?></td>
            <td><?= esc($p['grade']) ?></td>
            <td>Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
            <td>
                <a href="/produk/edit/<?= $p['id_produk'] ?>">Edit</a> |
                <a href="/produk/delete/<?= $p['id_produk'] ?>" onclick="return confirm('Yakin hapus produk ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="/admin/dashboard">Kembali ke Dashboard</a>
</body>
</html>