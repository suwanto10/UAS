<?php
include 'header.php';
if ($kolom[0] == false) {
    session_start();
    session_destroy();
    header("location:../index.php");
}
?>

<?php
$query = "SELECT * FROM barang";
$row = mysqli_query($conn, $query);
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Barang</li>
    </ol>
</nav>

<h3>Data Barang</h3>
<div class="card">
    <div class="card-body">
        <a href="barang-store.php"><button type="button" class="btn btn-sm btn-success" style="margin-bottom:1%; margin-top:0%;">+ Tambah</button></a>
        <table class="table table-sm table-bordered table-hover" style=" text-align: center;">
            <thead class="table-dark">
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Action</th>
            </thead>
            <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($row)) {
                ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data["kode_barang"]; ?></td>
                    <td><?php echo $data["nama_barang"]; ?></td>
                    <td><?php echo $data["satuan"]; ?></td>
                    <td><?php echo $data["stok"]; ?></td>
                    <td>Rp. <?php echo number_format($data["harga_jual"]); ?></td>
                    <td>
                        <a href="barang-update.php?kode_barang=<?php echo $data['kode_barang']?>"><button type="button" class="btn btn-primary btn-sm" title="Edit"><span class="fa fa-pencil"></span></button></a>
                        <a href="barang-delete.php?kode_barang=<?php echo $data['kode_barang']; ?>" onclick="deleted()"><button type="button" class="btn btn-danger btn-sm" title="Delete"><span class="fa fa-trash"></span></button></a>
                        <a href="barang-detail.php?kode_barang=<?php echo $data['kode_barang']; ?>"><button type="button" class="btn btn-info btn-sm" title="Detail"><span class="fa fa-info-circle"></span></button></a>
                    </td>
                </tr>
                <?php $no++;
            } ?>
        </table>
    </div>
</div>
<?php
include 'footer.php';
?>