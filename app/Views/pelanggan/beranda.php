<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda Pelanggan - Kopi Petung Windusari</title>
</head>
<body>
    <h2>Selamat datang, <?= session()->get('username') ?>!</h2>
    <p>Role: <?= session()->get('role') ?></p>

    <ul>
        <li><a href="#">Lihat Katalog Produk</a></li>
        <li><a href="#">Riwayat Pesanan</a></li>
        <li><a href="#">Profil Akun</a></li>
    </ul>

    <a href="/logout">Logout</a>
</body>
</html>