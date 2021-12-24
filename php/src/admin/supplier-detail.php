<?php
include 'header.php';
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="barang.php">Supplier</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Supplier</li>
    </ol>
</nav>

<div class="card">
    <div class="card-body">
        <h3>Detail Data Supplier</h3>
        <?php
        $id = $_GET['id'];
        $query = "SELECT * FROM supplier WHERE kode_supplier = '$id'";
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
                        <td class="green">Kode Supplier</td>
                        <td><?php echo $data['kode_supplier'] ?></td>
                    </tr>
                    <tr>
                        <td class="green">Nama Supplier</td>
                        <td><?php echo $data['nama_supplier'];?></td>
                    </tr>
                    <tr>
                        <td class="green">Perusahaan</td>
                        <td><?php echo $data['nama_perusahaan'] ?></td>
                    </tr>
                    <tr>
                        <td class="green">Alamat</td>
                        <td><?php echo $data['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td class="green">Kota</td>
                        <td><?php echo $data['kota'] ?></td>
                    </tr>
                    <tr>
                        <td class="green">No. Telepon</td>
                        <td><?php echo $data['no_tlp'] ?></td>
                    </tr>
                    <tr>
                        <td class="green">No. Handphone</td>
                        <td><?php echo $data['no_hp'] ?></td>
                    </tr>
                    <tr>
                        <td class="green">email</td>
                        <td><?php echo $data['email'] ?></td>
                    </tr>
                    <tr>
                        <td class="green">Keterangan</td>
                        <td><?php echo $data['keterangan'] ?></td>
                    </tr>
                    <tr>
                        <td><a href="supplier.php"><button type="button" class="btn btn-secondary"><span class="fa fa-arrow-left"></span></button></a></td>
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