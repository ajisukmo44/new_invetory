<?php session_start();
include '../koneksi.php';

$query     = "SELECT max(id_barang)AS kode FROM tb_barang";
$cari_kd   = mysqli_query($conn, $query);
$tm_cari   = mysqli_fetch_array($cari_kd);
$kode      = substr($tm_cari['kode'], 5, 9);
$tambah    = $kode + 1;

if ($tambah < 10) {
    $id = "BRG000" . $tambah;
} else {
    $id = "BRG00" . $tambah;
}

if (isset($_POST['submit'])) {

    $nama       = mysqli_real_escape_string($conn, $_POST['nama_barang']);
    $kat        = mysqli_real_escape_string($conn, $_POST['id_kategori']);
    $sup        = mysqli_real_escape_string($conn, $_POST['id_supplier']);
    $satuan     = mysqli_real_escape_string($conn, $_POST['satuan']);
    $harga      = mysqli_real_escape_string($conn, $_POST['harga']);
    $stok       = mysqli_real_escape_string($conn, $_POST['stok']);

    $cekdata    = "SELECT nama_barang FROM tb_barang WHERE nama_barang = '$nama' ";
    $ada        =  mysqli_query($conn, $cekdata);

    if (mysqli_num_rows($ada) > 0) {

        echo "<script>alert('ERROR: nama barang telah terdaftar, silahkan pakai nama barang lain!');history.go(-1)</script>";
    
    } else {
        // Proses insert data dari form ke db
        $sql = "INSERT INTO tb_barang ( id_barang, nama_barang, id_kategori, id_supplier, satuan, harga, stok )
                        VALUES ('$id','$nama','$kat','$sup', '$satuan','$harga','$stok')";

        if (mysqli_query($conn, $sql)) {
         
            echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../databarang.php')</script>";
        
        } else {
        
            echo "Error updating record: " . mysqli_error($conn);
        
        }
    }
} else {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
}