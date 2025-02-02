<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
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
            padding: 10px;
        }

        /* Form Container */
        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 15px;
            background-color: #fff;
            border-radius: 8px;
            /* box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1); */
        }

        /* Form Title */
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 15px;
            font-size: 18px;
            letter-spacing: 0.5px;
        }

        /* Label Styles */
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 3px;
            color: #555;
            font-size: 14px;
        }

        /* Input Field Styles */
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            font-size: 14px;
        }

        input[type="text"]:focus {
            border-color: #007BFF;
            outline: none;
        }

        /* Button Styles */
        button[type="submit"] {
            width: 100%;
            padding: 8px;
            background-color: #007BFF;
            border: none;
            color: white;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Margin between buttons */
        button {
            margin-bottom: 10px;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            form {
                padding: 10px;
            }
        }
    </style>
    <form action="fungsi_brg.php" method="post">
        <h2>Tambah Barang</h2>
        <label for="kode_barang">Kode Barang</label>
        <input type="text" id="kode_barang" name="kode_barang">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" id="nama_barang" name="nama_barang">
        <label for="merk">Merk Barang</label>
        <input type="text" id="merk" name="merk">
        <label for="harga">Harga Barang</label>
        <input type="text" id="harga" name="harga">
        <label for="jumlah">Jumlah Barang</label>
        <input type="text" id="jumlah" name="jumlah">
        <button type="submit" name="simpan">Simpan</button>
        <button type="submit" name="kembali">Kembali</button>
    </form>
</body>

</html>