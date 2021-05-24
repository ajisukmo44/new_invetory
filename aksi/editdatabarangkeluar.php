<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {

    
    $id         = mysqli_real_escape_string($conn, $_POST['id_barang_keluar']);
    $tgl        = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $hb         = mysqli_real_escape_string($conn, $_POST['harga_jual']);
    $jml       = mysqli_real_escape_string($conn, $_POST['jumlah']);
    $th        = mysqli_real_escape_string($conn, $_POST['total_harga']);

    // Proses update data dari form ke db
    $sql = "UPDATE tb_barang_keluar SET  id_barang_keluar       = '$id',
                                    tanggal         = '$tgl',
                                    harga_jual      = '$hb',
                                    jumlah          = '$jml',
                                    total_harga     = '$th'
                            WHERE   id_barang_keluar = '$id' ";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../databarangkeluar.php')</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}