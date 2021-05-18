
<?php session_start();
include '../koneksi.php';

$id   = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM tb_barang WHERE id_barang = '$id' ";

if (mysqli_query($conn, $sql)) {

    echo "<script>location.replace('../databarang.php')</script>";

} else {

    echo "Error updating record: " . mysqli_error($conn);

}