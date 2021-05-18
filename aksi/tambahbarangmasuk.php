<?php session_start();
include '../koneksi.php';

$ttll  = date('Ymd');
$jm    = date('Hi');
$kode1 = rand(0, 9);
$kode2 = chr(rand(65,90));

$id = 'BM'.$ttll.$jm.$kode1.$kode2;


if (isset($_POST['submit'])) {

    $no         = mysqli_real_escape_string($conn, $_POST['no_nota']);
    $idb        = mysqli_real_escape_string($conn, $_POST['id_barang']);
    $tgl        = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $hb         = mysqli_real_escape_string($conn, $_POST['harga_beli']);
    $jml       = mysqli_real_escape_string($conn, $_POST['jumlah']);
    $th        = mysqli_real_escape_string($conn, $_POST['total_harga']);

    $isi = mysqli_query($conn,"SELECT * FROM tb_barang WHERE id_barang='$idb'");
	$i = mysqli_fetch_assoc($isi);
	$stok = $i['stok'];

    $stokbaru = $stok + $jml;

    $cekdata    = "SELECT no_nota FROM tb_barang_masuk WHERE no_nota = '$no' ";
    $ada        =  mysqli_query($conn, $cekdata);

    if (mysqli_num_rows($ada) > 0) {

        echo "<script>alert('ERROR: no nota  telah terdaftar!');history.go(-1)</script>";
    
    } else {
        // Proses insert data dari form ke db
        $sql = "INSERT INTO tb_barang_masuk ( id_barang_masuk, no_nota, id_barang, harga_beli, jumlah, total_harga, tanggal )
                        VALUES ('$id','$no','$idb','$hb', '$jml','$th','$tgl');";

        $sql .= "UPDATE tb_barang SET stok = '$stokbaru' WHERE id_barang='$idb'";

        if (mysqli_multi_query($conn, $sql)) {
         
            echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../databarangmasuk.php')</script>";
        
        } else {
        
            echo "Error updating record: " . mysqli_error($conn);
        
        }
    }
} else {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}