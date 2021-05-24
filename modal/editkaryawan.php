<?php
include '../koneksi.php';

if ($_POST['rowid']) {
    $id = $_POST['rowid'];
}

// mengambil data berdasarkan id
$sql = "SELECT * FROM tb_karyawan WHERE id_karyawan = '$id' ";
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
            <form action="aksi/editdatakaryawan.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id_karyawan" value="<?= $data['id_karyawan']; ?>">
                </div>
                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Nama</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_karyawan" value="<?= $data['nama_karyawan']; ?>"  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Tgl Lahir</label>
                                    <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tgl_lahir" value="<?= $data['tgl_lahir']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                    <label>
                                    <input type="radio" name="jenis_kelamin" value="L"
                                    <?php 
                                    $jk = $data['jenis_kelamin'];
                                    if($jk =='L'){
                                        echo "checked";
                                    } else {
                                        echo "";
                                    }
                                    ?>>
                                    Laki-Laki
                                    </label><br>
                                    <label>
                                    <input type="radio" name="jenis_kelamin" value="P" 
                                    <?php 
                                    $jk = $data['jenis_kelamin'];
                                    if($jk =='P'){
                                        echo "checked";
                                    } else {
                                        echo "";
                                    }
                                    ?>
                                    
                                    required>
                                    Perempuan
                                    </label><br>

                               
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Jabatan</label>
                                    <div class="col-sm-9">
                                    <select name="jabatan" id="jabatan" class="form-control" required>
                                    <option value="<?= $data['jabatan']; ?>"> <?= $data['jabatan']; ?> </option>
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
                                    <input type="text" class="form-control" name="alamat"  value="<?= $data['alamat']; ?>"  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">No Hp</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="no_hp" value="<?= $data['no_hp']; ?>"   required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Tgl Bergabung</label>
                                    <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tgl_bergabung" value="<?= $data['tgl_bergabung']; ?>"  required>
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