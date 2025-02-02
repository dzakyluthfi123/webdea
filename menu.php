<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to external CSS file -->
</head>

<body>
    <style>
        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            color: #fff;
        }

        .sidebar-header {
            margin-bottom: 30px;
        }

        .sidebar-icon {
            width: 80px;
            /* Ubah ukuran sesuai kebutuhan */
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 2%;
            /* Membuat ikon berbentuk bulat */
        }

        .welcome-message {
            text-align: center;
            margin-bottom: 30px;
        }

        .welcome-message h3 {
            font-size: 16px;
            line-height: 1.5;
            font-weight: normal;
        }

        /* Sidebar Links */
        .sidebar a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            margin: 10px 0;
            padding: 10px 20px;
            width: 100%;
            text-align: center;
            display: block;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #444;
        }
    </style>
    <div class="sidebar">
        <!-- Icon di bagian atas -->
        <div class="sidebar-header">
            <img src="kasir.png" alt="Icon Kasir" class="sidebar-icon">
        </div>

        <!-- Pesan selamat datang -->
        <div class="welcome-message">
            <h3>Selamat Datang di Aplikasi Kasir Dea Rizky</h3>
        </div>

        <!-- Menu Navigasi -->
        <a href="tampil_brg.php">Kelola Barang</a>
        <a href="tampil_trs.php">Kelola Transaksi</a>
    </div>

    <br>
    <br>
    <div class="content">
        <!-- Main content will go here -->
        <!-- <h1 style="margin-left: 3%;">Welcome to the Dashboard Dea</h1> -->
        <!-- <p>Select an option from the sidebar to begin managing items or transactions.</p> -->
    </div>
</body>

</html>