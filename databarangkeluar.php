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
        <h6 class="mt-1"><b>  DATA BARANG KELUAR </b></h6>
        </div>
        <div class="col-sm-6 text-right mt-1 ">
        <a href="tambahbarangkeluar.php"  class="btn btn-secondary btn-sm pl-2 pr-2" > TAMBAH DATA </a> 
        </div>
    </div>
  </div>
  
  <div class="table-responsive p-2">
   <table class="table table-sm table-hover  table-striped" id="dataTable" style="font-size:14px">
  <thead >
    <tr class=" bg-danger text-light">
      <td width="5%" class="text-center">No</td>
      <td width="15%">Nota Transaksi</td>
      <td width="15%">Tanggal Transaksi</td>
      <td width="21%">Nama Barang</td>
      <td width="8%" class="text-center">Harga Jual</td>
      <td width="6%" class="text-center">Jumlah</td>
      <td width="12%" class="text-left">Satuan</td>
      <td width="8%" class="text-right">Total Harga</td>
      <td width="10%" class="text-right ">Tindakan&nbsp;</td>
    </tr>
  </thead>
  <tbody>
  <?php
        $no = 1;
        include 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM tb_barang_keluar a JOIN tb_barang b ON a.id_barang = b.id_barang ORDER BY a.id_barang_keluar ASC");
        while ($data = mysqli_fetch_assoc($query)) {
            $id         = $data['id_barang_keluar'];
            $nm         = $data['nama_barang'];
            $tgl        = tgl_indo($data['tanggal']);
            $harga      = $data['harga_jual'];
            $harga1     = number_format($harga, 0, ',', '.');
            $total      = $data['total_harga'];
            $total1     = number_format($total, 0, ',', '.');
            $jumlah     = $data['jumlah'];
            $sat        = $data['satuan'];
            ?>
            <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $id ?></td>
            <td><?= $tgl ?></td> 
            <td><?= $nm ?></td>
            <td class="text-center"><?= $harga1 ?></td>
            <td class="text-center"><?= $jumlah ?></td> 
            <td class="text-left"><?= $sat ?></td> 
            <td class="text-right"><?= $total1 ?></td>
            <td  class="text-right pr-1">
            <a href="#" data-toggle="modal" data-target="#editModal" data-id="<?= $id; ?>" class="btn btn-secondary btn-sm "><i class="fa fa-edit"></i></a><a href="aksi/deletebarangkeluar.php?id=<?= $id; ?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')" class="btn btn-danger btn-sm ml-1"><i class=" fa fa-times"></i></a>
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

<script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value);
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ?  + rupiah : '');
		}
	</script>

     
        <!-- modal edit -->
        <script type="text/javascript">
          $(document).ready(function() {
              $('#editModal').on('show.bs.modal', function(e) {
                  var rowid = $(e.relatedTarget).data('id');
                  $.ajax({
                      type: 'post',
                      url: 'modal/editbarangkeluar.php',
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