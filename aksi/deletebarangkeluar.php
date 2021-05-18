
<?php session_start();
include '../koneksi.php';

$id   = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM tb_barang_keluar WHERE id_barang_keluar = '$id' ";

if (mysqli_query($conn, $sql)) {

    echo "<script>location.replace('../databarangkeluar.php')</script>";

} else {

    echo "Error updating record: " . mysqli_error($conn);

}