<style>
 .hover:hover{
          background-color:rgba(0,139,139, 0.1);
          transitions:0.7s;
          };  
</style>
<div class="bg-light border-right" id="sidebar-wrapper" style=" font-size:14px;">
                <div class="sidebar-heading">
                <center><img src="images/logo.png" alt="" class="text-center mt-4" srcset="" width="70px"> <h5 class="mt-3"><b class="text-secondary">TB. AMANAH</b></h5></center>
                </div>
                <div class="list-group list-group-flush">

<?php 

 //BAG. ADMIN GUDANG
 if($sesen_hak_akses == 'superadmin'){
    echo " <a class='list-group-item list-group-item-action  bg-secondary text-white' href='index.php'>Dashboard</a>
    <a class='list-group-item list-group-item-action ' href='#'><b>Data Utama</b></a>
    <a class='list-group-item list-group-item-action  hover' href='datauser.php'> <i class='fa fa-user'></i>&nbsp; Data User</a>
    <a class='list-group-item list-group-item-action hover' href='datasupplier.php'><i class='fa fa-user'></i>&nbsp; Data Supplier</a>
    <a class='list-group-item list-group-item-action hover' href='datakaryawan.php'><i class='fa fa-users '></i>&nbsp; Data Karyawan</a>
    <a class='list-group-item list-group-item-action hover' href='databarang.php'><i class='fa fa-th-large'></i>&nbsp; Data Barang</a>
    <a class='list-group-item list-group-item-action hover' href='datakategori.php'><i class='fa fa-th-large '></i>&nbsp; Kategori Barang</a>
    ";
} 


//BAG. ADMIN GUDANG
if($sesen_hak_akses == 'admin gudang'){
   echo " <a class='list-group-item list-group-item-action  bg-secondary text-white' href='index.php'>Dashboard</a>
   <a class='list-group-item list-group-item-action ' href='#'><b>Data Utama</b></a>
   <a class='list-group-item list-group-item-action hover' href='databarang.php'><i class='fa fa-th-large'></i>&nbsp; Data Barang</a>
   <a class='list-group-item list-group-item-action hover' href='datakategori.php'><i class='fa fa-th-large '></i>&nbsp; Kategori Barang</a>
   <a class='list-group-item list-group-item-action ' href='#'><b>Transaksi</b></a>
   <a class='list-group-item list-group-item-action hover' href='databarangmasuk.php'><i class='fa fa-arrow-circle-o-down text-success'></i>&nbsp; Barang Masuk</a>
   <a class='list-group-item list-group-item-action hover' href='databarangkeluar.php'><i class='fa fa-arrow-circle-o-up text-danger'></i>&nbsp; Barang Keluar</a>
   <a class='list-group-item list-group-item-action ' href='#'><b>Analisis</b></a>
   <a class='list-group-item list-group-item-action hover' href='datatotal.php'><i class='fa fa-bar-chart  text-info'></i>&nbsp; Data Total Transaksi</a>
   <a class='list-group-item list-group-item-action hover' href='prediksipembelian.php'><i class='fa fa-bar-chart  text-info'></i>&nbsp; Prediksi Pembelian</a>
  
   ";
} 
    

//BAG. PEMILIK
    if($sesen_hak_akses == 'pemilik'){
        echo " <a class='list-group-item list-group-item-action  bg-secondary text-white' href='index.php'>Dashboard</a>
        <a class='list-group-item list-group-item-action ' href='#'><b>Laporan</b></a>
        <a class='list-group-item list-group-item-action hover' href='datasupplier1.php'><i class='fa fa-user'></i>&nbsp; Data Supplier</a>
        <a class='list-group-item list-group-item-action hover' href='datastokbarang.php'><i class='fa fa-th-large'></i>&nbsp; Stok Barang</a>
        <a class='list-group-item list-group-item-action ' href='#'><b>Laporan Transaksi</b></a>
        <a class='list-group-item list-group-item-action hover' href='databarangmasuk.php'><i class='fa fa-arrow-circle-o-down text-success'></i>&nbsp; Barang Masuk</a>
        <a class='list-group-item list-group-item-action hover' href='databarangkeluar.php'><i class='fa fa-arrow-circle-o-up text-danger'></i>&nbsp; Barang Keluar</a>
        <a class='list-group-item list-group-item-action ' href='#'><b>Analisis</b></a>
        <a class='list-group-item list-group-item-action hover' href='datatotal.php'><i class='fa fa-bar-chart  text-info'></i>&nbsp; Data Total Transaksi</a>
        <a class='list-group-item list-group-item-action hover' href='prediksipembelian.php'><i class='fa fa-bar-chart  text-info'></i>&nbsp; Prediksi Pembelian</a>
        ";
    }     
?>
   

    <a class="list-group-item list-group-item-action hover mb-5" href="aksi/logout.php" style=" font-size:14px;"><i class="fa fa-sign-out"></i> &nbsp;<?php $sesen_hak_akses ?>  Log Out </a>
                
                
    <div class="copyright text-left sticky-bottom my-auto p-4 pt-4 text-secondary">
            <span> &copy;2021 TB.Amanah </span>
        </div>
                </div>
            </div>