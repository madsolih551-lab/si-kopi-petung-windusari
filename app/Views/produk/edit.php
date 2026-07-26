<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
</head>
<body>
    <h2>Edit Produk</h2>

    <form action="/produk/update/<?= $produk['id_produk'] ?>" method="post">
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" value="<?= esc($produk['nama_produk']) ?>" required><br><br>

        <label>Jenis:</label><br>
        <select name="jenis" required>
            <option value="Arabika" <?= $produk['jenis'] === 'Arabika' ? 'selected' : '' ?>>Arabika</option>
            <option value="Robusta" <?= $produk['jenis'] === 'Robusta' ? 'selected' : '' ?>>Robusta</option>
        </select><br><br>

        <label>Grade:</label><br>
        <input type="text" name="grade" value="<?= esc($produk['grade']) ?>"><br><br>

        <label>Harga (per kg):</label><br>
        <input type="number" name="harga" value="<?= $produk['harga'] ?>" required><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi"><?= esc($produk['deskripsi']) ?></textarea><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="/produk">Kembali</a>
</body>
</html>