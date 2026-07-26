<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Produk Baru</h2>

    <form action="/produk/store" method="post">
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" required><br><br>

        <label>Jenis:</label><br>
        <select name="jenis" required>
            <option value="Arabika">Arabika</option>
            <option value="Robusta">Robusta</option>
        </select><br><br>

        <label>Grade:</label><br>
        <input type="text" name="grade"><br><br>

        <label>Harga (per kg):</label><br>
        <input type="number" name="harga" required><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi"></textarea><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="/produk">Kembali</a>
</body>
</html>