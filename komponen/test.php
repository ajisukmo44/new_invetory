<style>
 .hover:hover{
          background-color:rgba(0,139,139, 0.2);
          transitions:0.7s;
          };  
</style>
<div class="bg-light border-right col-sm-2 p-0" style="height:400%"  id="sidebar-wrapper" >
<div class="container"><center><img src="images/logo.png" alt="" class="text-center mt-4" srcset="" width="70px"></center></div><br>
<center><b>TB.AMANAH</b> </center>
<div class="list-group list-group-flush">
    <hr>
    <?php 
    //BAG. ADMIN GUDANG
    if($sesen_jabatan == 'admin gudang'){
        echo " <a class='list-group-item list-group-item-action  bg-secondary text-white' href='index.php'>Dashboard</a>
        <a class='list-group-item list-group-item-action ' href='#'><b>Data Utama</b></a>
        <a class='list-group-item list-group-item-action  hover' href='datauser.php'> <i class='fa fa-users'></i>&nbsp; Data User</a>
        <a class='list-group-item list-group-item-action hover' href='datasupplier.php'><i class='fa fa-user'></i>&nbsp; Data Supplier</a>
        <a class='list-group-item list-group-item-action hover' href='databarang.php'><i class='fa fa-th-large'></i>&nbsp; Data Barang</a>
        <a class='list-group-item list-group-item-action hover' href='datakategori.php'><i class='fa fa-th-large '></i>&nbsp; Kategori Barang</a>
        <a class='list-group-item list-group-item-action ' href='#'><b>Transaksi</b></a>
        <a class='list-group-item list-group-item-action hover' href='databarangmasuk.php'><i class='fa fa-arrow-circle-o-down text-success'></i>&nbsp; Barang Masuk</a>
        <a class='list-group-item list-group-item-action hover' href='databarangkeluar.php'><i class='fa fa-arrow-circle-o-up text-danger'></i>&nbsp; Barang Keluar</a>
        ";
    } 
    
    
    //BAG. PEMILIK
    else if ($sesen_jabatan == 'pemilik'){
        echo " <a class='list-group-item list-group-item-action  bg-secondary text-white' href='index.php'>Dashboard</a>
        <a class='list-group-item list-group-item-action ' href='#'><b>Data Laporan</b></a>
        <a class='list-group-item list-group-item-action  hover' href='datauser.php'> <i class='fa fa-book'></i>&nbsp; Laporan Barang</a>
        <a class='list-group-item list-group-item-action hover' href='datasupplier.php'><i class='fa fa-book'></i>&nbsp; Barang Masuk</a>
        <a class='list-group-item list-group-item-action hover' href='databarang.php'><i class='fa fa-book'></i>&nbsp; Barang Keluar</a>
        ";
    } 
    ?>
   
    <a class="list-group-item list-group-item-action hover" href="aksi/logout.php"><i class="fa fa-sign-out"></i> &nbsp;<?php $sesen_jabatan ?>  Log Out </a>
</div>
</div>
