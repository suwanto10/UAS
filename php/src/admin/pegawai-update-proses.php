<?php
include 'config.php';

$nip = $_POST['nip'];
$jabatan = $_POST['jabatan'];
$nama_depan = $_POST['nama_depan'];
$nama_belakang = $_POST['nama_belakang'];
$alamat = $_POST['alamat'];
$no_tlp = $_POST['no_tlp'];
$email = $_POST['email'];
$ttl = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$pendidikan = $_POST['pendidikan'];
$hire_date = $_POST['tgl_rekrut'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$m_barang = $_POST['m_barang'];
$m_pegawai = $_POST['m_pegawai'];
$m_supplier = $_POST['m_supplier'];
$t1 = $_POST['t1'];
$t2 = $_POST['t2'];
$l1 = $_POST['l1'];

if($jk=='L'){
    $jkw = 'Laki-Laki';
}else{
    $jkw = 'Perempuan';
}

if($m_barang==null){
    $m_barang = '0';
} else if($m_pegawai==null){
    $m_pegawai = '0';
} else if($m_supplier==null){
    $m_supplier = '0';
} else if($t1==null){
    $t1 = '0';
} else if($t2==null){
    $t2 = '0';
} else if($l1==null){
    $l1 = '0';
}

$query = "UPDATE pegawai SET kode_jabatan='$jabatan', nama_depan='$nama_depan', nama_belakang='$nama_belakang', alamat='$alamat', no_tlp='$no_tlp', email='$email', tgl_lahir='$ttl', jk='$jkw', pendidikan='$pendidikan',tgl_rekrut='$hire_date', username='$user', password='$pass', m_barang='$m_barang', m_pegawai='$m_pegawai', m_supplier='$m_supplier', t1='$t1', t2='$t2', l='$l1' where nip='$nip'";
$succes = mysqli_query($conn, $query);

if($succes){
    header('location: pegawai.php');
}else{
    echo mysqli_error($conn);
}


?>