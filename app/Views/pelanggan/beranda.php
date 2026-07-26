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
        <li><a href="/katalog">Lihat Katalog Produk</a></li>
        <li><a href="/pesanan/riwayat">Riwayat Pesanan</a></li>
        <li><a href="/profil">Profil Akun</a></li>
    </ul>

    <a href="/logout">Logout</a>
</body>
</html>