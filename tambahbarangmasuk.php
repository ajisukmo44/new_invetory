
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
        <h6 class="mt-1"><b>TAMBAH DATA BARANG MASUK</b></h6>
        </div>
        <div class="col-sm-6 text-right mt-1 ">
        <a href="databarangmasuk.php"  class="btn btn-secondary btn-sm pl-2 pr-2" ><i class="fa fa-arrow-left"></i> KEMBALI </a> 
        </div>
    </div>
  </div>
  <div class="modal-body">
                            <form action="aksi/tambahbarangmasuk.php" method="POST">

                                <div class="form-group row">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Nama Barang</label>
                                    <div class="col-sm-10">
                                    <select name="id_barang" id="id_barang" class="form-control" required>
                                        <?php
                                        $query = "SELECT * FROM tb_barang ORDER BY id_barang";
                                        $sql = mysqli_query($conn, $query);
                                        while ($data = mysqli_fetch_array($sql)) {
                                        $idb = $data['id_barang'];
                                        $harganow1 = $data['harga'];
                                        $harganow = number_format($harganow1, 0, ',', '.');

                                        // harga rata rata :  jumlah total harga masuk barang / total stok masuk
                                        $sql11 = "SELECT SUM(total_harga) AS hargabeli FROM tb_barang_masuk WHERE id_barang = '$idb' ";               
                                        $result11       = mysqli_query($conn, $sql11);
                                        $data11         = mysqli_fetch_array($result11);
                                        $totalhargabeli = $data11['hargabeli'];
            
                                        $sql12        = "SELECT SUM(jumlah) AS stokbaru FROM tb_barang_masuk WHERE id_barang = '$idb' ";               
                                        $result12     = mysqli_query($conn, $sql12);
                                        $data12       = mysqli_fetch_array($result12);
                                        $jumlahstok   = $data12['stokbaru'];
                                    

                                        if ($totalhargabeli == 0) {
                                            $hargarata = 'data belum tersedia';
                                        } else {
                                            $ratarata = $totalhargabeli / $jumlahstok;
                                            $hargarata = number_format($ratarata, 0, ',', '.');
                                        }
                                            echo "<option value='{$data['id_barang']}'>" . $data['nama_barang'] . " <span class='text-danger'>  (Harga Beli Rata-Rata : " . $hargarata . ")</span</option>";
                                        }
                                        ?>
                                    </select> 
                                    </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Tanggal</label>
                                    <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal" id="tanggal"  required>
                                </div>
                                </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">No nota</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="no_nota"  required>
                                </div>
                                    </div>
                               
                                <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Harga Beli</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="harga_beli" id="harga_beli"  onkeyup="sum();" required>
                                </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Jumlah</label>
                                    <div class="col-sm-10">
                                    <input type="number" class="form-control" name="jumlah" id="jumlah" min="1" onkeyup="sum();" required>
                                </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Total Harga</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="total_harga" id="total_harga"  required>
                                </div>
                                    </div>
                                <div class="modal-footer">
                                <a href="databarangmasuk.php" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</a>
                                    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                        </div>
                        </div>
                    </div>
        <script>
      document.getElementById('tanggal').valueAsDate = new Date();
    </script>  

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