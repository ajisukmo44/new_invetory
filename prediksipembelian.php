<!DOCTYPE html>
<html lang="en">    

<!-- Header--> 
<?php 
include 'komponen/header.php'; 


// CEK DATA DI URL
$link  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
"https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
$_SERVER['REQUEST_URI']; 

if($link !== 'https://kirana.ajisukmo.com/prediksipembelian.php') {
    $bln = $_GET['bln'];  $thn = $_GET['thn']; 
    

//  MENENTUKAN 2 BULAN SEBELUMNYA    
$tgldef = $thn.'-'.$bln.'-01';
$tglawal = date('Y-m-d', strtotime('-60 days', strtotime($tgldef)));  

} else {

$bln = date('m');

$tgldef = date('Y-m-d');
$tglawal = date('Y-m-d', strtotime('-90 days', strtotime($tgldef))); 
}
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
                <b class="text-secondary"> / PREDIKSI PEMBELIAN  </b>
                </h6>
                </div>
                <div class="col-sm-2 text-right mt-1 ">
                <form action="">  <select name="bln" id="bln" class="form-control">
                <option value="<?= $bln ?>" > 
                <?php 
                if($bln == 1){
                    echo "Januari";
                } 
                else if($bln == 2){
                    echo "Februari";
                }
                else if($bln == 3){
                    echo "Maret";
                }
                else if($bln == 4){
                    echo "April";
                }
                else if($bln == 5){
                    echo "Mei";
                }
                else if($bln == 6){
                    echo "Juni";
                }
                else if($bln == 7){
                    echo "Juli";
                }
                else if($bln == 8){
                    echo "Agustus";
                }   
                else if($bln == 9){
                    echo "September";
                }
                else if($bln == 10){
                    echo "Oktober";
                }
                else if($bln == 11){
                    echo "November";
                }
                else if($bln == 12){
                    echo "Desember";
                }
                ?>
                </option>
                <option value="01"> Januari </option>
                <option value="02"> Februari </option>
                <option value="03"> Maret </option>
                <option value="04"> April </option>
                <option value="05"> Mei </option>
                <option value="06"> Juni </option>
                <option value="07"> Juli </option>
                <option value="08"> Agustus </option>
                <option value="09"> September </option>
                <option value="10"> Oktober </option>
                <option value="11"> November </option>
                <option value="12"> Desember </option>
                </select> 
                </div>
                <div class="col-sm-2 text-right mt-1">
                <select name="thn" id="thn" class="form-control">
                <option value="2021"> 2021 </option>
                <option value="2022"> 2022 </option>
                <option value="2023"> 2023 </option>
                <option value="2024"> 2024 </option>
                <option value="2025"> 2025 </option>
                <option value="2026"> 2026 </option>
                <option value="2027"> 2027 </option>
                </select>  
                </div>
                <div class="col-sm-2 text-right mt-1 ">
                <button type="submit" class="btn btn-info btn-block   pl-2 pr-2"> PREDIKSI </button>  
            </form>  
            </div>
            </div>
        </div>

        <div class="card p-1">
        <div class="card-body">
            
       <div class="table-responsive">
        <table class="table table-sm table-hover table-striped table-bordered" id="dataTable" style="font-size:14px"  width="100%">
        <thead>
            <tr class="bg-info text-white">
            <td width="3%" class="text-center p-2">No</td>
            <td width="7%" class="text-center p-2">ID Barang</td>
            <td width="35%" class="p-2">Nama Barang</td>
            <td width="15%" class="text-center p-2">Harga Rata-Rata</td>
            <td width="10%" class="text-center p-2">Jumlah</td>
            <td width="10%" class="text-center p-2">Satuan</td>
            <td width="20%" class="text-right pr-2">Total Harga</td>
            </tr>
        </thead>
        <tbody>
        <?php
                $no = 1;
                include 'koneksi.php';
                $query = mysqli_query($conn, "SELECT * FROM tb_barang a JOIN tb_supplier b ON a.id_supplier = b.id_supplier JOIN tb_kategori c ON a.id_kategori = c.id_kategori ORDER BY a.id_barang ASC");
                while ($data = mysqli_fetch_assoc($query)) {
                    $idb     = $data['id_barang'];
                    $nm      = $data['nama_barang'];
                    $ns      = $data['nama_supplier'];
                    $kat     = $data['nama_kategori'];
                    $sat     = $data['satuan'];
                    $harga   = $data['harga'];
                    $harga1  = number_format($harga, 0, ',', '.');
                    $stok    = $data['stok'];

                    $sql11      = "SELECT SUM(jumlah) AS stokterbeli, SUM(total_harga) AS thargabeli FROM tb_barang_masuk WHERE  id_barang = '$idb' AND tanggal BETWEEN '$tglawal' AND '$tgldef' ";               
                    $result11   = mysqli_query($conn, $sql11);
                    $data11     = mysqli_fetch_array($result11);
                    
                    // HITUNG PREDIKSI PEMBELIAN
                    $jumlahstokterbeli2  = $data11['stokterbeli'];
                    $jumlahstokterbeli   = $jumlahstokterbeli2 / 2;
                    
                    $totalhargabeli2   = $data11['thargabeli'];
                    $totalhargabeli    = $totalhargabeli2 / 2;

                    if ($totalhargabeli == 0) {
                    $hargarataratabeli  = 0;
                    $jumlahstokterbeli  = 0;
                    $totalhargabeli1    = 0;
                    } 
                    else {
                    $rataratabeli       = $totalhargabeli / $jumlahstokterbeli;
                    $totalhargabeli1    = number_format($totalhargabeli, 0, ',', '.');
                    $hargarataratabeli  = number_format($rataratabeli, 0, ',', '.');
                    }
                    
                    ?>
                    <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $idb ?></td>
                    <td><?= $nm ?></td>
                    <td class="text-center"><?= $hargarataratabeli ?></td> 
                    <td class=" text-center"><?= $jumlahstokterbeli ?></td>
                    <td class="text-center"><?= $sat ?></td>
                    <td class="text-right pr-2"><?= $totalhargabeli1 ?></td>
                    </tr>
                <?php } ?>
        </tbody>
        </table>
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

    <!-- SET TANGGAL DEFAULT -->
  