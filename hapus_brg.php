<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM barang WHERE kode_brg='$id'");
header("Location: tampil_brg.php");
exit();
