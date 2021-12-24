<?php
include 'header.php';
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="barang.php">Pegawai</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Pegawai</li>
    </ol>
</nav>

<?php
$id = $_GET['nip'];
$query = "SELECT * FROM pegawai WHERE nip = '$id'";
$row = mysqli_query($conn, $query);
while ($data = mysqli_fetch_assoc($row)) {
    ?>
    <h3>Update Data Pegawai</h3>
    <div class="card">
        <div class="card-body">
            <form action="pegawai-update-proses.php" method="POST">
                <div class="row form-group">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="NIP" name="asc" value="<?php echo $data['nip']; ?>" disabled required>
                        <input type="hidden" name="nip" value="<?php echo $data['nip']; ?>">
                    </div>
                    <div class="col">
                        <select class="form-control" name="jabatan">
                            <?php
                            // query untuk menampilkan semua jabatan dari tabel 
                            $query1 = "SELECT * FROM jabatan";
                            $hasil1 = mysqli_query($conn, $query1);
                            while ($data1 = mysqli_fetch_assoc($hasil1)) {
                                $selected = ($data['kode_jabatan'] == $data1['kode_jabatan'] ? 'selected="selected"' : '');
                                echo '<option value ="' . $data1['kode_jabatan'] . '" ' . $selected . '>' . $data1['nama_jabatan'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-success">+</button>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Nama Depan" name="nama_depan" value="<?php echo $data['nama_depan']; ?>" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Nama Belakang" name="nama_belakang" value="<?php echo $data['nama_belakang']; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card" style="margin-bottom: 1em;">
                            <div class="card-header">
                                Jenis Kelamin
                            </div>
                            <div class="card-body">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" value="L" name="jk" <?= $data['jk'] == "L" ? "checked" : "" ?> class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline1">Laki - Laki</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" value="P" name="jk" <?= $data['jk'] == "P" ? "checked" : "" ?> class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Alamat" name="alamat" rows="3"><?php echo $data['alamat']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="No. Telepon" name="no_tlp" value="<?php echo $data['no_tlp']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $data['email']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Pendidikan" name="pendidikan" value="<?php echo $data['pendidikan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Rekrut</label>
                            <input type="date" class="form-control" placeholder="Tanggal Rekrut" name="tgl_rekrut" value="<?php echo $data['tgl_rekrut']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="margin-bottom: 1em;">
                            <div class="card-header">
                                Data User Login
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username" name="user" value="<?php echo $data['username']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="pass" value="<?php echo $data['password']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                Hak Akses
                            </div>
                            <div class="card-body">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="m_barang" id="barang" value="1" <?= $data['m_barang'] == "1" ? "checked" : "" ?> >
                                    <label class="custom-control-label" for="barang">Master Barang</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="m_pegawai" id="pegawai" value="1" <?= $data['m_pegawai'] == "1" ? "checked" : "" ?>>
                                    <label class="custom-control-label" for="pegawai">Master Pegawai</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="m_supplier" id="supplier" value="1" <?= $data['m_supplier'] == "1" ? "checked" : "" ?>>
                                    <label class="custom-control-label" for="supplier">Master Supplier</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="t1" id="t1" value="1" <?= $data['t1'] == "1" ? "checked" : "" ?>>
                                    <label class="custom-control-label" for="t1">Transaksi Pembelian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="t2" id="t2" value="1" <?= $data['t2'] == "1" ? "checked" : "" ?>>
                                    <label class="custom-control-label" for="t2">Transaksi Penjualan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="l1" id="l" value="1" <?= $data['l'] == "1" ? "checked" : "" ?>>
                                    <label class="custom-control-label" for="l">Laporan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <a href="pegawai.php"><button type="button" class="btn btn-secondary"><span class="fa fa-arrow-left"></span></button></a>
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div>
    </div>
<?php
}
?>

<?php
include 'footer.php';
?>