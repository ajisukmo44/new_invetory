<!DOCTYPE html>

<html lang="en">
    
            <!-- Header--> 
    <?php 
    include 'komponen/header.php'; 

    // AMBIL TANGGAL AWAL - AKHIR TRANSAKSI
    include 'koneksi.php';
    $query4 = mysqli_query($conn, "SELECT tanggal FROM tb_barang_masuk ORDER BY tanggal ASC LIMIT 1");
    $data4  = mysqli_fetch_array($query4);
    $taw1   = $data4['tanggal'];

    $query5 = mysqli_query($conn, "SELECT tanggal FROM tb_barang_masuk ORDER BY tanggal DESC LIMIT 1");
    $data5  = mysqli_fetch_array($query5);
    $tak1   = $data5['tanggal'];


    // CEK TANGGAL DI URL
    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
    "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
    $_SERVER['REQUEST_URI']; 


    if($link !== 'https://kirana.ajisukmo.com/databarangmasuk.php') {
      $taw = $_GET['taw'];  $tak = $_GET['tak'];  
    } else {
        $taw = $taw1;  $tak = $tak1; 
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
        <div class="col-sm-5 mt-1">
        <h6 class="mt-1"> <a href="index.php" class="text-success"><b>HOME  </b></a><b class="text-secondary"> / DATA BARANG MASUK</b></h6>
        </div>
        <div class="col-sm-7 text-right mt-1 ">
        <form action=""> <input type="date" class="mr-1 text-secondary" name="taw" value="<?= $taw ?>"> <input type="date" class="mr-2 text-secondary" name="tak" value="<?= $tak ?>">   <button type="submit" class="btn btn-outline-secondary  btn-sm pl-2 pr-2"> FILTER </button>  <a href="cetakbarangmasuk.php?taw=<?= $taw ?>&tak=<?= $tak ?>"  class="btn btn-outline-secondary  btn-sm pl-2 pr-2"><i class="fa fa-print"></i> CETAK </a> 

      <?php 
      if($sesen_hak_akses == 'admin gudang'){
          echo "
          <a href='tambahbarangmasuk.php'  class='btn btn-secondary text-white btn-sm pl-2 pr-2'> TAMBAH DATA </a>  ";
      } ?>
     </form>  
        </div>
    </div>
  </div>
  <div class="card p-3">
  <div class="table-responsive p-2">
   <table class="table table-sm table-hover table-bordered table-striped mt-2" id="dataTable" style="font-size:14px" width="100%">
  <thead >
    <tr class="bg-success text-light">
      <td width="3%" class="text-center p-2">No</td>
      <td width="12%" class="p-2">ID Transaksi </td>
      <td width="8%" class="p-2">Tanggal</td>
      <td width="10%" class="p-2">No Nota</td>
      <td width="28%" class="p-2">Nama Barang</td>
      <td width="10%" class="text-center p-2">Harga Beli</td>
      <td width="10%" class="text-center p-2">Jumlah</td>
      <td class="text-right p-2">Total Harga</td>
      
      <?php 
      if($sesen_hak_akses == 'admin gudang'){
          echo "<td width='7%' class='text-right p-2'>Tindakan&nbsp;&nbsp;</td> ";
      } ?>
    </tr>
  </thead>
  <tbody>
  <?php
        $no = 1;
        include 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM tb_barang_masuk a JOIN tb_barang b ON a.id_barang = b.id_barang WHERE tanggal BETWEEN '$taw' AND '$tak' ORDER BY a.id_barang_masuk ASC");
        while ($data = mysqli_fetch_assoc($query)) {
            $id         = $data['id_barang_masuk'];
            $nm         = $data['nama_barang'];
            $tgl         = date('d/m/Y',strtotime($data['tanggal']));
            $nn        =  $data['no_nota'];
            $harga      = $data['harga_beli'];
            $harga1     = number_format($harga, 0, ',', '.');
            $total      = $data['total_harga'];
            $total1     = number_format($total, 0, ',', '.');
            $jumlah     = $data['jumlah'];
            $satuan     = $data['satuan'];
            ?>
            <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $id ?></td>
            
            <td><?= $tgl ?></td> 
            <td><?= $nn ?></td>
            <td><?= $nm ?></td>
            <td class="text-center"><?= $harga1 ?></td>
            <td class="text-center"><?= $jumlah ?> <?= $satuan ?></td> 
            <td class="text-right"><?= $total1 ?></td>
           
            <?php 
            $tampil = "<td  class='text-right mr-1'>
            <a href='#' data-toggle='modal' data-target='#editModal' data-id='{$id}' class='btn btn-secondary btn-sm '><i class='fa fa-edit'></i></a><a href='aksi/deletebarangmasuk.php?id={$id}' onclick='delete' class='btn btn-danger btn-sm ml-1 mr-1'><i class=' fa fa-times'></i></a>
            </td>";

      if($sesen_hak_akses == 'admin gudang'){
          echo $tampil;
      } ?>

            </tr>
        <?php } ?>
  </tbody>
</table>
</div>
</div>


</div>

        <!-- modal edit -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="fetched-data"></div>
                </div>
            </div>
            
            
            <!-- Footer -->
            <?php include 'komponen/footer.php'; ?>


            </div>
        </div>
     
        <!-- modal edit -->
        <script type="text/javascript">
          $(document).ready(function() {
              $('#editModal').on('show.bs.modal', function(e) {
                  var rowid = $(e.relatedTarget).data('id');
                  $.ajax({
                      type: 'post',
                      url: 'modal/editbarangmasuk.php',
                      data: 'rowid=' + rowid,
                      success: function(data) {
                          $('.fetched-data').html(data);
                      }
                  });
              });
          });
        </script>

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
<script>
      var date = new Date(); // Now
      date.setDate(date.getDate() - 30);
      document.getElementById('tanggalawal').valueAsDate = date;
</script>

<script>
      document.getElementById('tanggal').valueAsDate = new Date();
</script> 