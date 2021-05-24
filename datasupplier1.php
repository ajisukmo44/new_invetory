
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
        <h6 class="mt-1"><a href="index.php" class="text-success"><b>HOME </b></a><b class="text-secondary"> / DATA SUPPLIER</b></h6>
        </div>
        <div class="col-sm-6 text-right mt-1 ">
        <a href="laporansupplier.php"  class="btn btn-success btn-sm pl-2 pr-2"><i class="fa fa-print"></i>&nbsp;  CETAK DATA </a> 
        </div>
    </div>
  </div>
  <div class="card p-3">
      
       <div class="table-responsive">
  <table class="table table-sm table-hover table-striped table-bordered p-2" id="dataTable" style="font-size:14px"  width="100%">
  <thead>
    <tr class="bg-secondary text-white">
      <td width="4%" class="text-center p-2">No</td>
      <td width="15%" class="p-2">ID Supplier</td>
      <td width="30%" class="p-2">Nama Supplier</td>
      <td width="16%" class="p-2">No Telepon</td>
      <td width="35%" class="p-2">Alamat Supplier</td>
    </tr>
  </thead>
  <tbody>
  <?php
        $no = 1;
        include 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM tb_supplier ORDER BY id_supplier ASC");
        while ($data = mysqli_fetch_assoc($query)) {
            $id   = $data['id_supplier'];
            $nm   = $data['nama_supplier'];
            $hp   = $data['no_telepon'];
            $alt  = $data['alamat'];
            ?>
            <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $id ?></td>
            <td><?= $nm ?></td>
            <td><?= $hp ?></td> 
            <td><?= $alt ?></td>
           
            </tr>
        <?php } ?>
  </tbody>
</table>
</div>
<!-- Footer -->
<?php include 'komponen/footer.php'; ?>

</div>
</div>