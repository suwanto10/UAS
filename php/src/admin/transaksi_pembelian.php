<?php
include 'header.php';

?>


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Transaksi Pembelian</li>
    </ol>
</nav>

<div class="card">
    <div class="card-body">
        <?php
        date_default_timezone_set('Asia/Bangkok');
        $x = date('Ymd.hisms');

        ?>
        <form action="transaksi.php" method="POST">
            <div style="margin-bottom: 1em;">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="hidden" name="kodetgl" value="<?php echo 'tr' . $x; ?>">
                            <input type="date" class="form-control" placeholder="Tangggal Transaksi" name="asc" value="<?php echo date('Y-m-d') ?>" readonly>
                            <input type="hidden" name="tgl" value="<?php echo date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nomor" name="nmr">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nama" name="nama" id="nm" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control" name="kategori" id="sup123" >
                                <option value="" selected="selected">Pilih Supplier</option>
                                <?php
                                // query untuk menampilkan semua kategori dari tabel 
                                $query = "SELECT * FROM supplier";
                                $hasil = mysqli_query($conn, $query);
                                while ($data = mysqli_fetch_array($hasil)) {
                                    echo "<option value='" . $data['kode_supplier'] . "'>" . $data['nama_perusahaan'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Telepon" name="tlp" id="tlp" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email" name="email" id="email" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Keterangan" name="ket">
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Alamat" name="alm" id="alm" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-auto">
                    <button type="button" class="btn btn-outline-primary" id="plus" data-toggle="modal" data-target="#exampleModal">+</button>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Kode Barang" name="kode" id="kode">
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang" id="nama_barang">
                </div>
                <div class="col-md-1">
                    <input type="text" class="form-control" placeholder="Satuan Barang" name="satuan" id="satuan">
                </div>
                <div class="col-auto">
                    <input type="number" class="form-control" placeholder="Harga Barang" name="harga" id="harga">
                </div>
                <div class="col-md-2">
                    <input type="number" class="form-control" placeholder="Jumlah Barang" name="jml" id="jml">
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-success" onclick="addBarang()">Add</button>
                </div>
            </div>
            <div id="isi">
                <table class="table table-sm table-bordered table-hover" style="margin-top: 1em; text-align:center;">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th> - </th>
                            <th> - </th>
                            <th> - </th>
                            <th> - </th>
                            <th> - </th>
                            <th> - </th>
                            <th> - </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="ppn">PPN (%)</label>
                                        <input type="number" class="form-control" name="ppn" id="ppn" onchange="myppn()">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="diskon">Diskon (%)</label>
                                        <input type="number" class="form-control" name="diskon" id="diskon" onchange="mydiskon()">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ml-auto">  
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="number" class="form-control" name="total" id="total" data-a-sign="Rp." data-a-dec="," data-a-sep="." readonly>
                            </div>
                            <div class="form-group">
                                <label for="grandtotal">Grand Total</label>
                                <input type="number" class="form-control" name="gtot" id="grandtotal" readonly>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary" id="save" name="save" value="Buy">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="text" class="form-control" id="isitabel1" name="isitabel1" value="-" readonly hidden>
            <input type="text" class="form-control" id="isitabel2" name="isitabel2" value="-" readonly hidden>
            <input type="text" class="form-control" id="isitabel3" name="isitabel3" value="-" readonly hidden>
            <input type="text" class="form-control" id="isitabel4" name="isitabel4" value="-" readonly hidden>
            <input type="text" class="form-control" id="isitabel5" name="isitabel5" value="-" readonly hidden>
            <input type="text" class="form-control" id="isitabel6" name="isitabel6" value="-" readonly hidden>
        </form>
    </div>
</div>

<!-- modal -->
<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-sm table-bordered" id="mytable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan Barang</th>
                            <th>Harga Barang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM barang";
                        $row = mysqli_query($conn, $query);
                        ?>

                        <?php
                        $no = 1;
                        $rec = 1;
                        while ($data = mysqli_fetch_assoc($row)) {
                            ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td id=ko<?php echo $rec ?>><?php echo $data["kode_barang"]; ?></td>
                                <td id=na<?php echo $rec ?>><?php echo $data["nama_barang"]; ?></td>
                                <td id=sa<?php echo $rec ?>><?php echo $data["satuan"]; ?></td>
                                <td id=ha<?php echo $rec ?>><?php echo $data["harga_jual"]; ?></td>
                                <td>
                                    <button type="button" data-dismiss="modal" class="btn btn-success" onclick="addrecord(<?php echo $rec ?>)">Add</button>
                                </td>
                            </tr>
                            <?php
                            $no++;
                            $rec++;
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="barang-store.php"><button type="button" class="btn btn-primary">+ Tambah Barang</button></a>
            </div>
        </div>
    </div>
</div>
<!-- modal -->



<?php
include 'footer.php'
?>