<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Akun</title>
</head>
<body>
    <h2>Profil Akun</h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <p>Username: <?= esc(session()->get('username')) ?></p>

    <form action="/profil/update" method="post">
        <label>Alamat:</label><br>
        <textarea name="alamat"><?= $pelanggan ? esc($pelanggan['alamat']) : '' ?></textarea><br><br>

        <label>Kontak (No. HP / Email):</label><br>
        <input type="text" name="kontak" value="<?= $pelanggan ? esc($pelanggan['kontak']) : '' ?>"><br><br>

        <label>Tipe Pelanggan:</label><br>
        <select name="tipe_pelanggan">
            <option value="domestik" <?= ($pelanggan && $pelanggan['tipe_pelanggan'] === 'domestik') ? 'selected' : '' ?>>Domestik</option>
            <option value="ekspor" <?= ($pelanggan && $pelanggan['tipe_pelanggan'] === 'ekspor') ? 'selected' : '' ?>>Ekspor</option>
        </select><br><br>

        <label>Negara (isi jika ekspor):</label><br>
        <input type="text" name="negara" value="<?= $pelanggan ? esc($pelanggan['negara']) : '' ?>"><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <br>
    <a href="/pelanggan/beranda">Kembali ke Beranda</a>
</body>
</html>