<?php
include '../koneksi.php';

if ($_POST['rowid']) {
    $id = $_POST['rowid'];
}

// mengambil data berdasarkan id
$sql = "SELECT * FROM tb_barang a JOIN tb_supplier b ON a.id_supplier = b.id_supplier JOIN tb_kategori c ON a.id_kategori = c.id_kategori  WHERE id_barang = '$id' ";
$result = $conn->query($sql);
foreach ($result as $data) {
?>

    <div class="modal-content">
        <div class="modal-header bg-light">
            <h6><b>EDIT DATA BARANG</b></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body bg-light">
            <form action="aksi/editdatabarang.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id_barang" value="<?= $data['id_barang']; ?>">
                </div>
                <div class="form-group row">
                <label for="recipient-name" class="col-form-label col-sm-3">Nama barang</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="nama_barang"  value="<?= $data['nama_barang'] ?>" required>
                </div>
            </div>
            <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Kategori</label>
                                    <div class="col-sm-9">
                                    <select name="id_kategori" id="id_kategori" class="form-control" required>
                                    <option value="<?= $data['id_kategori'] ?>"><?= $data['nama_kategori'] ?></option>
                                        <?php
                                        $query2 = "SELECT * FROM tb_kategori ORDER BY id_kategori";
                                        $sql2 = mysqli_query($conn, $query2);
                                        while ($data2 = mysqli_fetch_array($sql2)) {
                                            echo '<option value="' . $data2['id_kategori'] . '">' . $data2['nama_kategori'] . '</option>';
                                        }
                                        ?>
                                    </select> 
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-3">Supplier</label>
                                    <div class="col-sm-9">
                                    <select name="id_supplier" id="id_supplier" class="form-control" required>
                                    <option value="<?= $data['id_supplier'] ?>"><?= $data['nama_supplier'] ?></option>
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
                <input type="text" class="form-control" name="satuan"  value="<?= $data['satuan'] ?>" required>
            </div>
                </div>
            <div class="form-group row ">
                <label for="recipient-name" class="col-form-label col-sm-3">Harga </label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="harga" value="<?= $data['harga'] ?>"  required>
            </div>
                </div>
                <div class="form-group row">
                <label for="recipient-name" class="col-form-label col-sm-3">Stok</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="stok"  value="<?= $data['stok'] ?>" required>
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