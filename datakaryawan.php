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
        <h6 class="mt-1"><a href="index.php" class="text-success"><b>HOME </b></a><b class="text-secondary"> / DATA KARYAWAN</b></h6>
        </div>
        <div class="col-sm-6 text-right mt-1 ">
        <a href=""  class="btn btn-success btn-sm pl-2 pr-2 " data-toggle="modal" data-target="#tambahModal"> TAMBAH DATA </a> 
        </div>
    </div>
  </div>
   <div class="card-body">
                
                <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered table-striped p-2" id="dataTable" style="font-size:14px"  width="100%">
            <thead>
                <tr class="bg-secondary text-white m-2">
                <td width="4%" class="p-2 text-center">No</td>
                <td width="18%" class="p-2">Nama Karyawan</td>
                <td width="11%" class="p-2 text-center">Tanggal Lahir</td>
                <td width="11%" class="p-2 text-left">Jenis Kelamin</td>
                <td width="10%" class="p-2 text-left">Jabatan</td>
                <td width="11%" class="p-2 text-left">No Hp</td>
                <td width="17%" class="p-2">Alamat</td>
                <td width="9%" class="p-2 text-center"> Bergabung</td>
                <td width="9%" class="text-right mr-1 ">Tindakan&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
            </thead>
            <tbody>
            <?php
                    $no = 1;
                    include 'koneksi.php';
                    $query = mysqli_query($conn, "SELECT * FROM tb_karyawan ORDER BY id_karyawan ASC");
                    while ($data = mysqli_fetch_assoc($query)) {
                        $id    = $data['id_karyawan'];
                        $jbt   = $data['jabatan'];
                        $jk   = $data['jenis_kelamin'];
                        $alt   = $data['alamat'];
                        $nk    = $data['nama_karyawan'];
                        $hp    = $data['no_hp'];
                        $tl   = date('d/m/Y', strtotime($data['tgl_lahir']));
                        $tb   = date('d/m/Y', strtotime($data['tgl_bergabung']));
                        ?>
                        <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $nk ?></td>
                        <td class="text-center"><?= $tl ?></td> 
                        <td class="text-center"><?php if($jk == 'P'){
                            echo "Perempuan"; } else {
                                echo "Laki-laki";
                            }  ?></td>
                        <td class="text-center"><?= $jbt ?></td> 
                        <td class="text-center"><?= $hp ?></td> 
                        <td><?= $alt ?></td> 
                        <td class=" text-center"><?= $tb ?></td> 
                        <td  class="text-right mr-2">
                        <a href="#" data-toggle="modal" data-target="#editModal" data-id="<?= $id; ?>" class="btn btn-secondary btn-sm "><i class="fa fa-edit"></i></a><a href="aksi/deletekaryawan.php?id=<?= $id; ?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')" class="btn btn-danger btn-sm ml-1 mr-2 "><i class=" fa fa-times"></i></a>
                        </td>
                        </tr>
                    <?php } ?>
            </tbody>
            </table>
            </div>
            
            </div>
            </div>
                </div>
                    </div>



        <!-- MODAL TAMBAH -->
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h6><b>TAMBAH DATA KARYAWAN </b></h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="aksi/tambahkaryawan.php" method="POST">
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Nama</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_karyawan"  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Tgl Lahir</label>
                                    <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tgl_lahir"  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                    <label>
                                    <input type="radio" name="jenis_kelamin" value="L">
                                    Laki-Laki
                                    </label><br>
                                    <label>
                                    <input type="radio" name="jenis_kelamin" value="P" required>
                                    Perempuan
                                    </label><br>

                               
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Jabatan</label>
                                    <div class="col-sm-9">
                                    <select name="jabatan" id="jabatan" class="form-control" required>
                                    <option value="kasir"> Kasir </option>
                                    <option value="packing"> Packing </option>
                                    <option value="gudang"> Gudang </option>
                                    <option value="supir"> Supir </option>
                                    <option value="serabutan"> Serabutan </option>
                                    </select>
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
                                    <label for="recipient-name" class="col-form-label col-sm-3">Tgl Bergabung</label>
                                    <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tgl_bergabung"  required>
                                    </div>
                                </div>
                               
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                                    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
               


            <!-- modal edit -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="fetched-data"></div>
                </div>
            </div>

        
        <!-- Bootstrap core JS-->
            <!-- Footer -->
            <?php include 'komponen/footer.php'; ?>


            </div>
        </div>


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
                      url: 'modal/editkaryawan.php',
                      data: 'rowid=' + rowid,
                      success: function(data) {
                          $('.fetched-data').html(data);
                      }
                  });
              });
          });
        </script>