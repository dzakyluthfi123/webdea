<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Transaksi</title>
</head>

<body>

    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Container for the table */
        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
        }

        /* Styling for table rows */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e9f6ff;
            /* Light blue on hover */
        }

        /* Link button styling */
        a {
            text-decoration: none;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .edit {
            background-color: #28a745;
            /* Green for edit */
        }

        .hapus {
            background-color: #dc3545;
            /* Red for delete */
        }

        .edit:hover {
            background-color: #218838;
            /* Darker green on hover */
        }

        .hapus:hover {
            background-color: #c82333;
            /* Darker red on hover */
        }

        /* Add Transaction Button */
        a[href="tambah_trs.php"] {
            display: inline-block;
            background-color: #4CAF50;
            /* Blue for Add */
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        a[href="tambah_trs.php"]:hover {
            background-color: #13e844;
            /* Darker blue on hover */
        }

        /* Table Styling */
        table {
            /* border-radius: 8px; */
            overflow: hidden;
        }

        td {
            background-color: #ffffff;
            /* White background for table cells */
            color: #333;
            /* Text color */
        }
    </style>
    <?php include "menu.php"; ?>

    <h1 style="margin-left: 15%;">Data Transaksi</h1>
    <br>
    <a href="tambah_trs.php" style="margin-left: 22%;">Tambah Transaksi</a>

    <table border="1">
        <tr>
            <th>Kode Transaksi</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah Beli</th>
            <th>Total Bayar</th>
            <th colspan="1">Tanggal</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        include "koneksi.php";

        // Query untuk mengambil data dari tabel transaksi dan tabel barang
        $join = "SELECT transaksi.kode_transaksi, transaksi.kode_brg, barang.nama_brg, barang.harga, transaksi.jumlah, transaksi.total_bayar, transaksi.tanggal FROM transaksi INNER JOIN barang ON transaksi.kode_brg = barang.kode_brg";

        $data = mysqli_query($koneksi, $join);

        // Tampilkan data
        while ($d = mysqli_fetch_assoc($data)) {
        ?>
            <tr>
                <td><?php echo $d['kode_transaksi']; ?></td>
                <td><?php echo $d['kode_brg']; ?></td>
                <td><?php echo $d['nama_brg']; ?></td>
                <td><?php echo number_format($d['harga'], 0, ',', '.'); ?></td>
                <td><?php echo $d['jumlah']; ?></td>
                <td><?php echo number_format($d['total_bayar'], 0, ',', '.'); ?></td>
                <td><?php echo $d['tanggal']; ?></td>
                <td>
                    <a href="edit_trs.php?id=<?php echo $d['kode_transaksi']; ?>" onclick="return confirm('Apakah anda yakin ingin mengedit?')" class="edit">Edit</a>
                </td>
                <td>
                    <a href="hapus_trs.php?id=<?php echo $d['kode_transaksi']; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="hapus">Hapus</a>
                </td>

            </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>