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
        <a href=""  class="btn btn-success btn-sm pl-2 pr-2" data-toggle="modal" data-target="#tambahModal"> TAMBAH DATA </a> 
        </div>
    </div>
  </div>
  <div class="card-body p-3">
<div class="table-responsive">
  <table class="table table-sm table-hover table-striped table-bordered" id="dataTable" style="font-size:14px"  width="100%">
  <thead>
    <tr class="bg-secondary text-white">
      <td width="4%" class="text-center p-2">No</td>
      <td width="9%" class="text-center p-2">ID Barang</td>
      <td width="23%" class=" p-2">Nama Barang</td>
      <td width="15%" class=" p-2">Kategori</td>
      <td width="15%" class=" p-2">Supplier</td>
      <td width="10%" class="text-center p-2">Harga</td>
      <td width="5%" class="text-center p-2">Stok</td>
      <td width="10%" class="text-center p-2">Satuan</td>
      <td width="9%" class="text-right ">Tindakan&nbsp;&nbsp;&nbsp;</td>
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
            <td><?= $ns ?></td>
            <td class="text-center"><?= $harga1 ?></td> 
            <td class=" text-center">
                <?php if($stok < 25 ){
                    echo "<span class='text-danger '>". $stok . "</span>";
                } else {
                    echo "<span class='text-success'>". $stok . "</span>";
                }
                ?>
        </td>
        
        <td class="text-center"><?= $sat ?></td>
            <td  class="text-right">
            <a href="#" data-toggle="modal" data-target="#editModal" data-id="<?= $id; ?>" class="btn btn-secondary btn-sm "><i class="fa fa-edit"></i></a><a href="aksi/deletebarang.php?id=<?= $id; ?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')" class="btn btn-danger btn-sm ml-1 mr-1"><i class=" fa fa-times"></i></a>
            </td>
            </tr>
        <?php } ?>
  </tbody>
</table>
</div>
  </div>
</div>

<?php include 'komponen/footer.php'; ?>
    </div>
        </div>
        
        
        <!-- MODAL TAMBAH -->
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h6><b>TAMBAH DATA BARANG </b></h6>
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
                                    <option value="Roll"> Roll </option>
                                    </select>
                                </div>
                                    </div>
                                <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Harga</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="harga"  required>
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


<!-- data tabel -->
<script>
        $('#dataTable').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
        "lengthMenu": [[ 25, 50, -1], [25, 50, "All"]]
    } );
 </script>
