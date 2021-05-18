<?php
include '../koneksi.php';

if ($_POST['rowid']) {
    $id = $_POST['rowid'];
}

// mengambil data berdasarkan id
$sql = "SELECT * FROM tb_user WHERE id_user = '$id' ";
$result = $conn->query($sql);
foreach ($result as $data) {
?>

    <div class="modal-content">
        <div class="modal-header bg-light">
            <h6><b>EDIT DATA USER</b></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body bg-light">
            <form action="aksi/editdatauser.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id_user" value="<?= $data['id_user']; ?>">
                </div>
                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Username</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" value="<?= $data['username']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Nama</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" value="<?= $data['nama']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Alamat</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="alamat" value="<?= $data['alamat']; ?>"  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">No Hp</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="no_hp" value="<?= $data['no_hp']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Jabatan</label>
                                    <div class="col-sm-9">
                                    <select name="jabatan" id="jabatan" class="form-control" required>
                                    <option value="<?= $data['jabatan']; ?>"> <?= $data['jabatan']; ?> </option>
                                    <option value="superadmin"> Superadmin </option>
                                    <option value="admin gudang"> Admin Gudang </option>
                                    <option value="pemilik"> Pemilik </option>
                                    </select>
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