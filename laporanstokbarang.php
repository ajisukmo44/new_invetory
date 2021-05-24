<?php 
session_start();
ob_start();
include '../admin/koneksi.php';
include 'fungsi/cek_login.php';
include 'fungsi/cek_session.php';
include 'fungsi/tanggal_indo.php';
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Bagian halaman HTML yang akan konvert -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <title>TB AMANAH </title>

    <!-- Font Awesome Icon -->
    <style type="text/css">
    .footer{
        align
    }
        .body {
            font-size: 9px;
        }

        .tabel2 {
            border-collapse: collapse;
            margin-top: 1px;
            width: 100%;
        }

        .body {
            padding-bottom: 10px;
        }

        .tabel2 tr.odd td {
            background-color: #f9f9f9;
        }

        .tabel2 th,
        .tabel2 td {
            padding: 7px 7px;
            line-height: 20px;
            vertical-align: top;
        }
       
    </style>
</head>

<body>
<!-- query join tabel -->

    <table class="tabel2 table-responsive" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <col width="400">
            <td align="left">
                <h2>TB.AMANAH</h2>
                <p align="left"><strong>Alamat:</strong> Toko Bangunan Amanah, Cuwelo Kidul, RT 003 RW 01 Candirejo, Semanu, Gunung Kidul, 55893. <br>
                <strong>Telp: </strong> 0821-3767-3598
                </p>


            </td>
            <col width="270">
            <td>
                <p align="right"> <img src="images/logo.png" alt="" style="width:90px; margin-left:20px;"></p>
            </td>
           
        </tr>
    </table>
    <hr style="color:#eeeeee">
    
    <p style="margin-left:-4px" ><strong> Laporan:</strong> Data Stok Barang</p>
    <table class="tabel2" border="1" cellspacing="1" cellpadding="1">
        <tr claas="headerr" style="background-color:#eeeeee">
            <col width="5">
            <th  align="center">No</th>
            <col width="65">
            <th  align="center">ID Barang</th>
            <col width="195">
            <th  align="left">Nama Barang </th>
            <col width="135">
            <th  align="left">Kategori</th>
            <col width="50">
            <th  align="center">Harga </th>
            <col width="35">
            <th  align="center">Stok</th>
            <col width="50">
            <th  align="center"> Satuan</th>
        </tr>
        <?php
        $no = 1;
        include 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM tb_barang a JOIN tb_supplier b ON a.id_supplier = b.id_supplier JOIN tb_kategori c ON a.id_kategori = c.id_kategori ORDER BY a.id_barang ASC");
        while ($data = mysqli_fetch_assoc($query)) {
            $id     = $data['id_barang'];
            $nm     = $data['nama_barang'];
            $ns     = $data['nama_supplier'];
            $kat    = $data['nama_kategori'];
            $sat    = $data['satuan'];
            $harga  = $data['harga'];
            $harga1 = number_format($harga, 0, ',', '.');
            $stok   = $data['stok'];
            ?>
            <tr>
            <td align="center"><?= $no++; ?></td>
            <td align="center"><?= $id ?></td>
            <td><?= $nm ?></td>
            <td><?= $kat ?></td> 
            <td align="center"><?= $harga1 ?></td> 
            <td align="center">
                <?php if($stok < 50 ){
                    echo "<span class='text-danger '>". $stok . "</span>";
                } else {
                    echo "<span class='text-success'>". $stok . "</span>";
                }
                ?>
        </td>
        
        <td align="center"><?= $sat ?></td>
           
            </tr>
        <?php } ?>
        </table>
    <br>
    <br>  
</body>
</html>
<!-- Akhir halaman HTML yang akan di konvert -->

<?php
$content = ob_get_clean();
include 'html2pdf/html2pdf.class.php';
try {
    $html2pdf = new HTML2PDF('P', 'A4', 'en', false, 'UTF-8', array(5, 5, 5, 5));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('laporanbarangkeluar.pdf');
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>