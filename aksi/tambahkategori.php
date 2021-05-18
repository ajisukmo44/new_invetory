<?php session_start();
include '../koneksi.php';
$query     = "SELECT max(id_kategori)AS kode FROM tb_kategori";
$cari_kd   = mysqli_query($conn, $query);
$tm_cari   = mysqli_fetch_array($cari_kd);
$kode      = substr($tm_cari['kode'], 3, 6);
$tambah = $kode + 1;

if ($tambah < 10) {
    $id = "KAT0" . $tambah;
} else {
    $id = "KAT" . $tambah;
}

if (isset($_POST['submit'])) {

    $nama       = mysqli_real_escape_string($conn, $_POST['nama_kategori']);
    $cekdata    = "SELECT nama_kategori FROM tb_kategori WHERE nama_kategori = '$nama' ";
    $ada        =  mysqli_query($conn, $cekdata);

    if (mysqli_num_rows($ada) > 0) {
        echo "<script>alert('ERROR: nama kategori telah terdaftar, silahkan pakai nama kategori lain!');history.go(-1)</script>";
    } else {
        // Proses insert data dari form ke db
        $sql = "INSERT INTO tb_kategori ( id_kategori, nama_kategori )
                        VALUES ('$id','$nama')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../datakategori.php')</script>";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
} else {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}