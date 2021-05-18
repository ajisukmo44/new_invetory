<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {

    $id         = mysqli_real_escape_string($conn, $_POST['id_supplier']);
    $nama       = mysqli_real_escape_string($conn, $_POST['nama_supplier']);
    $alt        = mysqli_real_escape_string($conn, $_POST['alamat']);
    $nohp       = mysqli_real_escape_string($conn, $_POST['no_hp']);

    // Proses update data dari form ke db
    $sql = "UPDATE tb_supplier SET  id_supplier     = '$id',
                                    nama_supplier   = '$nama',
                                    alamat          = '$alt',
                                    no_telepon      = '$nohp'
                            WHERE   id_supplier     = '$id' ";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../datasupplier.php')</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}