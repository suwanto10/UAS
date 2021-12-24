<?php
include 'header.php';
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="barang.php">Barang</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Barang</li>
    </ol>
</nav>

<div class="card">
    <div class="card-body">
        <h3>Detail Data Barang</h3>
        <?php
        $id = $_GET['kode_barang'];
        $query = "SELECT kode_barang, nama_barang, k.nama_kategori , satuan, stok, harga_beli, harga_jual FROM barang b JOIN kategori k ON b.kode_kategori=k.kode_kategori WHERE kode_barang = '$id'";
        $row = mysqli_query($conn, $query);
        while ($data = mysqli_fetch_array($row)) {
            ?>
            <style>
                .green {
                    background: rgba(76, 175, 80, 0.1);
                }
            </style>
            <table class="table">
                <tbody>
                    <tr>
                        <td class="green">Kode Barang</td>
                        <td><?php echo $data['kode_barang'] ?></td>
                    </tr>
                    <tr>
                        <td class="green">Nama</td>
                        <td><?php echo $data['nama_barang'] ?></td>
                    </tr>
                    <tr>
                        <td class="green">Kategori</td>
                        <td><?php echo $data['nama_kategori'] ?></td>
                    </tr>
                    <tr>
                        <td class="green">Satuan</td>
                        <td><?php echo $data['satuan'] ?></td>
                    </tr>
                    <tr>
                        <td class="green">Stok</td>
                        <td><?php echo $data['stok'] ?></td>
                    </tr>
                    <tr>
                        <td class="green">Harga Beli</td>
                        <td>Rp.<?php echo number_format($data['harga_beli']); ?>,-</td>
                    </tr>
                    <tr>
                        <td class="green">Harga Jual</td>
                        <td>Rp.<?php echo number_format($data['harga_jual']) ?>,-</td>
                    </tr>
                    <tr>
                        <td><a href="barang.php"><button type="button" class="btn btn-secondary"><span class="fa fa-arrow-left"></span></button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php
}
?>

<?php
include 'footer.php';
?>