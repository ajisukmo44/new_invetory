
<?php session_start();
include '../koneksi.php';

$id   = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM tb_barang_masuk WHERE id_barang_masuk = '$id' ";

if (mysqli_query($conn, $sql)) {

    echo "<script>location.replace('../databarangmasuk.php')</script>";

} else {

    echo "Error updating record: " . mysqli_error($conn);

}