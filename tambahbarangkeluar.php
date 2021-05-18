<?php 
$ttll  = date('Ymd');
$jm    = date('Hi');
$kode1 = rand(0, 9);
$kode2 = chr(rand(65,90));

$id = 'BK'.$ttll.$jm.$kode1.$kode2;
?>
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
        <h6 class="mt-1"><b>TAMBAH DATA BARANG KELUAR</b></h6>
        </div>
        <div class="col-sm-6 text-right mt-1 ">
        <a href="databarangkeluar.php"  class="btn btn-secondary btn-sm pl-2 pr-2" ><i class="fa fa-arrow-left"></i> KEMBALI </a> 
        </div>
    </div>
  </div>
  <div class="modal-body">
                            <form action="aksi/tambahbarangkeluar.php" method="POST">
                            <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">No Nota Transaksi</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id" value="<?= $id; ?>"  readonly>
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Nama Barang</label>
                                    <div class="col-sm-10">
                                    <select name="id_barang" id="id_barang" class="form-control" required>
                                        <?php
                                        $query = "SELECT * FROM tb_barang ORDER BY id_barang";
                                        $sql = mysqli_query($conn, $query);
                                        while ($data = mysqli_fetch_array($sql)) {
                                            echo '<option value="' . $data['id_barang'] . '">' . $data['nama_barang'] ."<span class='text-success'> ( ". $data['stok'] ." "  . $data['satuan'] . ') </span> </option>';
                                        }
                                        ?>
                                    </select> 
                                    </div>
                                    </div>

                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Tanggal</label>
                                    <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal" id="tanggal"  required>
                                    </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Harga Jual</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="harga_jual"  required>
                                    </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Jumlah</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jumlah"  required>
                                    </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Total</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="total_harga"  required>
                                </div>
                                    </div>
                                <div class="modal-footer">
                                <a href="databarangkeluar.php" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</a>
                                    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
</div>
    </div>
        </div>
        

        <script>
      document.getElementById('tanggal').valueAsDate = new Date();
    </script>  

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