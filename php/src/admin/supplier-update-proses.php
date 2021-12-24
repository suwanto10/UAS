<?php
include 'config.php';

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$prshn = $_POST['perusahaan'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$no_tlp = $_POST['no_tlp'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$ket = $_POST['ket'];


$query = "UPDATE supplier SET nama_supplier='$nama', nama_perusahaan='$prshn', alamat='$alamat', kota='$kota', no_tlp='$no_tlp', no_hp='$no_hp', email='$email', keterangan='$ket' where kode_supplier='$kode'";
$succes = mysqli_query($conn, $query);
if($succes){
    header('location: supplier.php');
}else{
    echo mysqli_error($conn);
}
mysqli_close($conn);

?>