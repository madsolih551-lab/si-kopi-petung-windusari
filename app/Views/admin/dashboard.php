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
        <li><a href="#">Kelola Produk</a></li>
        <li><a href="#">Kelola Stok</a></li>
        <li><a href="#">Kelola Pesanan</a></li>
        <li><a href="#">Kelola Laporan</a></li>
    </ul>

    <a href="/logout">Logout</a>
</body>
</html>