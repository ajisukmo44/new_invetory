<?php
include '../koneksi.php';

if ($_POST['rowid']) {
    $id = $_POST['rowid'];
}

// mengambil data berdasarkan id
$sql = "SELECT * FROM tb_barang_keluar a JOIN tb_barang b ON a.id_barang = b.id_barang  WHERE id_barang_keluar = '$id' ";
$result = $conn->query($sql);
foreach ($result as $data) {
?>

    <div class="modal-content">
        <div class="modal-header bg-light">
            <h6><b>EDIT DATA BARANG KELUAR</b></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body bg-light">
            <form action="aksi/editdatabarangkeluar.php" method="POST" enctype="multipart/form-data">
              
                <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">ID Transaksi</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id_barang_keluar" value="<?= $data['id_barang_keluar']; ?>"  readonly>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Nama Barang</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="barang" value="<?= $data['nama_barang']; ?>"  readonly>
                                    </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Tanggal</label>
                                    <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal" id="tanggal"  value="<?= $data['tanggal']; ?>" required>
                                    </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Harga Jual</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="harga_jual" value="<?= $data['harga_jual']; ?>"  required>
                                    </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Jumlah</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jumlah" value="<?= $data['jumlah']; ?>" required>
                                    </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Total</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="total_harga" value="<?= $data['total_harga']; ?>"  required>
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