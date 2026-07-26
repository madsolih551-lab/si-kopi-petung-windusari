<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Katalog Produk - Kopi Petung Windusari</title>
</head>
<body>
    <h2>Katalog Produk Kopi Petung Windusari</h2>

    <?php if (!session()->get('isLoggedIn')) : ?>
        <p><a href="/login">Login</a> untuk melakukan pemesanan</p>
    <?php endif; ?>

    <div style="display:flex; flex-wrap:wrap; gap:20px;">
        <?php foreach ($produk as $p) : ?>
        <div style="border:1px solid #ccc; padding:15px; width:250px;">
            <h3><?= esc($p['nama_produk']) ?></h3>
            <p>Jenis: <?= esc($p['jenis']) ?></p>
            <p>Grade: <?= esc($p['grade']) ?></p>
            <p>Harga: Rp <?= number_format($p['harga'], 0, ',', '.') ?> / kg</p>
            <p>
                Stok:
                <?php if ($p['stok_saat_ini'] > 0) : ?>
                    <?= $p['stok_saat_ini'] ?> kg tersedia
                <?php else : ?>
                    <strong style="color:red;">Stok habis</strong>
                <?php endif; ?>
            </p>
            <p><?= esc($p['deskripsi']) ?></p>

            <?php if (session()->get('isLoggedIn') && session()->get('role') === 'pelanggan' && $p['stok_saat_ini'] > 0) : ?>
                <a href="/pesanan/buat/<?= $p['id_produk'] ?>">Pesan Sekarang</a>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>

    <br>
    <?php if (session()->get('isLoggedIn')) : ?>
        <a href="/pelanggan/beranda">Kembali ke Beranda</a>
    <?php endif; ?>
</body>
</html>