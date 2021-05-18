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
        <h6 class="mt-1"><a href="index.php" class="text-secondary h6"><b>HOME </b></a><b> / DATA USER</b></h6>
        </div>
        <div class="col-sm-6 text-right mt-1 ">
        <a href=""  class="btn btn-success btn-sm pl-2 pr-2 " data-toggle="modal" data-target="#tambahModal"> TAMBAH DATA </a> 
        </div>
    </div>
  </div>
   <table class="table table-sm table-hover table-striped p-2" id="dataTable" style="font-size:14px">
  <thead>
    <tr class="bg-secondary text-white">
      <td width="5%" class="text-center">No</td>
      <td width="15%">Username</td>
      <td width="20%">Nama</td>
      <td width="25%">Alamat</td>
      <td width="15%">No Hp</td>
      <td width="12%">Jabatan</td>
      <td width="8%" class="text-right ">Tindakan&nbsp;</td>
    </tr>
  </thead>
  <tbody>
  <?php
        $no = 1;
        include 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM tb_user ORDER BY id_user ASC");
        while ($data = mysqli_fetch_assoc($query)) {
            $id    = $data['id_user'];
            $usr    = $data['username'];
            $jbt   = $data['jabatan'];
            $alt   = $data['alamat'];
            $nm    = $data['nama'];
            $hp    = $data['no_hp'];
            ?>
            <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $usr ?></td>
            <td><?= $nm ?></td> 
            <td><?= $alt ?></td>
            <td><?= $hp ?></td> 
            <td><?= $jbt ?></td> 
            <td  class="text-right">
            <a href="#" data-toggle="modal" data-target="#editModal" data-id="<?= $id; ?>" class="btn btn-secondary btn-sm "><i class="fa fa-edit"></i></a><a href="aksi/deleteuser.php?id=<?= $id; ?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')" class="btn btn-danger btn-sm ml-1 "><i class=" fa fa-times"></i></a>
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
                            <h5><b>Tambah Data User </b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="aksi/tambahuser.php" method="POST">
                            
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Username</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username"  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Nama</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama"  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Alamat</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="alamat"  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">No Hp</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="no_hp"  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Jabatan</label>
                                    <div class="col-sm-9">
                                    <select name="jabatan" id="jabatan" class="form-control" required>
                                    <option value="superadmin"> Superadmin </option>
                                    <option value="admin gudang"> Admin Gudang </option>
                                    <option value="pemilik"> Pemilik </option>
                                    </select>
                                </div>
                                    </div>
                                <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Password</label>
                                    <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password"  required>
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
                <div class="modal-dialog" role="document">
                    <div class="fetched-data"></div>
                </div>
            </div>

            </div>
        </div>
        <!-- Bootstrap core JS-->
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
                      url: 'modal/edituser.php',
                      data: 'rowid=' + rowid,
                      success: function(data) {
                          $('.fetched-data').html(data);
                      }
                  });
              });
          });
        </script>