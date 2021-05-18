<?php include 'header.php'; 

$sql      = "SELECT * FROM tb_supplier ";
$result   = mysqli_query($conn, $sql);
$datasup  = mysqli_num_rows($result);

$sql1      = "SELECT * FROM tb_barang_masuk ";
$result1   = mysqli_query($conn, $sql1);
$databm    = mysqli_num_rows($result1);

$sql2      = "SELECT * FROM tb_barang_keluar ";
$result2   = mysqli_query($conn, $sql2);
$databk    = mysqli_num_rows($result2);

?>
<style>
  a{
    font-size:14px;
  }
.cool-link {
    display: inline-block;
    color: #000;
    text-decoration: none;
}

.cool-link::after {
    content: '';
    display: block;
    width: 0;
    height: 2px;
    background: #FEC625;
    transition: width .3s;
}

.cool-link:hover::after {
    width: 100%;
    //transition: width .3s;
}
</style>

<div class="d-flex" id="wrapper" >
            <!-- Sidebar-->
          <?php include 'komponen/sidebar.php' ?>
            <div id="page-content-wrapper" class="col-sm-10 p-0">
             
          <?php include 'komponen/navbar.php' ?>
            <!-- Page Content-->

<div class="row mb-3 mt-2 p-2">
  <div class="col-sm-4">
  <a href="laporanbarang.php" style="text-decoration:none">
    <div class="card bg-secondary text-white">
      <div class="card-body">  
        <div class="row">
          <div class="col-sm-8">
            <h6>Laporan</h6>
          <h5 class="card-title">Stok Barang</h5>
          </div>
          <div class="col-sm-4 text-right">
          <p class="card-text"><i class="fa fa-th-large fa-3x"></i></p>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <div class="col-sm-4">
  <a href="laporanbarangmasuk.php" style="text-decoration:none">
    <div class="card bg-secondary text-white">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-8">
            <h6>Laporan </h6>
          <h5 class="card-title">Barang Masuk</h5>
          </div>
          <div class="col-sm-4 text-right">
          <p class="card-text"><i class="fa fa-book fa-3x"></i></p>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <div class="col-sm-4">
  <a href="laporanbarangkeluar.php" style="text-decoration:none">
    <div class="card bg-secondary text-white">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-8">
            <h6>Laporan</h6>
          <h5 class="card-title">Barang Keluar</h5>
          </div>
          <div class="col-sm-4 text-right">
          <p class="card-text"><i class="fa fa-book fa-3x"></i></p>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
</div>
</div>
</div>

<?php include 'komponen/footer.php'; ?>