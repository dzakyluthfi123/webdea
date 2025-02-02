<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Barang</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include 'menu.php';
    ?>
    <br>

    <h1>Data Barang</h1>
    <br>
    <a href="tambah_brg.php" class="btn-add">Tambah barang</a>

    <table border="1">
        <tr>
            <th>Kode barang</th>
            <th>Nama barang</th>
            <th>Merk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM barang");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?= $d['kode_brg']; ?></td>
                <td><?= $d['nama_brg']; ?></td>
                <td><?= $d['merk']; ?></td>
                <td><?= $d['harga']; ?></td>
                <td><?= $d['jumlah']; ?></td>
                <td>
                    <a href="edit_brg.php?id=<?= $d['kode_brg']; ?>" class="btn btn-edit">Edit</a>
                    <a href="hapus_brg.php?id=<?= $d['kode_brg']; ?>" class="btn btn-delete" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>