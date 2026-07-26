<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Kopi Petung Windusari</title>
</head>
<body>
    <h2>Selamat datang, <?= session()->get('username') ?>!</h2>
    <p>Role: <?= session()->get('role') ?></p>

    <ul>
        <li><a href="/produk">Kelola Produk</a></li>
        <li><a href="/stok">Kelola Stok</a></li>
        <li><a href="/pesanan/kelola">Kelola Pesanan</a></li>
        <li><a href="/laporan">Kelola Laporan</a></li>
        <li><a href="/data-pelanggan">Data Pelanggan</a></li>
    </ul>

    <a href="/logout">Logout</a>
</body>
</html>