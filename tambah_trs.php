<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
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
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        /* Container Styles */
        .container {
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Form Title */
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 2px;
            font-size: 24px;
            letter-spacing: 1px;
        }

        /* Label Styles */
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 2px;
            color: #555;
        }

        /* Input and Select Styles */
        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        select:focus {
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

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
        }
    </style>
    <div class="container">
        <h2>Tambah Transaksi</h2>
        <form action="" method="post">
            <label for="kodetrs">Kode Transaksi:</label>
            <input type="text" name="kodetrs" id="kodetrs" required>

            <label for="kodebrg">Nama Barang:</label>
            <select name="kodebrg" id="kodebrg" required>
                <option value="">--Pilih Barang--</option>
                <?php
                include "koneksi.php";
                $tampil = mysqli_query($koneksi, "SELECT * FROM barang");
                while ($a = mysqli_fetch_array($tampil)) {
                ?>
                    <option value="<?= $a['kode_brg'] ?>"><?= $a['nama_brg'] ?></option>
                <?php
                }
                ?>
            </select>

            <label for="jumlah">Jumlah:</label>
            <input type="number" name="jumlah" id="jumlah" required>

            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" required>

            <button type="submit" name="simpan">Simpan</button>
        </form>
    </div>

    <?php
    include "koneksi.php";

    if (isset($_POST['simpan'])) {
        $kode_transaksi = $_POST['kodetrs'];
        $kode_barang = $_POST['kodebrg'];
        $jumlahbrg = $_POST['jumlah']; //jumlah dari form transaksi
        $tanggal = $_POST['tanggal'];

        // mengambil data barang berdasarkan kode_barang
        $tampil_barang = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode_brg = '$kode_barang'");
        $data = mysqli_fetch_array($tampil_barang);
        $nama_barang = $data['nama_brg'];
        $harga = $data['harga'];
        $jumlah = $data['jumlah'];

        $total_harga = $jumlahbrg * $harga;

        if ($jumlahbrg > $jumlah) { //jika jumlah yang diinput lebih besar dari jumlah yang ada di tabel barang
            echo "<script>alert('Stok tidak cukup')</script>";
        } else {
            // Insert data ke tabel transaksi
            $simpan = mysqli_query($koneksi, "INSERT INTO transaksi VALUES ('$kode_transaksi','$kode_barang', '$jumlahbrg','$total_harga','$tanggal')");
            if ($simpan) {
                // jika berhasil disimpan, update tabel barang
                $update_barang = mysqli_query($koneksi, "UPDATE barang SET jumlah = jumlah - $jumlahbrg WHERE kode_brg = '$kode_barang'");
                echo "<script>alert('Berhasil Disimpan')</script>";
                header("location:tampil_trs.php");
            } else {
                echo "gagal";
            }
        }
    }
    ?>
</body>

</html>