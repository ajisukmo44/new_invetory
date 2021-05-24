<!DOCTYPE html>
<html lang="en">    

<!-- Header--> 
<?php 
include 'komponen/header.php'; 

?>

<style>
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active
{
   display:none; 
   font-size:11px;
}
.page-link{
    font-size:10px;
}
.dataTables_length{
    font-size:11px;
}
.dataTables_filter .custom-select{
   font-size:11px;
}
.page-item.active .page-link {
    z-index: 3;
    color: #076565;
    background-color: #fff;
    border-color: #eeeeee;
}
</style>

    <body>
        <div class="d-flex" id="wrapper" >          
            <!-- Sidebar-->    
         <?php include 'komponen/sidebar.php'; ?>

         <div id="page-content-wrapper">

            <!-- Navbar -->
         <?php include 'komponen/navbar.php'; ?>

        <!-- Page Content-->
        <div class="card m-4 bg-white">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6 mt-1">
                <h6 class="mt-1"> 
                <a href="index.php" class="text-success"><b>HOME  </b></a>
                <b class="text-secondary"> / DATA TOTAL TRANSAKSI  </b>
                </h6>
                </div>
                <div class="col-sm-2 text-right mt-1 ">
                
            </div>
            </div>
        </div>

        <div class="p-2 m-2">
            
<h6 class="mt-3"><b>DATA TOTAL BARANG MASUK </b></h6>

<div class="table-responsive">
 <table class="table table-sm table-hover table-striped table-bordered"  style="font-size:14px"  width="100%">
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

            $sql11      = "SELECT SUM(jumlah) AS stokterbeli, SUM(total_harga) AS thargabeli  FROM tb_barang_masuk WHERE id_barang = '$idb' ";               
            $result11   = mysqli_query($conn, $sql11);
            $data11     = mysqli_fetch_array($result11);
            $jumlahstokterbeli  = $data11['stokterbeli'];
            $totalhargabeli = $data11['thargabeli'];
               
            $sql5      = "SELECT * FROM tb_barang_masuk WHERE id_barang = '$idb'  ";
            $result5   = mysqli_query($conn, $sql5);
            $totaltransaksi    = mysqli_num_rows($result5);

            if ($totalhargabeli == 0) {
            $hargarataratabeli  = 0;
            $jumlahstokterbeli  = 0;
            $totalhargabeli1  = 0;
            } else {
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

<hr>
<div class=" p-2 m-2">
<h6><b>DATA TOTAL BARANG KELUAR</b> </h6>
       <div class="table-responsive">
 <table class="table table-sm table-hover table-striped table-bordered"  style="font-size:14px"  width="100%">
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
            $idb     = $data['id_barang'];
            $nm     = $data['nama_barang'];
            $ns     = $data['nama_supplier'];
            $kat    = $data['nama_kategori'];
            $sat    = $data['satuan'];
            $harga  = $data['harga'];
            $harga1 = number_format($harga, 0, ',', '.');
            $stok   = $data['stok'];

            $sql2      = "SELECT SUM(jumlah) AS stokterjual, SUM(total_harga) AS thargajual FROM tb_barang_keluar WHERE id_barang = '$idb' ";               
            $result2   = mysqli_query($conn, $sql2);
            $data2     = mysqli_fetch_array($result2);
            
            $jumlahstokterjual  = $data2['stokterjual'];
            $totalhargajual = $data2['thargajual'];
            
            
            $sql4      = "SELECT * FROM tb_barang_keluar WHERE id_barang = '$idb'  ";
            $result4   = mysqli_query($conn, $sql4);
            $totaltransaksi1    = mysqli_num_rows($result4);
            
            
            

            if ($totalhargajual == 0) {
            $hargarataratajual  = 0;
            $jumlahstokterjual  = 0;
            $totalhargajual1  = 0;
            } else {
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
        </div>
        </div>
        </div>
              
            <!-- Footer -->
            <?php include 'komponen/footer.php'; ?>
            </div>
            </div>
     

        <!-- DATATABLES -->
        <script>
                $('#dataTable').DataTable( {
                "paging":   false,
                "ordering": false,
                "info":     false,
                "lengthMenu": [[ 25, 50, -1], [25, 50, "All"]]
            } );
        </script>

 