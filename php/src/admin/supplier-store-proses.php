<?php
include 'config.php';

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$perusahaan = $_POST['perusahaan'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$tlp = $_POST['no_tlp'];
$hp = $_POST['no_hp'];
$email = $_POST['email'];
$ket = $_POST['ket'];

$query = "INSERT INTO supplier VALUES('$kode', '$nama', '$perusahaan', '$alamat', '$kota' ,'$tlp', '$hp', '$email', '$ket')";
$succes = mysqli_query($conn, $query);

$querys = "SELECT * FROM supplier";
$row = mysqli_query($conn, $querys);
while ($data = mysqli_fetch_assoc($row)) {

if($succes){
    header('location:supplier.php');
}else if($kode==$data['kode_supplier']){
    header("location:supplier-store.php?pesan=gagal");
}else{
    echo mysqli_error($conn);
}
mysqli_close($conn);

}
