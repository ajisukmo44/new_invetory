<?php
include '../../admin/koneksi.php';
include '../fungsi/imgpreview.php';

if ($_POST['rowid']) {
    $id = $_POST['rowid'];
}

// mengambil data berdasarkan id
$sql = "SELECT * FROM tb_anggota WHERE id_anggota = '$id' ";
$result = $conn->query($sql);
foreach ($result as $data) {
?>

    <div class="modal-content">
        <div class="modal-header bg-light">
            <h6>EDIT DATA ANGGOTA</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="aksi/editdatanggota.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id_anggota" value="<?= $data['id_anggota']; ?>">
                </div>
              
                <div class="form-group row">
                            <label for="id_anggota" class="col-sm-3 col-form-label">ID Anggota</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="id_anggota" name="id_anggota" value="<?= $data['id_anggota']; ?>"  readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_anggota" class="col-sm-3 col-form-label">Nama Anggota</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="<?= $data['nama_anggota']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="daerah" class="col-sm-3 col-form-label">Daerah Pemilihan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="daerah_pemilihan" name="daerah_pemilihan" 
                                value="<?= $data['daerah_pemilihan']; ?>"
                                required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" value="laki-laki" <?php if($data['jenis_kelamin'] == 'laki-laki') {
                                    echo "checked";
                                } else {
                                    echo "";
                                } ?> > Laki Laki &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; <input type="radio" class="form-check-input" name="jenis_kelamin" value="perempuan"   <?php if($data['jenis_kelamin'] == 'perempuan') {
                                    echo "checked";
                                } else {
                                    echo "";
                                } ?>>Perempuan
                            </label>
                            </div>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat" class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $data['tempat_lahir']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>" required>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" value="<?= $data['email']; ?>" required>
                            </div>
                        </div>

                <div class="form-group row">
                    <label for="fotolama" class="col-sm-3 col-form-label">Foto Lama</label>
                    <div class="col-sm-9">
                        <img style="margin-left:0px; margin-right:45px; margin-bottom:15px;" src="../admin/img/anggota/<?= $data['foto'] ?> " width="75px" height="75px" /><br>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fotolama" class="col-sm-3 col-form-label">Foto Baru</label>
                    <div class="col-sm-9">
                        <input type="file" id="foto" name="foto" onchange="tampilkanPreview(this,'preview1')" class="form-control-file">
                        <br><b>Preview Gambar</b><br>
                        <img id="preview1" src="" alt="" width="20%" />
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