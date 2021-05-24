<?php
include '../koneksi.php';

if ($_POST['rowid']) {
    $id = $_POST['rowid'];
}

// mengambil data berdasarkan id
$sql = "SELECT * FROM tb_barang_masuk a JOIN tb_barang b ON a.id_barang = b.id_barang  WHERE id_barang_masuk = '$id' ";
$result = $conn->query($sql);
foreach ($result as $data) {
?>

    <div class="modal-content">
        <div class="modal-header bg-light">
            <h6><b>EDIT DATA BARANG MASUK</b></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body bg-light">
            <form action="aksi/editdatabarangmasuk.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id_barang_masuk" value="<?= $data['id_barang_masuk']; ?>">
                </div>
             
                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Nama Barang</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="barang" value="<?= $data['nama_barang']; ?>"  readonly>
                                    </div>
                                    </div>

                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">No nota</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="no_nota"  value="<?= $data['no_nota']; ?>" required>
                                </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Tanggal</label>
                                    <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= $data['tanggal']; ?>" required>
                                </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Harga Beli</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="harga_beli" id="harga_beli"  value="<?= $data['harga']; ?>" onkeyup="sum();" required>
                                </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Jumlah</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?= $data['jumlah']; ?>" onkeyup="sum();" required>
                                </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Total Harga</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="total_harga" id="total_harga" value="<?= $data['total_harga']; ?>" required>
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
function sum() {
      var txtFirstNumberValue = document.getElementById('harga_beli').value;
      var txtSecondNumberValue = document.getElementById('jumlah').value;
      var result = txtFirstNumberValue * txtSecondNumberValue;
      if (!isNaN(result)) {
         document.getElementById('total_harga').value = result;
      }
}
</script>