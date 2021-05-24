<?php 

$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
"https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
$_SERVER['REQUEST_URI']; 


if($link !== 'https://kirana.ajisukmo.com/tambahbarangkeluar.php') {
  $idb = $_GET['idb']; 
} else {
    $idb = '';  
}

?>
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
        <h6 class="mt-1"><b>TAMBAH DATA BARANG KELUAR</b></h6>
        </div>
        <div class="col-sm-6 text-right mt-1 ">
        <a href="databarangkeluar.php"  class="btn btn-secondary btn-sm pl-2 pr-2" ><i class="fa fa-arrow-left"></i> KEMBALI </a> 
        </div>
            </div>
        </div>
        <div class="modal-body">
        <form action="aksi/tambahbarangkeluar.php" method="POST">
       

                <div class="form-group row">
                <label for="recipient-name" class="col-form-label col-sm-2">Pilih Barang</label>
                <div class="col-sm-10">
                <select name="idx" id="idx" class="form-control" >
                <option value=""> - Pilih Barang - </option>
                    <?php
                    $query = "SELECT * FROM tb_barang ORDER BY id_barang";
                    $sql = mysqli_query($conn, $query);
                    while ($data = mysqli_fetch_array($sql)) {
                        echo '<option value="tambahbarangkeluar.php?idb=' . $data['id_barang'] . '">' . $data['nama_barang'] ."<span class='text-success'> ( ". $data['stok'] ." "  . $data['satuan'] . ') </span> </option>';
                    }
                    ?>
            
                </select> 
                </div>
                </div>

                        <!--  Menghitung Harga Jual dan beli rata-rata   -->
                        <?php
                            $query1 = "SELECT * FROM tb_barang WHERE id_barang = '$idb' ORDER BY id_barang";
                            $sql1   = mysqli_query($conn, $query1);
                            $data1  = mysqli_fetch_array($sql1);
                            $harga1 = $data1['harga'];
                            $harga  = number_format($harga1, 0, ',', '.');
                            $nb     = $data1['nama_barang'];
                            $stok   = $data1['stok'];
                            $sat   = $data1['satuan'];

                            $sql2      = "SELECT SUM(jumlah) AS stokterjual FROM tb_barang_keluar WHERE id_barang = '$idb' ";               
                            $result2   = mysqli_query($conn, $sql2);
                            $data2     = mysqli_fetch_array($result2);
                            $jumlahstokterjual  = $data2['stokterjual'];

                            $sql3       = "SELECT SUM(total_harga) AS thargajual FROM tb_barang_keluar WHERE id_barang = '$idb' ";               
                            $result3    = mysqli_query($conn, $sql3);
                            $data3      = mysqli_fetch_array($result3);
                            $totalhargajual = $data3['thargajual'];

                            if ($totalhargajual == 0) {
                            $hargarataratajual  = "data belum tersedia !";
                            } else {
                            $rataratajual       = $totalhargajual / $jumlahstokterjual;
                            
                            $hargarataratajual  = number_format($rataratajual, 0, ',', '.');
                            }
                            

                            // Menentukan Harga Jual
                            $sql11 = "SELECT SUM(total_harga) AS hargabeli FROM tb_barang_masuk WHERE id_barang = '$idb' ";               
                            $result11       = mysqli_query($conn, $sql11);
                            $data11         = mysqli_fetch_array($result11);
                            $totalhargabeli = $data11['hargabeli'];

                            $sql12        = "SELECT SUM(jumlah) AS stokbaru FROM tb_barang_masuk WHERE id_barang = '$idb' ";               
                            $result12     = mysqli_query($conn, $sql12);
                            $data12       = mysqli_fetch_array($result12);
                            $jumlahstok   = $data12['stokbaru'];

                          
                            if ($totalhargabeli == 0) {
                                $hargajual = 0;
                            $hargajual1 = number_format($hargajual, 0, ',', '.');
                            } else {
                                $hargajual = $totalhargabeli / $jumlahstok;
                                $hargajual1 = number_format($hargajual, 0, ',', '.');
    
                                }
    


                            ?>

                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Tanggal</label>
                                    <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal" id="tanggal"  required>
                                    </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Nama Barang</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="barang" id="barang" id="barang" value="<?= $nb; ?>" readonly>
                                    <input type="hidden" class="form-control" name="id_barang" id="id_barang" id="id_barang" value="<?= $idb; ?>" readonly>
                                    </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2"></label>
                                    <div class="col-sm-3">
                                    <span class="text-secondary">Harga Jual Rata-rata </span><input type="text" class="form-control" name="harga" id="harga" id="harga" value="<?= $hargarataratajual; ?>" readonly>
                                    </div>
                                    <div class="col-sm-2 "><span class="text-secondary">Stok Barang</span>
                                    <input type="text" class="form-control" name="harga" id="harga" id="harga" value="<?= $stok; ?>" readonly>
                                    </div>
                                    <div class="col-sm-3">
                                    <span class="text-secondary">Harga Beli Rata-rata </span><input type="text" class="form-control" name="harga_rata_beli" id="harga_rata_beli1" id="harga_rata_beli1" value="<?= $hargajual1; ?>" ;" readonly>
                                    <input type="hidden" class="form-control" name="harga_rata_beli" id="harga_rata_beli" id="harga_rata_beli" value="<?= $hargajual; ?>"  onkeyup="sum1();" readonly>
                                    </div>

                                    <!-- margin keuntungan -->
                                    <div class="col-sm-2 "><span class="text-secondary">Margin % </span>
                                    <input type="text" class="form-control" ame="margin" id="margin" onkeyup="sum1();" value="10" required>
                                    </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Harga Jual</label>
                                    <div class="col-sm-10"> 

                                    <!-- default harga : harga beli rata-rata + ( margin / 100 *  harga beli rata-rata ) -->
                                    <?php 
                                    $hitungharga = (10/100) * ($hargajual);
                                    $hargadefault = $hitungharga + $hargajual;
                                    
                                    ?>
                                    <input type="text" class="form-control" name="harga_jual" id="harga_jual"  onkeyup="sum();" value="<?= $hargadefault; ?>"  required>
                                    </div>  
                                  
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Jumlah</label>
                                    <div class="col-sm-10">
                                    <input type="number" class="form-control" name="jumlah" id="jumlah"  min="1" max="<?= $stok ?>"  onkeyup="sum();"  required>
                                    </div>
                                    </div>
                                    <div class="form-group row ">
                                    <label for="recipient-name" class="col-form-label col-sm-2">Total</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="total_harga"  id="total_harga"  required>
                                </div>
                                    </div>
                                <div class="modal-footer">
                                <a href="databarangkeluar.php" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</a>
                                    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                        </div>

                    <footer class="sticky-footer  mt-5">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto p-4 text-secondary">
                            </div>
                        </div>
                    </footer>

                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="libraries/jquery/jquery-3.4.1.min.js"></script>
                    <script src="libraries/bootstrap/js/bootstrap.js"></script> 

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
                    <!-- Core theme JS-->
                    <script src="js/scripts.js"></script> 


                    <!-- Page level plugins -->
                    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
                    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

                    <!-- Page level custom scripts -->
                    </div>
                 </div>
        
                <!-- tanggal default -->
                <script>
                document.getElementById('tanggal').valueAsDate = new Date();
                </script>  


                <script>
                $("#idx").change(function()
                {
                    document.location.href = $(this).val();
                });
                </script>

                    <!-- hitung dan menentukan harga jualharga jual  -->
                    <script>
                    function sum1() {
                        var txtFirstNumberValue = document.getElementById('harga_rata_beli').value;
                        var txtSecondNumberValue = document.getElementById('margin').value;
                        var result =  (txtSecondNumberValue / 100) * (txtFirstNumberValue);
                        var fix = parseInt(result) + parseInt(txtFirstNumberValue);
                        if (!isNaN(fix)) {
                            document.getElementById('harga_jual').value = fix;
                        }
                    }
                    </script>

                    <script>
                    function sum() {
                        var txtFirstNumberValue = document.getElementById('harga_jual').value;
                        var txtSecondNumberValue = document.getElementById('jumlah').value;
                        var result = txtFirstNumberValue * txtSecondNumberValue;
                        if (!isNaN(result)) {
                            document.getElementById('total_harga').value = result;
                        }
                    }
                    </script>


                    <script>
                    $(document).ready(function () {
                    if ($(window).width() > 991){
                    $('.navbar-light .d-menu').hover(function () {
                            $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
                        }, function () {
                            $(this).find('.sm-menu').first().stop(true, true).delay(190).slideUp(100);
                        });
                        }
                    });
                    </script>


                <!-- jam -->
                <script type="text/javascript">
                window.onload = function() { jam(); }
                function jam() {
                var e = document.getElementById('jam'),
                d = new Date(), h, m, s;
                h = d.getHours();
                m = set(d.getMinutes());
                s = set(d.getSeconds());
                e.innerHTML = h +':'+ m +':'+ s;
                setTimeout('jam()', 1000);
                }
                function set(e) {
                e = e < 10 ? '0'+ e : e;
                return e;
                }
                </script>
                </body>
                </html>

    