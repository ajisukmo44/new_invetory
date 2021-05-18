<?php
include '../../admin/koneksi.php';
include '../fungsi/imgpreview.php';

if ($_POST['rowid']) {
    $id = $_POST['rowid'];
}

// mengambil data berdasarkan id

$sql = "SELECT a.id, a.riwayat_pendidikan, a.riwayat_organisasi, a.riwayat_pekerjaan, b.nama_anggota, a.foto, a.nama_ta, a.tempat_lahir, a.ttl, a.email_ta_sa, a.no_hp, a.alamat, a.penugasan  FROM tb_ta_sa a JOIN tb_anggota b ON a.id_anggota = b.id_anggota WHERE a.id = '$id'";
$result = $conn->query($sql);
foreach ($result as $data) {
?>

    <div class="modal-content">
        <div class="modal-header bg-light">
            <h6>EDIT DATA PROFIL</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="aksi/editprofilpengguna.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value="<?= $data['id']; ?>">
                </div>
              
                <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_ta" name="nama_ta" value="<?= $data['nama_ta']; ?>"  required>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="penugasan" class="col-sm-3 col-form-label">Penugasan</label>
                            <div class="col-sm-9">
                            <div class="form-check">
                            <label class="form-check-label">
                               
                                <input type="radio" class="form-check-input mb-3" name="penugasan" value="TA Anggota"   <?php if($data['penugasan'] == 'TA Anggota') {
                                    echo "checked";
                                } else {
                                    echo "";
                                } ?>>TA Anggota &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; 
                                <input type="radio" class="form-check-input mb-3" name="penugasan" value="SA Anggota"   <?php if($data['penugasan'] == 'SA Anggota') {
                                    echo "checked";
                                } else {
                                    echo "";
                                } ?>>SA Anggota &nbsp;&nbsp;
                            </label>
                            </div>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Anggota</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="<?= $data['nama_anggota']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat" class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $data['tempat_lahir']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ttl" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="ttl" name="ttl" value="<?= $data['ttl']; ?>" required>
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
                                <input type="email" class="form-control" id="email" name="email" value="<?= $data['email_ta_sa']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-3 col-form-label">No Hp</label>
                            <div class="col-sm-9">
                                <input type="no_hp" class="form-control" id="no_hp" name="no_hp" value="<?= $data['no_hp']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="r_pendidikan" class="col-sm-3 col-form-label">Riwayat Pendidikan</label>
                            <div class="col-sm-9">
                            <textarea style="width:100%; height:250px" class="textarea" id="textarea" name="r_pendidikan"><?= $data['riwayat_pendidikan']; ?></textarea>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="r_organisasi" class="col-sm-3 col-form-label">Riwayat Organisasi</label>
                            <div class="col-sm-9">
                            <textarea style="width:100%; height:250px" class="textarea" id="textarea" name="r_organisasi"><?= $data['riwayat_organisasi']; ?></textarea>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="riwayat_pekerjaan" class="col-sm-3 col-form-label">Riwayat Pekerjaan</label>
                            <div class="col-sm-9">
                            <textarea style="width:100%; height:250px" class="textarea" id="textarea" name="r_pekerjaan"><?php echo $data['riwayat_pekerjaan'] ?></textarea>
                            </div>
                            </div>

                <div class="form-group row">
                    <label for="fotolama" class="col-sm-3 col-form-label">Foto Lama</label>
                    <div class="col-sm-9">
                        <img style="margin-left:0px; margin-right:45px; margin-bottom:15px;" src="../admin/img/pengguna/<?= $data['foto'] ?> " width="75px" height="75px" /><br>
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
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>