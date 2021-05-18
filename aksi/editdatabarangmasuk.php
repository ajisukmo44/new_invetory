<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {

    
    $id         = mysqli_real_escape_string($conn, $_POST['id_barang_masuk']);
    $no         = mysqli_real_escape_string($conn, $_POST['no_nota']);
    $tgl        = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $hb      = mysqli_real_escape_string($conn, $_POST['harga_beli']);
    $jml       = mysqli_real_escape_string($conn, $_POST['jumlah']);
    $th        = mysqli_real_escape_string($conn, $_POST['total_harga']);

    // Proses update data dari form ke db
    $sql = "UPDATE tb_barang_masuk SET  id_barang_masuk       = '$id',
                                    no_nota         = '$no',
                                    tanggal         = '$tgl',
                                    harga_beli      = '$hb',
                                    jumlah          = '$jml',
                                    total_harga     = '$th'
                            WHERE   id_barang_masuk = '$id' ";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../databarangmasuk.php')</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}