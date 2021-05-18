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
    transition: width .3s;
}
</style>

<div class="row" id="wrapper" >
            <!-- Sidebar-->
            
          <?php include 'komponen/sidebar.php' ?>
            <div id="page-content-wrapper" class="col-sm-10 p-0 justify-content-end" style="margin-left:16%"> 
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button class="btn btn-light btn-sm" id="menu-toggle"><b>SISTEM INFORMASI INVENTORY BARANG TB.AMANAH</b></button>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link mt-1" href="#!">
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#!" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/user.png" width="30px" alt="" class="mr-1" srcset=""> <?= $sesen_username ?> <b class="text-success"><?= $sesen_jabatan ?></b></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#!">Profil</a>
                                    <a class="dropdown-item" href="#!">Ganti Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!" id="jam"> </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="aksi/logout.php">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            <!-- Page Content-->


<!-- PEMILIK -->
<?php if ($sesen_jabatan == "pemilik"){
  echo "
<div class='row mb-3 mt-2 p-4'>
  <div class='col-sm-4'>
  <a href='laporanbarang.php' style='text-decoration:none'>
    <div class='card bg-secondary text-white'>
      <div class='card-body'>  
        <div class='row'>
          <div class='col-sm-8'>
            <h6>Laporan</h6>
          <h5 class='card-title'>Stok Barang</h5>
          </div>
          <div class='col-sm-4 text-right'>
          <p class='card-text'><i class='fa fa-th-large fa-3x'></i></p>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <div class='col-sm-4'>
  <a href='laporanbarangmasuk.php' style='text-decoration:none'>
    <div class='card bg-secondary text-white'>
      <div class='card-body'>
        <div class='row'>
          <div class='col-sm-8'>
            <h6>Laporan </h6>
          <h5 class='card-title'>Barang Masuk</h5>
          </div>
          <div class='col-sm-4 text-right'>
          <p class='card-text'><i class='fa fa-book fa-3x'></i></p>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <div class='col-sm-4'>
  <a href='laporanbarangkeluar.php' style='text-decoration:none'>
    <div class='card bg-secondary text-white'>
      <div class='card-body'>
        <div class='row'>
          <div class='col-sm-8'>
            <h6>Laporan</h6>
          <h5 class='card-title'>Barang Keluar</h5>
          </div>
          <div class='col-sm-4 text-right'>
          <p class='card-text'><i class='fa fa-book fa-3x'></i></p>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
</div>
"; }

else if($sesen_jabatan = 'admin gudang'){
echo "
<!--  BAGIAN GUDANG -->
<div class='row mb-3 mt-2 p-2'>
  <div class='col-sm-4'>
  <a href='datasupplier.php' style='text-decoration:none'>
    <div class='card bg-info text-white'>
      <div class='card-body'>  
        <div class='row'>
          <div class='col-sm-8'>
            <h4>{$datasup}</h4>
          <p class='card-title'>Data Supplier</p>
          </div>
          <div class='col-sm-4 text-right'>
          <p class='card-text'><i class='fa fa-user fa-3x'></i></p>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <div class='col-sm-4'>
  <a href='databarangmasuk.php' style='text-decoration:none'>
    <div class='card bg-success text-white'>
      <div class='card-body'>
        <div class='row'>
          <div class='col-sm-8'>
            <h4>{$databm}</h4>
          <p class='card-title'>Data Barang Masuk</p>
          </div>
          <div class='col-sm-4 text-right'>
          <p class='card-text'><i class='fa fa-arrow-circle-o-down fa-3x'></i></p>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <div class='col-sm-4'>
  <a href='databarangkeluar.php' style='text-decoration:none'>
    <div class='card bg-danger text-white'>
      <div class='card-body'>
        <div class='row'>
          <div class='col-sm-8'>
            <h4>{$databk}</h4>
          <p class='card-title'>Data Barang Keluar</p>
          </div>
          <div class='col-sm-4 text-right'>
          <p class='card-text'><i class='fa fa-arrow-circle-up fa-3x'></i></p>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
</div>";
}

?>


<div class="card m-2">
<h6 class="mt-1 pt-2 pl-2"><b>BARANG DENGAN STOK MENIPIS </b></h6>
   <table class="table table-sm table-hover p-2" style="font-size:14px">
  <thead>
    <tr class="bg-secondary text-white">
      <td class="text-center" width="3" class="text-center">No</td>
      <td  width="32">Nama Barang</td>
      <td  width="20">Kategori</td>
      <td  width="20">Supplier</td>
      <td width="15">Harga / Satuan</td>
      <td class="text-center" width="10">Stok Barang</td>
    </tr>
  </thead>
  <tbody>
  <?php
        $no = 1;
        include 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM tb_barang a JOIN tb_supplier b ON a.id_supplier = b.id_supplier JOIN tb_kategori c ON a.id_kategori = c.id_kategori  ORDER BY a.id_barang ASC");
        while ($data = mysqli_fetch_assoc($query)) {
            $id     = $data['id_barang'];
            $nm     = $data['nama_barang'];
            $ns     = $data['nama_supplier'];
            $kat    = $data['nama_kategori'];
            $sat    = $data['satuan'];
            $harga  = $data['harga'];
            $harga1 = number_format($harga, 0, ',', '.');
            $stok   = $data['stok'];
            ?>
            <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $nm ?></td>
            <td><?= $kat ?></td> 
            <td><?= $ns ?></td>
            <td><?= $harga1 ?> (<?= $sat ?>)</td> 
            <td class="text-center"><?= $stok ?></td>           
            </tr>
        <?php } ?>
  </tbody>
</table>
</div>
</div>
</div>

<?php include 'komponen/footer.php'; ?>