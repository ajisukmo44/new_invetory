<!-- RECORD DATA -->
<?php
$sql6      = "SELECT * FROM tb_supplier ";
$result6   = mysqli_query($conn, $sql6);
$dataspl  = mysqli_num_rows($result6);

$sql7      = "SELECT * FROM tb_barang ";
$result7   = mysqli_query($conn, $sql7);
$databrg    = mysqli_num_rows($result7);

$sql4      = "SELECT * FROM tb_karyawan ";
$result4   = mysqli_query($conn, $sql4);
$datakry    = mysqli_num_rows($result4);
?>

<div class='row mb-1 mt-2 p-4'>
  <div class='col-sm-4'>
  <a href='datasupplier.php' style='text-decoration:none'>
    <div class='card bg-info text-white mb-1'>
      <div class='card-body'>  
        <div class='row'>
          <div class='col-sm-8'>
            <h4><b><?= $dataspl; ?></b></h4>
          <p class='card-title'>Data Supplier</p>
          </div>
          <div class='col-sm-4 text-right'>
          <p class='card-text'><i class='fa fa-user fa-3x'></i></p>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <div class='col-sm-4'>
  <a href='databarang.php' style='text-decoration:none'>
    <div class='card bg-success text-white mb-1'>
      <div class='card-body'>
        <div class='row'>
          <div class='col-sm-8'>
            <h4><b><?= $databrg ?></b></h4>
          <p class='card-title'>Data Barang</p>
          </div>
          <div class='col-sm-4 text-right'>
          <p class='card-text'><i class='fa fa-th-large fa-3x'></i></p>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <div class='col-sm-4'>
  <a href='datakaryawan.php' style='text-decoration:none'>
    <div class='card bg-danger text-white mb-1'>
      <div class='card-body'>
        <div class='row'>
          <div class='col-sm-8'>
            <h4><b><?= $datakry ?></b></h4>
          <p class='card-title'>Data Karyawan</p>
          </div>
          <div class='col-sm-4 text-right'>
          <p class='card-text'><i class='fa fa-user fa-3x'></i></p>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
</div>

<!-- KONTEN SUPERADMIN -->
<div class="card ml-4 mr-4 bg-light p-4">
<h6> DATA USER </h6>
<div class="table-responsive">
<table class="table table-sm table-hover table-bordered table-striped p-2" id="dataTable" style="font-size:14px"  width="100%">
  <thead>
    <tr class="bg-secondary text-white m-2">
      <td width="4%" class="p-2 text-center">No</td>
      <td width="16%" class="p-2">Username</td>
      <td width="24%" class="p-2">Nama</td>
      <td width="27%" class="p-2">Alamat</td>
      <td width="15%" class="p-2">No Hp</td>
      <td width="14%" class="p-2">Hak Akses</td>
    </tr>
  </thead>
  <tbody>
  <?php
        $no = 1;
        include 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM tb_user ORDER BY id_user ASC");
        while ($data = mysqli_fetch_assoc($query)) {
            $id    = $data['id_user'];
            $usr   = $data['username'];
            $jbt   = $data['hak_akses'];
            $alt   = $data['alamat'];
            $nm    = $data['nama'];
            $hp    = $data['no_hp'];
            ?>
            <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $usr ?></td>
            <td><?= $nm ?></td> 
            <td><?= $alt ?></td>
            <td><?= $hp ?></td> 
            <td><?= $jbt ?></td> 
            </tr>
        <?php } ?>
  </tbody>
</table>
</div>
</div>