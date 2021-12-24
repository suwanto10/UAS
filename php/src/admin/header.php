<?php
session_start();
include 'cek.php';
include "config.php";
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/global/css/bootstrap.css">
     
    <title>Point of Sale</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-light bg-light" style="margin-bottom:1%;">
        <a class="navbar-brand" href="#">
            <img src="../assets/global/img/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="" style="margin-right:0.2em;">
            <label> Point Of Sale </label>
        </a>
        <div class="">
            <label>Hy , <?php echo $username; ?>&nbsp&nbsp<span class="fa fa-user"></span></label>
        </div>
    </nav>
    <!-- navbar -->

    <?php
    $query = "SELECT m_barang, m_pegawai, m_supplier, t1, t2, l FROM pegawai where username='$username'";
    $row = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_assoc($row)) {
        $kolom[0] = $data['m_barang'];
        $kolom[1] = $data['m_pegawai'];
        $kolom[2] = $data['m_supplier'];
        $kolom[3] = $data['t1'];
        $kolom[4] = $data['t2'];
        $kolom[5] = $data['l'];
    }
    ?>
    <!-- sidebar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12" style="margin-bottom:2%">
                        <img class="img-thumbnail img-fluid" src="../assets/global/img/star-lord.png">
                    </div>
                </div>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php"><span class="fa fa-area-chart"></span> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#master" data-toggle="collapse"><span class="fa fa-briefcase"></span> Master</a>
                        <ul id="master" class="nav-item collapse">
                            <?php
                            if ($kolom[0]) {
                                ?>
                                <a class="nav link" href="barang.php">Data Barang</a>
                            <?php
                        } else { ?>
                                <a class="nav link" href="#" onclick="forbidden()">Data Barang</a>
                            <?php
                        } ?>
                            <?php
                            if ($kolom[1]) {
                                ?>
                                <a class="nav link" href="pegawai.php">Data Pegawai</a>
                            <?php
                        } else { ?>
                                <a class="nav link" href="#" onclick="forbidden()">Data Pegawai</a>
                            <?php
                        } ?>
                            <?php
                            if ($kolom[2]) {
                                ?>
                                <a class="nav link" href="supplier.php">Data Supplier</a>
                            <?php
                        } else { ?>
                                <a class="nav link" href="#" onclick="forbidden()">Data Supplier</a>
                            <?php
                        } ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#trans" data-toggle="collapse"><span class="fa fa-exchange"></span> Transaksi</a>
                        <ul id="trans" class="nav-item collapse">
                            <?php
                            if ($kolom[3]) {
                                ?>
                                <a class="nav link" href="transaksi_penjualan.php">Transaksi Penjualan</a>
                            <?php
                        } else { ?>
                                <a class="nav link" href="#" onclick="forbidden()">Transaksi Penjualan</a>
                            <?php
                        } ?>
                             <?php
                            if ($kolom[4]) {
                                ?>
                                <a class="nav link" href="transaksi_pembelian.php">Transaksi Pembelian</a>
                            <?php
                        } else { ?>
                                <a class="nav link" href="#" onclick="forbidden()">Transaksi Pembelian</a>
                            <?php
                        } ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tran" data-toggle="collapse"><span class="fa fa-sticky-note-o"></span> Laporan</a>
                    </li>
                    <li class="nav-item" style="color: rgb(0,125,255);">
                        <a class="nav-link" onclick="logout()" id="logout"><span class="fa fa-sign-out"></span> Log Out</a>
                    </li>
                </ul>
            </div>
            <!-- sidebar -->
            <div class="col-md-10">