<?php
include 'config.php';

$kode = $_GET['nip'];

$query = "DELETE from pegawai where nip='$kode'";
mysqli_query($conn, $query);
header('location: pegawai.php');

?>