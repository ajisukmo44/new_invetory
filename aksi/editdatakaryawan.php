<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {
    
    $id       = mysqli_real_escape_string($conn, $_POST['id_karyawan']);
    $nm       = mysqli_real_escape_string($conn, $_POST['nama_karyawan']);
    $jk       = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $tl       = mysqli_real_escape_string($conn, $_POST['tgl_lahir']);
    $tb       = mysqli_real_escape_string($conn, $_POST['tgl_bergabung']);
    $alt      = mysqli_real_escape_string($conn, $_POST['alamat']);
    $hp       = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $jb       = mysqli_real_escape_string($conn, $_POST['jabatan']);

    // Proses update data dari form ke db
    $sql = "UPDATE tb_karyawan SET  id_karyawan     = '$id',
                                nama_karyawan   = '$nm',
                                jenis_kelamin   = '$jk',
                                tgl_lahir       = '$tl',
                                tgl_bergabung   = '$tb',
                                alamat          = '$alt',
                                no_hp           = '$hp',
                                jabatan         = '$jb'
                        WHERE   id_karyawan     = '$id' ";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../datakaryawan.php')</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}