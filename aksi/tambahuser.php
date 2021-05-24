<?php session_start();
include '../koneksi.php';

// $query     = "SELECT max(id_user)AS kode FROM tb_user";
// $cari_kd   = mysqli_query($conn, $query);
// $tm_cari   = mysqli_fetch_array($cari_kd);
// $kode      = substr($tm_cari['kode'], 3, 6);
// $tambah = $kode + 1;

// if ($tambah < 10) {
//     $id = "USR0" . $tambah;
// } else {
//     $id = "USR" . $tambah;
// }

if (isset($_POST['submit'])) {

    $usr      = mysqli_real_escape_string($conn, $_POST['username']);
    $jb       = mysqli_real_escape_string($conn, $_POST['hak_akses']);
    $alt      = mysqli_real_escape_string($conn, $_POST['alamat']);
    $nm       = mysqli_real_escape_string($conn, $_POST['nama']);
    $hp       = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $pass     = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $cekdata    = "SELECT username FROM tb_user WHERE username = '$usr' ";
    $ada        =  mysqli_query($conn, $cekdata);

    if (mysqli_num_rows($ada) > 0) {
        echo "<script>alert('ERROR: username telah terdaftar, silahkan pakai username  lain!');history.go(-1)</script>";
    } else {
        // Proses insert data dari form ke db
        $sql = "INSERT INTO tb_user ( id_user, username, password, nama, alamat, no_hp, hak_akses )
                        VALUES ('','$usr','$pass','$nm','$alt','$hp','$jb')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../datauser.php')</script>";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
} else {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}