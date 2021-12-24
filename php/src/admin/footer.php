</div>
</div>
</div>
</body>
<script src="../assets/global/js/jquery-3.4.1.js"></script>
<script src="../assets/global/js/popper.min.js"></script>
<script src="../assets/global/js/bootstrap.min.js"></script>
<script>
    var datako = [];
    var datana = [];
    var datasa = [];
    var dataha = [];
    var dataju = [];
    var datato = [];

    function uang(num) {
        return 'Rp' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

    function openini() {

    }

    function forbidden() {
        alert("Anda tidak bisa mengakses halaman ini!");
    }

    function logout() {
        var txt;
        txt = confirm("Apakah anda yakin ingin keluar??");
        if(txt==true){
            location.href = "logout.php"
        }
    }

    function deleted() {
        confirm("Apakah anda yakin ingin menghapus data ini ??")
    }

    function addrecord(i) {

        a = document.getElementById('ko' + i).innerHTML;
        b = document.getElementById('na' + i).innerHTML;
        c = document.getElementById('sa' + i).innerHTML;
        d = document.getElementById('ha' + i).innerHTML;

        document.getElementById('kode').value = a;
        document.getElementById('nama_barang').value = b;
        document.getElementById('satuan').value = c;
        document.getElementById('harga').value = d;

    }

    function deleteBarang(x) {
        datako.splice(x, 1);
        datana.splice(x, 1);
        datasa.splice(x, 1);
        dataha.splice(x, 1);
        dataju.splice(x, 1);
        datato.splice(x, 1);

        var x = "";
        var i;
        for (i = 0; i < datako.length; i++) {
            x += "<tr><td><button type=\"Button\" class=\"btn btn-danger\" data-dismiss=\"modal\" onclick=\"deleteBarang(" + i + ")\"><span class=\"fa fa-trash\"></span></button></td><td>" + datako[i] + "</td><td>" + datana[i] + "</td><td>" + datasa[i] + "</td><td>" + dataha[i] + "</td><td>" + dataju[i] + "</td><td>" + datato[i] + "</td></tr>";
        }

        document.getElementById("isi").innerHTML = "<table class=\"table table-hover table-sm table-bordered\" style=\"margin-top: 1em; text-align:center;\"><thead>" + "<tr><th>Action</th><th>Kode</th><th>Nama</th><th>Satuan</th><th>Jumlah</th><th>Harga Jual</th><th>Total</th></tr>" + "</thead><tbody>" + x + "</tbody></table>";
    }

    function myppn() {
        var tot = document.getElementById('total').value;
        var dis = document.getElementById('diskon').value;
        var ppn = document.getElementById('ppn').value;

        if (dis == "") {
            dis = 0;
        }
        var hasil;
        hasil = (Number(tot) * (1 - (Number(dis) / 100))) * (1 + (Number(ppn) / 100));
        document.getElementById('grandtotal').value = Number(hasil);
    }

    function mydiskon() {
        var tot = document.getElementById('total').value;
        var dis = document.getElementById('diskon').value;
        var ppn = document.getElementById('ppn').value;
        if (ppn == "") {
            ppn = 0;
        }
        var hasil;
        hasil = (Number(tot) * (1 - (Number(dis) / 100))) * (1 + (Number(ppn) / 100));
        document.getElementById('grandtotal').value = Number(hasil);
    }

    function mybayar() {
        var tot = document.getElementById('total').value;
        var dis = document.getElementById('diskon').value;
        var ppn = document.getElementById('ppn').value;
        var bayar = document.getElementById('bayar').value;

        if (dis == "") {
            dis = 0;
        }
        var hasil;
        hasil = (Number(tot) * (1 - (Number(dis) / 100))) * (1 + (Number(ppn) / 100));
        document.getElementById('grandtotal').value = hasil;

        var kembalinya;
        kembalinya = Number(bayar) - hasil;
        document.getElementById('kembalian').value = kembalinya;
    }

    function addBarang() {
        var jum = datako.length;
        var ko1 = document.getElementById('kode').value;
        var na1 = document.getElementById('nama_barang').value;
        var sa1 = document.getElementById('satuan').value;
        var ha1 = document.getElementById('harga').value;
        var ju1 = document.getElementById('jml').value;
        if (ko1 != "" && na1 != "" && sa1 != "" && ha1 != "" && ju1 != "") {
            datako[jum] = document.getElementById('kode').value;
            datana[jum] = document.getElementById('nama_barang').value;
            datasa[jum] = document.getElementById('satuan').value;
            dataha[jum] = document.getElementById('harga').value;
            dataju[jum] = document.getElementById('jml').value;

            datato[jum] = Number(document.getElementById('harga').value) * Number(document.getElementById('jml').value);

            var x = "";
            var i;
            var total;
            total = 0;
            for (i = 0; i < datako.length; i++) {
                x += "<tr><td><button type=\"button\" class=\" btn btn-danger\" data-dismis=\" modal\" onclick=\" deleteBarang(" + i + ")\"><span class=\"fa fa-trash\"></span></button></td><td>" + datako[i] + "</td><td>" + datana[i] + "</td><td>" + datasa[i] + "</td><td>" + dataha[i] + "</td><td>" + dataju[i] + "</td><td>" + datato[i] + "</td></tr>";
                total = total + datato[i];
            }
            document.getElementById("total").value = total;
            if ((document.getElementById('diskon').value == "0") || (document.getElementById('diskon').value == "")) {
                document.getElementById('diskon').value == "0";
            }
            if ((document.getElementById('ppn').value == "0") || (document.getElementById('ppn').value == "")) {
                document.getElementById('ppn').value == "0";
            }
            mydiskon();
            myppn();

            document.getElementById("isi").innerHTML = "<table class=\"table table-hover table-sm table-bordered\" style=\"margin-top: 1em; text-align:center;\"><thead>" + "<tr><th>Action</th><th>Kode</th><th>Nama</th><th>Satuan</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th></tr>" +
                "</thead></tbody>" + x +
                "</tbody></table>";
            document.getElementById("kode").value = "";
            document.getElementById("nama_barang").value = "";
            document.getElementById("satuan").value = "";
            document.getElementById("harga").value = "";
            document.getElementById("jml").value = "";
            window.alert(datako);
            document.getElementById("isitabel1").value = datako;
            document.getElementById("isitabel2").value = datana;
            document.getElementById("isitabel3").value = datasa;
            document.getElementById("isitabel4").value = dataha;
            document.getElementById("isitabel5").value = dataju;
            document.getElementById("isitabel6").value = datato;
        } else {
            window.alert("Ada element yang kosong");
        }
    }

    

    $(document).ready(function() {
        $('#sup123').change(function() {
            var valSelect = $(this).val()
            $.ajax({
                type: "POST",
                url: "supplierku.php?id="+valSelect,
                data: "id=valSelect",
                dataType: "json",
                cache: false,
                success: function(response) {
            
                    document.getElementById("nm").value = response["nama_supplier"];
                    document.getElementById("alm").value = response["alamat"];
                    document.getElementById("tlp").value = response["no_hp"];
                    document.getElementById("email").value = response["email"];
                    
                }
            });
        });
    });
</script>

</html>