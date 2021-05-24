
<!-- RECORD DATA -->

<?php
$sql      = "SELECT * FROM tb_supplier ";
$result   = mysqli_query($conn, $sql);
$datasup  = mysqli_num_rows($result);

$sql1      = "SELECT * FROM tb_barang_masuk ";
$result1   = mysqli_query($conn, $sql1);
$databm    = mysqli_num_rows($result1);

$sql2      = "SELECT * FROM tb_barang_keluar ";
$result2   = mysqli_query($conn, $sql2);
$databk    = mysqli_num_rows($result2);

$sql3      = "SELECT * FROM tb_barang ";
$result3   = mysqli_query($conn, $sql3);
$databar  = mysqli_num_rows($result3);
?>  
  
  <div class='row mb-1 mt-2 p-4'>
    <div class='col-sm-4'>
    <a href='datasupplier.php' style='text-decoration:none'>
      <div class='card bg-info text-white mb-1'>
        <div class='card-body'>  
          <div class='row'>
            <div class='col-sm-8'>
              <h4><b><?= $datasup ?></b></h4>
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
      <div class='card bg-success text-white mb-1'>
        <div class='card-body'>
          <div class='row'>
            <div class='col-sm-8'>
              <h4><b><?= $databm ?></b></h4>
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
      <div class='card bg-danger text-white mb-1'>
        <div class='card-body'>
          <div class='row'>
            <div class='col-sm-8'>
              <h4><b><?= $databk ?></b></h4>
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
  </div>


<!-- KONTEN BAG>GUDANG -->
<div class="card ml-4 mr-4 bg-light p-4">
<h6> DATA BARANG DENGAN STOK KURANG DARI<B> 50</B> </h6>
<div class="table-responsive">
<table class="table table-sm table-hover table-striped table-bordered" id="dataTable" style="font-size:14px"  width="100%">
  <thead>
    <tr class="bg-secondary text-white">
      <td width="3%" class="text-center p-2">No</td>
      <td width="7%" class="text-center p-2">ID Barang</td>
      <td width="23%" class=" p-2">Nama Barang</td>
      <td width="15%" class=" p-2">Kategori</td>
      <td width="15%" class=" p-2">Supplier</td>
      <td width="8%" class="text-center p-2">Harga</td>
      <td width="15%" class="text-center p-2">Stok Barang</td>
    </tr>
  </thead>
  <tbody>
  <?php
        $no = 1;
        include 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM tb_barang a JOIN tb_supplier b ON a.id_supplier = b.id_supplier JOIN tb_kategori c ON a.id_kategori = c.id_kategori WHERE a.stok < 50 ORDER BY a.id_barang ASC");
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
            <td class="text-center"><?= $id ?></td>
            <td><?= $nm ?></td>
            <td><?= $kat ?></td> 
            <td><?= $ns ?></td>
            <td class="text-center"><?= $harga1 ?></td> 
            <td class=" text-center">
            <?php if($stok < 50 ){
                echo "<span class='text-danger '>". $stok . " " .$sat."</span>";
            } else {
                echo "<span class='text-success'>". $stok ." " .$sat."</span>";
            }
            ?>
             </td>
            </tr>
        <?php } ?>
  </tbody>
</table>
</div>
</div>