<?php
include 'config.php';

$kategori = $_POST['kategori'];

$query = "INSERT INTO kategori (nama_kategori) VALUES ('$kategori')";
$succes = mysqli_query($conn, $query);

if($succes){
    header('location: barang-store.php');
}else{
    echo mysqli_error($conn);
}
mysqli_close($conn);

