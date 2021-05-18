<?php session_start();
include '../koneksi.php';

$query     = "SELECT max(id_supplier)AS kode FROM tb_supplier";
$cari_kd   = mysqli_query($conn, $query);
$tm_cari   = mysqli_fetch_array($cari_kd);
$kode      = substr($tm_cari['kode'], 3, 6);
$tambah = $kode + 1;

if ($tambah < 10) {
    $id = "SUP0" . $tambah;
} else {
    $id = "SUP" . $tambah;
}

if (isset($_POST['submit'])) {

    $nama       = mysqli_real_escape_string($conn, $_POST['nama_supplier']);
    $no         = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $alamat     = mysqli_real_escape_string($conn, $_POST['alamat']);

    $cekdata    = "SELECT nama_supplier FROM tb_supplier WHERE nama_supplier = '$nama' ";
    $ada        =  mysqli_query($conn, $cekdata);

    if (mysqli_num_rows($ada) > 0) {
        echo "<script>alert('ERROR: nama supplier telah terdaftar, silahkan pakai nama supplier lain!');history.go(-1)</script>";
    } else {
        // Proses insert data dari form ke db
        $sql = "INSERT INTO tb_supplier ( id_supplier, nama_supplier, no_telepon, alamat )
                        VALUES ('$id','$nama','$no','$alamat')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../datasupplier.php')</script>";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
} else {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}