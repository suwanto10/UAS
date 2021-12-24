<?php 
session_start();
include 'admin/config.php';

$uname=$_POST['username'];
$pass=$_POST['password'];


$query=mysqli_query($conn, "select * FROM pegawai where username='$uname' and password='$pass'");
if(mysqli_num_rows($query)>0){
	$_SESSION['username']=$uname;
	header("location:admin/index.php");
}else{
	header("location:index.php?pesan=gagal")or die(mysql_error());
	
}

 ?>