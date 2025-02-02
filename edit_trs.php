<?php
include "koneksi.php";

// Ambil kode transaksi dari URL
if (isset($_GET['id'])) {
    $kode_transaksi = $_GET['id'];
    $query_transaksi = "SELECT * FROM transaksi WHERE kode_transaksi='$kode_transaksi'";
    $result_transaksi = mysqli_query($koneksi, $query_transaksi);

    if (mysqli_num_rows($result_transaksi) == 1) {
        $data_transaksi = mysqli_fetch_assoc($result_transaksi);
    } else {
        echo "Transaksi tidak ditemukan.";
        exit; // Keluar jika transaksi tidak ditemukan
    }
}

// Proses form update
if (isset($_POST['update_transaksi'])) {
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $kode_brg = $data_transaksi['kode_brg'];

    // Ambil harga barang dari database
    $query_harga = "SELECT harga FROM barang WHERE kode_brg='$kode_brg'";
    $result_harga = mysqli_query($koneksi, $query_harga);
    $row_harga = mysqli_fetch_assoc($result_harga);
    $harga = $row_harga['harga'];

    // Hitung total bayar
    $total_bayar = $harga * $jumlah;
    $perbedaan_jumlah_beli = $jumlah - $data_transaksi['jumlah'];

    // Update transaksi
    $query_update_transaksi = "UPDATE transaksi SET jumlah='$jumlah', total_bayar='$total_bayar', tanggal='$tanggal' WHERE kode_transaksi='$kode_transaksi'";
    $result_update_transaksi = mysqli_query($koneksi, $query_update_transaksi);

    if ($result_update_transaksi) {
        // Update stok barang
        $query_update_stok = "UPDATE barang SET jumlah= jumlah - $perbedaan_jumlah_beli WHERE kode_brg='$kode_brg'";
        $result_update_stok = mysqli_query($koneksi, $query_update_stok);

        if ($result_update_stok) {
            header("Location: tampil_trs.php");
            exit;
        } else {
            echo "Gagal update stok.";
        }
    } else {
        echo "Gagal update transaksi.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }

        /* Container Styles */
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Form Title */
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
            letter-spacing: 1px;
        }

        /* Label Styles */
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #555;
        }

        /* Input Styles */
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
        }

        input[type="number"]:focus,
        input[type="date"]:focus {
            border-color: #007BFF;
            outline: none;
        }

        /* Button Styles */
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Bootstrap Integration Fixes */
        .form-label {
            font-weight: 600;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
        }
    </style>
    <div class="container mt-5">
        <h2>Edit Transaksi</h2>
        <form action="" method="post">
            <!-- Input Jumlah -->
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" value="<?php echo isset($data_transaksi['jumlah']) ? $data_transaksi['jumlah'] : ''; ?>" required>
            </div>

            <!-- Input Tanggal -->
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="<?php echo isset($data_transaksi['tanggal']) ? $data_transaksi['tanggal'] : ''; ?>" required>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" name="update_transaksi" class="btn btn-primary">Update</button>
            <!-- <a href="transaksi.php" class="btn btn-secondary">Kembali</a> -->
        </form>
    </div>


</body>

</html>