<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat Pesanan</title>
</head>
<body>
    <h2>Pesan: <?= esc($produk['nama_produk']) ?></h2>
    <p>Harga: Rp <?= number_format($produk['harga'], 0, ',', '.') ?> / kg</p>

    <form action="/pesanan/simpan" method="post">
        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">

        <label>Jumlah (kg):</label><br>
        <input type="number" name="qty" min="1" required><br><br>

        <label>Tipe Pelanggan:</label><br>
        <select name="tipe_pelanggan" required>
            <option value="domestik">Domestik</option>
            <option value="ekspor">Ekspor</option>
        </select><br><br>

        <label>Alamat Pengiriman:</label><br>
        <textarea name="alamat" required></textarea><br><br>

        <label>Kontak (No. HP / Email):</label><br>
        <input type="text" name="kontak" required><br><br>

        <label>Negara Tujuan (isi jika ekspor):</label><br>
        <input type="text" name="negara"><br><br>

        <button type="submit">Konfirmasi Pesanan</button>
    </form>

    <br>
    <a href="/katalog">Kembali ke Katalog</a>
</body>
</html>