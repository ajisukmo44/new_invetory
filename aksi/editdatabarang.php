<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {

    
    $id         = mysqli_real_escape_string($conn, $_POST['id_barang']);
    $nama       = mysqli_real_escape_string($conn, $_POST['nama_barang']);
    $kat        = mysqli_real_escape_string($conn, $_POST['id_kategori']);
    $sup        = mysqli_real_escape_string($conn, $_POST['id_supplier']);
    $satuan     = mysqli_real_escape_string($conn, $_POST['satuan']);
    $harga      = mysqli_real_escape_string($conn, $_POST['harga']);
    $stok       = mysqli_real_escape_string($conn, $_POST['stok']);

    // Proses update data dari form ke db
    $sql = "UPDATE tb_barang SET  id_barang       = '$id',
                                    nama_barang   = '$nama',
                                    id_kategori   = '$kat',
                                    id_supplier   = '$sup',
                                    satuan        = '$satuan',
                                    harga         = '$harga',
                                    stok          = '$stok'
                            WHERE   id_barang     = '$id' ";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Update data berhasil! Klik ok untuk melanjutkan');location.replace('../databarang.php')</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}