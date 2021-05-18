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
        <h6 class="mt-1"> <a href="index.php" class="text-secondary h6"><b>HOME </b></a><b> / DATA BARANG</b></h6>
        </div>
        <div class="col-sm-6 text-right mt-1 ">
        <a href=""  class="btn btn-success btn-sm pl-2 pr-2" data-toggle="modal" data-target="#tambahModal"> TAMBAH DATA </a> 
        </div>
    </div>
  </div>
   <table class="table table-sm table-hover table-striped p-2" id="dataTable" style="font-size:14px">
  <thead>
    <tr class="bg-secondary text-white">
      <td width="5%" class="text-center">No</td>
      <td width="20%">Nama Barang</td>
      <td width="15%">Kategori</td>
      <td width="15%">Supplier</td>
      <td width="15%">Harga</td>
      <td width="10%">Stok</td>
      <td width="10%">Satuan</td>
      
      <td width="10%" class="text-right ">Tindakan&nbsp;</td>
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
            <td><?= $nm ?></td>
            <td><?= $kat ?></td> 
            <td><?= $ns ?></td>
            <td><?= $harga1 ?></td> 
            <td>
                <?php if($stok < 50 ){
                    echo "<span class='text-danger'>". $stok . "</span>";
                } else {
                    echo "<span class='text-success'>". $stok . "</span>";
                }
                ?>
        </td>
        
        <td><?= $sat ?></td>
            <td  class="text-right">
            <a href="#" data-toggle="modal" data-target="#editModal" data-id="<?= $id; ?>" class="btn btn-secondary btn-sm "><i class="fa fa-edit"></i></a><a href="aksi/deletebarang.php?id=<?= $id; ?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')" class="btn btn-danger btn-sm ml-1"><i class=" fa fa-times"></i></a>
            </td>
            </tr>
        <?php } ?>
  </tbody>
</table>
</div>
    </div>
        </div>
        
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h5><b>Tambah Data Barang </b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="aksi/tambahbarang.php" method="POST">
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Nama Barang</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_barang"  required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Kategori</label>
                                    <div class="col-sm-9">
                                    <select name="id_kategori" id="id_kategori" class="form-control" required>
                                        <?php
                                        $query = "SELECT * FROM tb_kategori ORDER BY id_kategori";
                                        $sql = mysqli_query($conn, $query);
                                        while ($data = mysqli_fetch_array($sql)) {
                                            echo '<option value="' . $data['id_kategori'] . '">' . $data['nama_kategori'] . '</option>';
                                        }
                                        ?>
                                    </select> 
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Supplier</label>
                                    <div class="col-sm-9">
                                    <select name="id_supplier" id="id_supplier" class="form-control" required>
                                        <?php
                                        $query1 = "SELECT * FROM tb_supplier ORDER BY id_supplier";
                                        $sql1 = mysqli_query($conn, $query1);
                                        while ($data1 = mysqli_fetch_array($sql1)) {
                                            echo '<option value="' . $data1['id_supplier'] . '">' . $data1['nama_supplier'] . '</option>';
                                        }
                                        ?>
                                    </select> 
                                    </div>
                                    </div>

                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Satuan</label>
                                    <div class="col-sm-9">
                                    <select name="satuan" id="satuan" class="form-control">
                                    <option value="Pcs"> Pcs </option>
                                    <option value="Unit">Unit </option>
                                    <option value="Kg"> Kg </option>
                                    </select>
                                </div>
                                    </div>
                                <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Harga</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="harga"  required>
                                </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Stok</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="stok"  required>
                                </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                                    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                                </div>
                            </form>
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

            <script>
                $('#tambahModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget)
                    var modal = $(this)
                    modal.find('.modal-title').text('New message to ')
                    modal.find('.modal-body input')
                })
            </script>

            <!-- modal edit -->
          <script type="text/javascript">
          $(document).ready(function() {
              $('#editModal').on('show.bs.modal', function(e) {
                  var rowid = $(e.relatedTarget).data('id');
                  $.ajax({
                      type: 'post',
                      url: 'modal/editbarang.php',
                      data: 'rowid=' + rowid,
                      success: function(data) {
                          $('.fetched-data').html(data);
                      }
                  });
              });
          });
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