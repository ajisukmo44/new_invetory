<?php 
session_start();
ob_start();
include 'koneksi.php';
include 'fungsi/cek_login.php';
include 'fungsi/cek_session.php';
include 'fungsi/tanggal_indo.php';

$taw = $_GET['taw'];  
$tak = $_GET['tak'];  

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Bagian halaman HTML yang akan konvert -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <title>TB AMANAH </title>

    <!-- Font Awesome Icon -->
    <style type="text/css">
    
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
    <table class="tabel2 table-responsive" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <col width="350">
            <td align="left">
            <p style="margin-left:-7px" ><strong> Laporan :</strong> Barang Masuk</p>
            </td>
            <col width="350">
            <td>
            <p align="right">
    <       <strong>Periode :</> <?= date('d/m/Y', strtotime($taw)); ?> - <?= date('d/m/Y', strtotime($tak)); ?></p>
            </td>       
        </tr>
    </table>
    <table class="tabel2" border="1" cellspacing="1" cellpadding="1">
        <tr claas="headerr" style="background-color:#eeeeee">
            <col width="5">
            <th  align="center">No</th>
            <col width="68">
            <th  align="center">Tgl Masuk </th>
            <col width="75">
            <th  align="left">No Nota</th>
            <col width="220">
            <th  align="left">Nama Barang</th>
            <col width="65">
            <th  align="center">Harga Beli</th>
            <col width="42">
            <th  align="center">Jumlah</th>
            <col width="60">
            <th  align="right">Total</th>
        </tr>
        <?php
              $no = 1;
              include 'koneksi.php';
              $query = mysqli_query($conn, "SELECT * FROM tb_barang_masuk a JOIN tb_barang b ON a.id_barang = b.id_barang WHERE tanggal BETWEEN '$taw' AND '$tak' ORDER BY a.id_barang_masuk ASC");
              while ($data = mysqli_fetch_assoc($query)) {
                  $id         = $data['id_barang_masuk'];
                  $nb         = $data['nama_barang'];
                  $tgl        = date('d/m/Y', strtotime($data['tanggal']));
                  $nn         =  $data['no_nota'];
                  $harga      = $data['harga_beli'];
                  $hb         = number_format($harga, 0, ',', '.');
                  $total      = $data['total_harga'];
                  $total1     = number_format($total, 0, ',', '.');
                  $jml        = $data['jumlah'];
                ?>
            <tr>
                <th align="center"><?= $no++ ?></th>
                <td align="center"><?= $tgl; ?></td>
                <td align="left"><?= $nn ?></td>
                <td align="left"><?= $nb ?></td>
                <td align="center"><?= $hb ?></td>
                <td align="center"><?= $jml ?></td>
                <td align="right"><?= $total1 ?></td>
            </tr>
            <?php } ?>
        </table>
    <br>
    <br> 

    <hr style="color:#eeeeee">
    <table class=" tabel2 table-responsive" cellspacing="0" cellpadding="1" border="0" align="center">
        <tr>
            <col width="380">
            <td align="center"></td>
            <col width="380">
            <td align="center">Gunung Kidul, <?= $date('d-m-Y'); ?></td>
        </tr>

        <tr style="background-color:#FFF">
            <td align="center" style="height: 5%;"></td>
            <td align="center" style="height: 5%;"> <br><br><br><br> TB Amanah</td>
        </tr>
    </table>
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
    $html2pdf->Output('laporanbarangmasuk.pdf');
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>