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
        <tr >
            <col width="400">
            <td align="left" >
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
    <p style="margin-left:-4px" ><strong> Laporan:</strong> Data Supplier</p>
        
    <table class="tabel2" border="1" cellspacing="1" cellpadding="1">
        <tr claas="header" style="background-color:#eeeeee">
            <col width="5">
            <th  align="center">No</th>
            <col width="75">
            <th  align="left">ID Supplier</th>
            <col width="210">
            <th  align="left">Nama Supplier </th>
            <col width="115">
            <th  align="left">No Telepon</th>
            <col width="195">
            <th  align="left">Alamat Supplier</th>
        </tr>
        <?php
        $no = 1;
        include 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM tb_supplier ORDER BY id_supplier ASC");
        while ($data = mysqli_fetch_assoc($query)) {
            $id   = $data['id_supplier'];
            $nm   = $data['nama_supplier'];
            $hp   = $data['no_telepon'];
            $alt  = $data['alamat'];
            ?>
            <tr>
            <td align="center"><?= $no++; ?></td>
            <td><?= $id ?></td>
            <td><?= $nm ?></td>
            <td><?= $hp ?></td> 
            <td><?= $alt ?></td>   
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