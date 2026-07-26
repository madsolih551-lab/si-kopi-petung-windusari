<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Update Stok</title>
</head>
<body>
    <h2>Update Stok: <?= esc($produk['nama_produk']) ?></h2>

    <h3>Stok Masuk (misal: hasil panen baru)</h3>
    <form action="/stok/simpan-masuk" method="post">
        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
        <label>Jumlah Masuk (kg):</label><br>
        <input type="number" name="jumlah" required><br><br>
        <button type="submit">Simpan Stok Masuk</button>
    </form>

    <hr>

    <h3>Stok Keluar (misal: koreksi manual)</h3>
    <form action="/stok/simpan-keluar" method="post">
        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
        <label>Jumlah Keluar (kg):</label><br>
        <input type="number" name="jumlah" required><br><br>
        <button type="submit">Simpan Stok Keluar</button>
    </form>

    <br>
    <a href="/stok">Kembali</a>
</body>
</html>