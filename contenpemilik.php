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
  <div class='col-sm-3'>
  <a href='datasupplier1.php' style='text-decoration:none'>
    <div class='card bg-secondary text-white mb-1'>
      <div class='card-body'>
        <div class='row'>
          <div class='col-sm-8'>
            <h6><?= $datasup ?> Laporan </h6>
          <h5 class='card-title'> Data Supplier</h5>
          </div>
          <div class='col-sm-4 text-right'>
          <p class='card-text'><i class='fa fa-user fa-3x'></i></p>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <div class='col-sm-3'>
  <a href='datastokbarang.php' style='text-decoration:none'>
    <div class='card bg-secondary text-white mb-1'>
      <div class='card-body'>  
        <div class='row'>
          <div class='col-sm-8'>
            <h6><?= $databar ?> Laporan</h6>
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
  <div class='col-sm-3'>
  <a href='databarangmasuk.php' style='text-decoration:none'>
    <div class='card bg-secondary text-white mb-1'>
      <div class='card-body'>  
        <div class='row'>
          <div class='col-sm-8'>
            <h6><?= $databm ?> Laporan</h6>
          <h5 class='card-title'>Barang Masuk</h5>
          </div>
          <div class='col-sm-4 text-right'>
          <p class='card-text'><i class='fa fa-arrow-circle-down fa-3x'></i></p>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <div class='col-sm-3'>
  <a href='laporanbarangkeluar.php' style='text-decoration:none'>
    <div class='card bg-secondary text-white mb-1'>
      <div class='card-body'>
        <div class='row'>
          <div class='col-sm-8'>
            <h6><?= $databk ?> Laporan</h6>
          <h5 class='card-title'>Barang Keluar</h5>
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



<!-- KONTEN PEMILIK -->
<div class="card ml-4 mr-4 bg-light p-4">
<h6>DATA TOTAL BARANG MASUK </h6>
<div class="table-responsive">
 <table class="table table-sm table-hover table-striped table-bordered" id="dataTable" style="font-size:14px"  width="100%">
  <thead>
    <tr class="bg-success text-white">
     <td width="4%" class="text-center p-2">No</td>
      <td width="8%" class="text-center p-2">ID Barang</td>
      <td width="35%" class="p-2">Nama Barang</td>
      <td width="10%" class="text-center p-2">Total Transaksi</td>
      <td width="16%" class="text-center p-2">Harga Beli Rata-Rata</td>
      <td width="10%" class="text-center p-2">Total Barang</td>
      <td width="8%" class="text-center p-2">Satuan</td>
      <td width="9%" class="text-right p-2 pr-2">Total Harga</td>
    </tr>
  </thead>
  <tbody>
   <?php
        $no = 1;
        include 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM tb_barang a JOIN tb_supplier b ON a.id_supplier = b.id_supplier JOIN tb_kategori c ON a.id_kategori = c.id_kategori ORDER BY a.id_barang ASC");
        while ($data = mysqli_fetch_assoc($query)) {
            $idb     = $data['id_barang'];
            $nm     = $data['nama_barang'];
            $ns     = $data['nama_supplier'];
            $kat    = $data['nama_kategori'];
            $sat    = $data['satuan'];
            $harga  = $data['harga'];
            $harga1 = number_format($harga, 0, ',', '.');
            $stok   = $data['stok'];

            // TOTAL HARGA BELI
            $sql11      = "SELECT SUM(jumlah) AS stokterbeli, SUM(total_harga) AS thargabeli  FROM tb_barang_masuk WHERE id_barang = '$idb' ";               
            $result11   = mysqli_query($conn, $sql11);
            $data11     = mysqli_fetch_array($result11);
            $jumlahstokterbeli  = $data11['stokterbeli'];
            $totalhargabeli = $data11['thargabeli'];
            
            // TOTAL JUMLAH TRANSAKSI
            $sql5      = "SELECT * FROM tb_barang_masuk WHERE id_barang = '$idb'  ";
            $result5   = mysqli_query($conn, $sql5);
            $totaltransaksi   = mysqli_num_rows($result5);

            if ($totalhargabeli == 0) {
            $hargarataratabeli  = 0;
            $jumlahstokterbeli  = 0;
            $totalhargabeli1    = 0;
            } 
            else {
    
             // HITUNG HARGA RATA-RATA
            $rataratabeli       = $totalhargabeli / $jumlahstokterbeli;

            $totalhargabeli1  = number_format($totalhargabeli, 0, ',', '.');
            $hargarataratabeli  = number_format($rataratabeli, 0, ',', '.');
            }            
            ?>
            
            <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td class="text-center"><?= $idb ?></td>
            <td><?= $nm ?></td>
            <td class="text-center"><?= $totaltransaksi ?></td> 
            <td class="text-center"><?= $hargarataratabeli ?></td> 
            <td class="text-center"><?= $jumlahstokterbeli ?> </td> 
            <td class="text-center"> <?= $sat ?></td> 
            <td class="text-right p-2"><?= $totalhargabeli1 ?></td> 
            </tr>
        <?php } ?>
  </tbody>
</table>
</div>
</div>

<div class="card ml-4 mr-4 bg-light p-4 mt-3">
<h6>DATA TOTAL BARANG KELUAR </h6>
<div class="table-responsive">
 <table class="table table-sm table-hover table-striped table-bordered" id="dataTable" style="font-size:14px"  width="100%">
  <thead>
    <tr class="bg-danger text-white">
      <td width="4%" class="text-center p-2">No</td>
      <td width="8%" class="text-center p-2">ID Barang</td>
      <td width="35%" class="p-2">Nama Barang</td>
      <td width="10%" class="text-center p-2">Total Transaksi</td>
      <td width="16%" class="text-center p-2">Harga Jual Rata-Rata</td>
      <td width="10%" class="text-center p-2">Total Barang</td>
      <td width="8%" class="text-center p-2">Satuan</td>
      <td width="9%" class="text-right p-2 pr-2">Total Harga </td>
    </tr>
  </thead>
  <tbody>
 <?php
        $no = 1;
        include 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM tb_barang a JOIN tb_supplier b ON a.id_supplier = b.id_supplier JOIN tb_kategori c ON a.id_kategori = c.id_kategori ORDER BY a.id_barang ASC");
        while ($data = mysqli_fetch_assoc($query)) {
            $idb    = $data['id_barang'];
            $nm     = $data['nama_barang'];
            $ns     = $data['nama_supplier'];
            $kat    = $data['nama_kategori'];
            $sat    = $data['satuan'];
            $harga  = $data['harga'];
            $harga1 = number_format($harga, 0, ',', '.');
            $stok   = $data['stok'];

            // TOTAL HARGA JUAL
            $sql2      = "SELECT SUM(jumlah) AS stokterjual, SUM(total_harga) AS thargajual FROM tb_barang_keluar WHERE id_barang = '$idb' ";               
            $result2   = mysqli_query($conn, $sql2);
            $data2     = mysqli_fetch_array($result2);
            
            $jumlahstokterjual  = $data2['stokterjual'];
            $totalhargajual = $data2['thargajual'];
            
            // TOTAL JUMLAH TRANSAKSI
            $sql4      = "SELECT * FROM tb_barang_keluar WHERE id_barang = '$idb'  ";
            $result4   = mysqli_query($conn, $sql4);
            $totaltransaksi1    = mysqli_num_rows($result4);
            
            if ($totalhargajual == 0) {
            $hargarataratajual  = 0;
            $jumlahstokterjual  = 0;
            $totalhargajual1  = 0;
            } else {
      
              // HITUNG HARGA RATA-RATA
            $rataratajual       = $totalhargajual / $jumlahstokterjual;
            $totalhargajual1  = number_format($totalhargajual, 0, ',', '.');
            $hargarataratajual  = number_format($rataratajual, 0, ',', '.');
            }
            
            ?>
            <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td class="text-center"><?= $idb ?></td>
            <td><?= $nm ?></td>
            <td class="text-center"><?= $totaltransaksi1 ?></td> 
            <td class="text-center"><?= $hargarataratajual ?></td> 
            <td class="text-center"><?= $jumlahstokterjual ?> </td> 
            <td class="text-center"> <?= $sat ?></td> 
            <td class="text-right p-2"><?= $totalhargajual1 ?></td> 
            </tr>
        <?php } ?>
  </tbody>
</table>
</div>
</div>