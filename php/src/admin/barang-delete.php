<?php
include 'config.php';

$kode = $_GET['kode_barang'];

$query = "DELETE from barang where kode_barang='$kode'";
mysqli_query($conn, $query);
header('location: barang.php');

?>