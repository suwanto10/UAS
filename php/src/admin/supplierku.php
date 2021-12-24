<?php
include "config.php";


    $cuk = $_GET["id"];

    $query = "SELECT * FROM supplier WHERE kode_supplier='$cuk'";
    $row = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_assoc($row)) {
       echo json_encode($data);
    }
    // $array = array(1,2,3,4,5,6);
    // echo json_encode($array);

?>