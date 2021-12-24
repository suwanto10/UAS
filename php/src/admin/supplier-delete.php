<?php
include 'config.php';

$kode = $_GET['id'];

$query = "DELETE from supplier where kode_supplier='$kode'";
mysqli_query($conn, $query);
header('location: supplier.php');

?>