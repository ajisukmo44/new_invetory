<!DOCTYPE html>

<html lang="en">
    
            <!-- Header--> 
    <?php include 'komponen/header.php'; ?>

    <body>
        <div class="d-flex" id="wrapper" >
          
            <!-- Sidebar-->    
         <?php include 'komponen/sidebar.php'; ?>

         <div id="page-content-wrapper">

            <!-- Navbar -->
         <?php include 'komponen/navbar.php'; ?>


 <!-- Page Content-->
<div class="card m-4">
<div class="card-header">
    <div class="row">
        <div class="col-sm-6 mt-1">
        <h6 class="mt-1"> <a href="index.php" class="text-success"><b>HOME </b></a><b  class="text-secondary"> / DATA BARANG</b></h6>
        </div>
        <div class="col-sm-6 text-right mt-1 ">
        <a href="laporanstokbarang.php"  class="btn btn-success btn-sm pl-2 pr-2"><i class="fa fa-print"></i>&nbsp;  CETAK DATA </a> 
       </div>
    </div>
  </div>
  <div class="card-body p-3">
      
       <div class="table-responsive">
  <table class="table table-sm table-hover table-striped table-bordered" id="dataTable" style="font-size:14px"  width="100%">
  <thead>
    <tr class="bg-secondary text-white">
      <td width="3%" class="text-center p-2">No</td>
      <td width="9%" class="text-center p-2">ID Barang</td>
      <td width="33%" class=" p-2">Nama Barang</td>
      <td width="27%" class=" p-2">Kategori</td>
      <td width="10%" class="text-center p-2">Harga</td>
      <td width="8%" class="text-center p-2">Stok</td>
      <td width="10%" class="text-center p-2">Satuan</td>
    </tr>
  </thead>
  <tbody>
  <?php
        $no = 1;
        include 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM tb_barang a JOIN tb_supplier b ON a.id_supplier = b.id_supplier JOIN tb_kategori c ON a.id_kategori = c.id_kategori ORDER BY a.id_barang ASC");
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
            <td class="text-center"><?= $harga1 ?></td> 
            <td class=" text-center">
                <?php if($stok < 50 ){
                    echo "<span class='text-danger '>". $stok . "</span>";
                } else {
                    echo "<span class='text-success'>". $stok . "</span>";
                }
                ?>
        </td>
        
        <td class="text-center"><?= $sat ?></td>
           
            </tr>
        <?php } ?>
  </tbody>
</table>
</div>
  </div>
</div>


  <!-- Footer -->
  <?php include 'komponen/footer.php'; ?>
    </div>
     </div>
        

<!-- data tabel -->
<script>
        $('#dataTable').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
        "lengthMenu": [[ 25, 50, -1], [25, 50, "All"]]
    } );
 </script>


