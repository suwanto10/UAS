<?php
include 'header.php';
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="supplier.php">Supplier</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Supplier</li>
    </ol>
</nav>

<?php
$id = $_GET['id'];
$query = "SELECT * FROM supplier WHERE kode_supplier = '$id'";
$row = mysqli_query($conn, $query);
while ($data = mysqli_fetch_assoc($row)) {
    ?>
    <h3>Update Data Supplier</h3>
    <div class="card">
        <div class="card-body">
            <form action="supplier-update-proses.php" method="POST">
                <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "gagal") {
                        echo "<div class='alert alert-danger' role='alert'></span>  Kode Supplier Sudah Terdaftar !!</div>";
                    }
                }
                ?>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" placeholder="Kode Supplier" name="asw" value="<?php echo $data['kode_supplier']; ?>" disabled>
                    <input type="hidden" name="kode" value="<?php echo $data['kode_supplier']; ?>">
                </div>
                <div class="row form-group">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Nama Supplier" name="nama" value="<?php echo $data['nama_supplier']; ?>" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Nama Perusahaan" name="perusahaan" value="<?php echo $data['nama_perusahaan']; ?>" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $data['alamat']; ?>" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Kota" name="kota" value="<?php echo $data['kota']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="No. Telepon" name="no_tlp" value="<?php echo $data['no_tlp']; ?>" required>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="No. Handphone" name="no_hp" value="<?php echo $data['no_hp']; ?>" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $data['email']; ?>" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Keterangan" name="ket"><?php echo $data['keterangan']; ?></textarea>
                </div>
                <a href="supplier.php"><button type="button" class="btn btn-secondary"><span class="fa fa-arrow-left"></span></button></a>
                <input type="submit" class="btn btn-primary" value="Update">
            </form>
        </div>
    </div>
<?php
}
?>

<?php
include 'footer.php';
?>