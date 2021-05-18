<?php session_start();
include '../../admin/koneksi.php';

$id     = mysqli_real_escape_string($conn, $_POST['id_supplier']);
$ns     = mysqli_real_escape_string($conn, $_POST['nama_supplier']);
$nohp   = mysqli_real_escape_string($conn, $_POST['no_telepon']);
$alt    = mysqli_real_escape_string($conn, $_POST['alamat']);

   $query  = "UPDATE tb_supplier SET nama_supplier = '$ns', no_telepon = '$nohp',  alamat = '$alt' ";
        $query .= "WHERE id_supplier = '$id'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($conn) .
                " - " . mysqli_error($conn));
        } else {
            echo "<script>alert('Data berhasil diubah.');window.location='../datasupplier.php';</script>";
        }