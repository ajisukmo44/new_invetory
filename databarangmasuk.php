<!DOCTYPE html>

<html lang="en">
    
            <!-- Header--> 
    <?php include 'komponen/header.php'; ?>


    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
        <h6 class="mt-1"> <a href="index.php" class="text-secondary h6"><b>HOME </b></a><b> / DATA BARANG MASUK</b></h6>
        </div>
        <div class="col-sm-6 text-right mt-1 ">
        <a href="tambahbarangmasuk.php"  class="btn btn-secondary text-white btn-sm pl-2 pr-2"> TAMBAH DATA </a> 
        </div>
    </div>
  </div>
  
  <div class="table-responsive p-3">
   <table class="table table-sm table-hover  table-striped mt-2" id="dataTable" style="font-size:14px">
  <thead >
    <tr class="bg-success text-light">
      <td width="5%" class="text-center">No</td>
      <td width="15%">Nota Transaksi</td>
      <td width="15%">Tanggal Masuk</td>
      <td width="25%">Nama Barang</td>
      <td width="10%" class="text-center">Harga Beli</td>
      <td width="10%" class="text-center">Jumlah</td>
      <td width="10%" class="text-right">Total Harga</td>
      <td width="10%" class="text-right ">Tindakan&nbsp;</td>
    </tr>
  </thead>
  <tbody>
  <?php
        $no = 1;
        include 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM tb_barang_masuk a JOIN tb_barang b ON a.id_barang = b.id_barang ORDER BY a.id_barang_masuk ASC");
        while ($data = mysqli_fetch_assoc($query)) {
            $id         = $data['id_barang_masuk'];
            $nm         = $data['nama_barang'];
            $tgl         = tgl_indo($data['tanggal']);
            $nn        =  $data['no_nota'];
            $harga      = $data['harga_beli'];
            $harga1     = number_format($harga, 0, ',', '.');
            $total      = $data['total_harga'];
            $total1     = number_format($total, 0, ',', '.');
            $jumlah     = $data['jumlah'];
            ?>
            <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $nn ?></td>
            <td><?= $tgl ?></td> 
            <td><?= $nm ?></td>
            <td class="text-center"><?= $harga1 ?></td>
            <td class="text-center"><?= $jumlah ?></td> 
            <td class="text-right"><?= $total1 ?></td>
            <td  class="text-right mr-1">
            <a href="#" data-toggle="modal" data-target="#editModal" data-id="<?= $id; ?>" class="btn btn-secondary btn-sm "><i class="fa fa-edit"></i></a><a href="aksi/deletebarangmasuk.php?id=<?= $id; ?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')" class="btn btn-danger btn-sm ml-1"><i class=" fa fa-times"></i></a>
            </td>
            </tr>
        <?php } ?>
  </tbody>
</table>
</div>
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

<script>
        $('#dataTable').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
        "lengthMenu": [[ 25, 50, -1], [25, 50, "All"]]
    } );
 </script>
