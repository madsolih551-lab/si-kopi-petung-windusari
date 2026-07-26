<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pesanan #<?= $pesanan['id_pesanan'] ?></title>
</head>
<body>
    <h2>Detail Pesanan #<?= $pesanan['id_pesanan'] ?></h2>

    <p>Tanggal: <?= $pesanan['tgl_pesan'] ?></p>
    <p>Status saat ini: <strong><?= esc($pesanan['status']) ?></strong></p>
    <p>Ongkir: Rp <?= number_format($pesanan['ongkir'], 0, ',', '.') ?></p>
    <p>Total: Rp <?= number_format($pesanan['total_harga'], 0, ',', '.') ?></p>

    <h3>Item Pesanan</h3>
    <table border="1" cellpadding="8">
        <tr>
            <th>Produk</th>
            <th>Qty (kg)</th>
            <th>Subtotal</th>
        </tr>
        <?php foreach ($detail as $d) : ?>
        <tr>
            <td><?= esc($d['nama_produk']) ?></td>
            <td><?= $d['qty'] ?></td>
            <td>Rp <?= number_format($d['subtotal'], 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Update Status</h3>
    <form action="/pesanan/update-status/<?= $pesanan['id_pesanan'] ?>" method="post">
        <select name="status" required>
            <option value="diterima" <?= $pesanan['status'] === 'diterima' ? 'selected' : '' ?>>Diterima</option>
            <option value="diproses" <?= $pesanan['status'] === 'diproses' ? 'selected' : '' ?>>Diproses</option>
            <option value="dikemas" <?= $pesanan['status'] === 'dikemas' ? 'selected' : '' ?>>Dikemas</option>
            <option value="dikirim" <?= $pesanan['status'] === 'dikirim' ? 'selected' : '' ?>>Dikirim</option>
            <option value="selesai" <?= $pesanan['status'] === 'selesai' ? 'selected' : '' ?>>Selesai</option>
        </select>
        <button type="submit">Update Status</button>
    </form>

    <br>
    <a href="/pesanan/kelola">Kembali</a>
</body>
</html>