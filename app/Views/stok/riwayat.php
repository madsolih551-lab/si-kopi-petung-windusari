<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Stok</title>
</head>
<body>
    <h2>Riwayat Stok: <?= esc($produk['nama_produk']) ?></h2>

    <table border="1" cellpadding="8">
        <tr>
            <th>Tanggal</th>
            <th>Masuk</th>
            <th>Keluar</th>
        </tr>
        <?php foreach ($riwayat as $r) : ?>
        <tr>
            <td><?= $r['tanggal'] ?></td>
            <td><?= $r['jumlah_masuk'] ?></td>
            <td><?= $r['jumlah_keluar'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="/stok">Kembali</a>
</body>
</html>