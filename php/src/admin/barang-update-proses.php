<?php
include 'config.php';

$kode = $_POST['kode_barang'];
$kategori = $_POST['kategori'];
$nama = $_POST['nama'];
$satuan = $_POST['satuan'];
$stok = $_POST['stok'];
$hbeli = $_POST['hbeli'];
$hjual = $_POST['hjual'];
$sup = $_POST['sup'];

$query = "UPDATE barang SET kode_supplier='$sup', kode_kategori='$kategori', nama_barang='$nama', satuan='$satuan', stok='$stok', harga_beli='$hbeli', harga_jual='$hjual' where kode_barang='$kode'";
$succes = mysqli_query($conn, $query);

if($succes){
    header('location: barang.php');
}else{
    echo mysqli_error($conn);
}
mysqli_close($conn);

?>