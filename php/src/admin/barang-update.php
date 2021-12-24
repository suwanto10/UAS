<?php
include 'header.php';
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="barang.php">Barang</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Barang</li>
    </ol>
</nav>

<?php
$id = $_GET['kode_barang'];
$query = "SELECT * FROM barang WHERE kode_barang='$id'";
$row = mysqli_query($conn, $query);
while ($data = mysqli_fetch_assoc($row)) {
    ?>
    <h3>Update Barang</h3>
    <div class="card">
        <div class="card-body">
            <form action="barang-update-proses.php" method="POST">
                <div class="row form-group">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Kode Barang" value="<?php echo $data['kode_barang']; ?>" name="asd" disabled required>
                        <input type="hidden" name="kode_barang" value="<?php echo $data['kode_barang']; ?>">
                    </div>
                    <div class="col">
                        <select class="form-control" name="kategori">
                            <?php
                            // query untuk menampilkan semua kategori dari tabel 
                            $query1 = "SELECT * FROM kategori";
                            $hasil1 = mysqli_query($conn, $query1);
                            while ($data1 = mysqli_fetch_assoc($hasil1)) {
                                $selected = ($data['kode_kategori'] == $data1['kode_kategori'] ? 'selected="selected"' : '');
                                echo '<option value ="' . $data1['kode_kategori'] . '" '. $selected .'>' . $data1['nama_kategori'] . '</option>';
                                
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-success">+</button>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Nama Barang" name="nama" value="<?php echo $data['nama_barang']; ?>" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Satuan" name="satuan" value="<?php echo $data['satuan']; ?>" required>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Stok Barang" name="stok" value="<?php echo $data['stok']; ?>" required>
                    </div>
                    <div class="col">
                        <select class="form-control" name="sup">
                            <?php
                            // query untuk menampilkan semua kategori dari tabel 
                            $query1 = "SELECT * FROM supplier";
                            $hasil1 = mysqli_query($conn, $query1);
                            while ($data1 = mysqli_fetch_assoc($hasil1)) {
                                $selected = ($data['kode_supplier'] == $data1['kode_supplier'] ? 'selected="selected"' : '');
                                echo '<option value ="' . $data1['kode_supplier'] . '" '. $selected .'>' . $data1['nama_perusahaan'] . '</option>';
                                
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Harga Beli" name="hbeli" value="<?php echo $data['harga_beli']; ?>" required>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Harga Jual" name="hjual" value="<?php echo $data['harga_jual']; ?>" required>
                </div>
                <a href="barang.php"><button type="button" class="btn btn-secondary"><span class="fa fa-arrow-left"></span></button></a>
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