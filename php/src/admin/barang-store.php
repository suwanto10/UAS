<?php
include 'header.php';
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="barang.php">Barang</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Barang</li>
    </ol>
</nav>

<h3>Tambah Barang</h3>
<div class="card">
    <div class="card-body">
        <form action="barang-store-proses.php" method="POST">
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "<div class='alert alert-danger' role='alert'></span>  Kode Barang Sudah Terdaftar !!</div>";
                }
            }
            ?>
            <div class="row form-group">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Kode Barang" name="kode" required>
                </div>
                <div class="col">
                    <select class="form-control" name="kategori">
                        <option value="" selected="selected">Pilih Kategori</option>
                        <?php
                        // query untuk menampilkan semua kategori dari tabel 
                        $query = "SELECT * FROM kategori";
                        $hasil = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_array($hasil)) {
                            echo "<option value='" . $data['kode_kategori'] . "'>" . $data['nama_kategori'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        +
                    </button>
                </div>
            </div>
            <div class="row form-group">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Nama Barang" name="nama" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Satuan" name="satuan" required>
                </div>
                <div class="col">
                    <input type="number" class="form-control" placeholder="Stok Barang" name="stok" required>
                </div>
                <div class="col">
                    <select class="form-control" name="sup">
                        <option value="" selected="selected">Pilih Supplier</option>
                        <?php
                        // query untuk menampilkan semua supplier dari tabel 
                        $query = "SELECT * FROM supplier";
                        $hasil = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_array($hasil)) {
                            echo "<option value='" . $data['kode_supplier'] . "'>" . $data['nama_perusahaan'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Harga Beli" name="hbeli" required>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Harga Jual" name="hjual" required>
            </div>
            <a href="barang.php"><button type="button" class="btn btn-secondary"><span class="fa fa-arrow-left"></span></button></a>
            <input type="submit" class="btn btn-primary" value="Save">
        </form>
    </div>
</div>

<!-- Modal Kategori-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="kategori-store-proses.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="kategori" placeholder="Nama Kategori">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
            </form>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>