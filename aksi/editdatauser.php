<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {
    $id       = mysqli_real_escape_string($conn, $_POST['id_user']);
    $jb       = mysqli_real_escape_string($conn, $_POST['hak_akses']);
    $alt      = mysqli_real_escape_string($conn, $_POST['alamat']);
    $nm       = mysqli_real_escape_string($conn, $_POST['nama']);
    $hp       = mysqli_real_escape_string($conn, $_POST['no_hp']);

    // Proses update data dari form ke db
    $sql = "UPDATE tb_user SET  id_user   = '$id',
                                nama      = '$nm',
                                alamat    = '$alt',
                                no_hp     = '$hp',
                                hak_akses = '$jb'
                        WHERE   id_user   = '$id' ";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../datauser.php')</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}