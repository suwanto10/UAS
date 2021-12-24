<?php
include 'header.php';
if ($kolom[2] == false) {
    session_start();
    session_destroy();
    header("location:../index.php");
}
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Supplier</li>
    </ol>
</nav>

<?php
$query = "SELECT * FROM supplier";
$row = mysqli_query($conn, $query);
?>

<h3>Data Supplier</h3>
<div class="card">
    <div class="card-body">
        <a href="supplier-store.php"><button type="button" class="btn btn-success" style="margin-bottom:2%; margin-top:2%;">+ Tambah</button></a>
        <table class="table table-sm table-bordered table-hover" style=" text-align: center;">
            <thead class="table-dark">
                <th>No</th>
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <th>Nama Perusahaan</th>
                <th>Kota</th>
                <th>Keterangan</th>
                <th>Action</th>
            </thead>
            <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($row)) {
                ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data["kode_supplier"]; ?></td>
                    <td><?php echo $data["nama_supplier"]; ?></td>
                    <td><?php echo $data["nama_perusahaan"]; ?></td>
                    <td><?php echo $data["kota"]; ?></td>
                    <td><?php echo $data["keterangan"]; ?></td>
                    <td>
                        <a href="supplier-update.php?id=<?php echo $data['kode_supplier']; ?>"><button type="button" class="btn btn-primary btn-sm" title="Edit"><span class="fa fa-pencil"></span></button></a>
                        <a href="supplier-delete.php?id=<?php echo $data['kode_supplier']; ?>" onclick="deleted()"><button type="button" class="btn btn-danger btn-sm" title="Delete"><span class="fa fa-trash"></span></button></a>
                        <a href="supplier-detail.php?id=<?php echo $data['kode_supplier']; ?>"><button type="button" class="btn btn-info btn-sm" title="Detail"><span class="fa fa-info-circle"></span></button></a>
                    </td>
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