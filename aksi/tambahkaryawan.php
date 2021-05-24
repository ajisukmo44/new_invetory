<?php session_start();
include '../koneksi.php';

$query     = "SELECT max(id_karyawan)AS kode FROM tb_karyawan";
$cari_kd   = mysqli_query($conn, $query);
$tm_cari   = mysqli_fetch_array($cari_kd);
$kode      = substr($tm_cari['kode'], 4, 7);
$tambah = $kode + 1;

if ($tambah < 10) {
    $id = "KAR00" . $tambah;
} else {
    $id = "KAR0" . $tambah;
}

if (isset($_POST['submit'])) {

    $nm      = mysqli_real_escape_string($conn, $_POST['nama_karyawan']);
    $jk       = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $tl       = mysqli_real_escape_string($conn, $_POST['tgl_lahir']);
    $tb       = mysqli_real_escape_string($conn, $_POST['tgl_bergabung']);
    $alt      = mysqli_real_escape_string($conn, $_POST['alamat']);
    $hp       = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $jb       = mysqli_real_escape_string($conn, $_POST['jabatan']);


    $cekdata    = "SELECT id_karyawan FROM tb_karyawan WHERE id_karyawan = '$id' ";
    $ada        =  mysqli_query($conn, $cekdata);

    if (mysqli_num_rows($ada) > 0) {
        echo "<script>alert('ERROR: id_karyawan telah terdaftar, silahkan pakai id_karyawan  lain!');history.go(-1)</script>";
    } else {
        // Proses insert data dari form ke db
        $sql = "INSERT INTO tb_karyawan ( id_karyawan, nama_karyawan, jenis_kelamin, tgl_lahir, alamat, no_hp, jabatan, tgl_bergabung )
                        VALUES ('$id','$nm','$jk','$tl','$alt','$hp','$jb','$tb')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../datakaryawan.php')</script>";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
} else {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}