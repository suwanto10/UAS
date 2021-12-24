<?php 
include 'header.php';
?>

<h3>Selamat datang</h3>	
<h3>Aplikasi Penjualan Sederhana</h3>
<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter" style="margin-top:2%;">
  Click me!
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p style="line-height: 2em; text-align: center;">Point of Sale Star-Lord Beta 
        <br>&copy Sebastianus Sembara
        <br>July, 12 2019
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Donation</button>
      </div>
    </div>
  </div>
</div>

<?php 
include 'footer.php';
?>