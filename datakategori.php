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
        <h6 class="mt-1"><a href="index.php" class="text-secondary h6"><b>HOME </b></a> <b>/ DATA KATEGORI BARANG</b></h6>
        </div>
        <div class="col-sm-6 text-right mt-1 ">
        <a href="" data-toggle="modal" data-target="#tambahModal" class="btn btn-success btn-sm pl-2 pr-2 "> TAMBAH DATA </a> 
        </div>
    </div>
  </div>
   <table class="table table-sm table-hover table-striped p-2" id="dataTable" style="font-size:14px">
  <thead>
    <tr class="bg-secondary text-white">
      <td width="5%" class="text-center">No</td>
      <td width="85%">Nama Kategori</td>
      <td width="10%" class="text-right ">Tindakan&nbsp;</td>
    </tr>
  </thead>
  <tbody>
  <?php
        $no = 1;
        include 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY id_kategori ASC");
        while ($data = mysqli_fetch_assoc($query)) {
            $id   = $data['id_kategori'];
            $nm   = $data['nama_kategori'];
            ?>
            <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $nm ?></td>
            <td  class="text-right">
            <a href="#" data-toggle="modal" data-target="#editModal" data-id="<?= $id; ?>" class="btn btn-secondary btn-sm "><i class="fa fa-edit"></i></a><a href="aksi/deletekategori.php?id=<?= $id; ?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')" class="btn btn-danger btn-sm ml-1 "><i class=" fa fa-times"></i></a>
            </td>
            </tr>
        <?php } ?>
  </tbody>
</table>
</div>
    </div>
        </div>


        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h5><b>Tambah Data Kategori </b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="aksi/tambahkategori.php" method="POST">
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-4">Nama Kategori</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_kategori"  required>
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
                            url: 'modal/editkategori.php',
                            data: 'rowid=' + rowid,
                            success: function(data) {
                                $('.fetched-data').html(data);
                            }
                        });
                    });
                });
            </script>
