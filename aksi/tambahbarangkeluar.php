<?php session_start();
include '../koneksi.php';


if (isset($_POST['submit'])) {

    $id        = mysqli_real_escape_string($conn, $_POST['id']);
    $idb        = mysqli_real_escape_string($conn, $_POST['id_barang']);
    $tgl        = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $hb         = mysqli_real_escape_string($conn, $_POST['harga_jual']);
    $jml        = mysqli_real_escape_string($conn, $_POST['jumlah']);
    $th         = mysqli_real_escape_string($conn, $_POST['total_harga']);

    $isi = mysqli_query($conn,"SELECT * FROM tb_barang WHERE id_barang='$idb'");
	$i = mysqli_fetch_assoc($isi);
	$stok = $i['stok'];

    $stokbaru = $stok - $jml;

    $cekdata    = "SELECT id_barang_keluar FROM tb_barang_keluar WHERE id_barang_keluar = '$id' ";
    $ada        =  mysqli_query($conn, $cekdata);

    if (mysqli_num_rows($ada) > 0) {

        echo "<script>alert('ERROR: no transaksi telah terdaftar!');history.go(-1)</script>";
    
    } else {
        // Proses insert data dari form ke db
        $sql = "INSERT INTO tb_barang_keluar ( id_barang_keluar, id_barang, harga_jual, jumlah, total_harga, tanggal )
                        VALUES ('$id','$idb','$hb', '$jml','$th','$tgl');";

                        
        $sql .= "UPDATE tb_barang SET stok = '$stokbaru' WHERE id_barang='$idb'";

        if (mysqli_multi_query($conn, $sql)) {
         
            echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../databarangkeluar.php')</script>";
        
        } else {
        
            echo "Error updating record: " . mysqli_error($conn);
        
        }
    }
} else {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}