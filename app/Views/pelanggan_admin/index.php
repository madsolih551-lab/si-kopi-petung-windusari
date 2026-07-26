<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pelanggan</title>
</head>
<body>
    <h2>Data Pelanggan</h2>

    <table border="1" cellpadding="8">
        <tr>
            <th>Nama</th>
            <th>Kontak</th>
            <th>Tipe</th>
            <th>Negara</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($pelanggan as $p) : ?>
        <tr>
            <td><?= esc($p['nama']) ?></td>
            <td><?= esc($p['kontak']) ?></td>
            <td><?= esc($p['tipe_pelanggan']) ?></td>
            <td><?= esc($p['negara']) ?></td>
            <td><a href="/data-pelanggan/detail/<?= $p['id_pelanggan'] ?>">Lihat Riwayat</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="/admin/dashboard">Kembali ke Dashboard</a>
</body>
</html>