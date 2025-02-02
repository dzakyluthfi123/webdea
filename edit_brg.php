<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        /* Container Styling */
        .container {
            background-color: #fff;
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
            letter-spacing: 1px;
        }

        /* Table Styles */
        table {
            width: 100%;
            margin-top: 2px;
        }

        td {
            padding: 10px 0;
            font-size: 16px;
            color: #555;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        /* Input Field Styles */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
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
            font-size: 18px;
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
                padding: 20px;
            }

            table {
                width: 100%;
            }

            td {
                display: block;
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
    <div class="container">
        <h2>Edit Barang</h2>
        <?php

        include 'koneksi.php';
        $id = $_GET['id'];
        $data = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode_brg='$id'");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <form action="fungsiedit.php" method="post">
                <table>
                    <tr>
                        <td><label for="kode_brg">Kode Barang:</label></td>
                        <td><input type="text" id="kode_brg" name="kode_brg" value="<?php echo $d['kode_brg']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="nama_brg">Nama Barang:</label></td>
                        <td><input type="text" id="nama_brg" name="nama_brg" value="<?php echo $d['nama_brg']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="merk">Merk Barang:</label></td>
                        <td><input type="text" id="merk" name="merk" value="<?php echo $d['merk']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="harga">Harga Barang:</label></td>
                        <td><input type="text" id="harga" name="harga" value="<?php echo $d['harga']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="jumlah">Jumlah Barang:</label></td>
                        <td><input type="text" id="jumlah" name="jumlah" value="<?php echo $d['jumlah']; ?>"></td>
                    </tr>
                </table>
                <button type="submit" name="edit">Edit</button>
            </form>
        <?php
        }
        ?>
    </div>
</body>

</html>