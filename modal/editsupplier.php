<?php
include '../koneksi.php';

if ($_POST['rowid']) {
    $id = $_POST['rowid'];
}

// mengambil data berdasarkan id
$sql = "SELECT * FROM tb_supplier WHERE id_supplier = '$id' ";
$result = $conn->query($sql);
foreach ($result as $data) {
?>

    <div class="modal-content">
        <div class="modal-header bg-light">
            <h6><b>EDIT DATA SUPPLIER</b></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body bg-light">
            <form action="aksi/editdatasupplier.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id_supplier" value="<?= $data['id_supplier']; ?>">
                </div>
                <div class="form-group row">
                <label for="recipient-name" class="col-form-label col-sm-3">Nama Supplier</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="nama_supplier"  value="<?= $data['nama_supplier'] ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="recipient-name" class="col-form-label col-sm-3">No Hp</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="no_hp"  value="<?= $data['no_telepon'] ?>" required>
            </div>
                </div>
            <div class="form-group row ">
                <label for="recipient-name" class="col-form-label col-sm-3">Alamat Supplier</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>"  required>
            </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
        </div>
    </div>

<?php } ?>