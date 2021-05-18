<?php 
session_start();
ob_start();
include 'koneksi.php';
include 'fungsi/cek_login.php';
include 'fungsi/cek_session.php';

include '../anggota/fungsi/tanggal_indo.php';

$taw   = mysqli_real_escape_string($conn, $_POST['tanggal_awal']);
$tak   = mysqli_real_escape_string($conn, $_POST['tanggal_akhir']);


$taw2   = date('d/m/Y', strtotime($taw));
$tak2   =  date('d/m/Y', strtotime($tak));
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Bagian halaman HTML yang akan konvert -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <title>Komisi IV Fraksi Partai Gerindra DPR RI</title>

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
            width: 105%;
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
<p align="center"> <img src="../anggota/images/logodpr.png" alt="" style="width:60px
    ; margin-right:5px"> <img src="../anggota/images/gerindra.png" alt="" style="width:50px
    ;"> </p>
    <h4 align="center"><strong> LAPORAN PUBLIKASI MEDIA ANGGOTA FRAKSI</strong></h4> 
    <p align="center"> PER TANGGAL: <?= $taw2 ?> - <?= $tak2 ?> </p>
    <hr>
    <p align="left" ><strong>G.BUDISATRIO DJIWANDONO </strong></p>
    <table class="tabel2" border="1" cellspacing="1" cellpadding="1">
    <tr style="background-color:#D7C179; color:#323639">
            <col width="5">
            <th  align="center">No</th>
            <col width="120">
            <th  align="center">Tanggal </th>
            <col width="155">
            <th  align="center">Nama Media</th>
            <col width="210">
            <th  align="center">Judul Berita</th>
            <col width="110">
            <th  align="center">Foto Berita</th>
        </tr>

        <?php
        $no = 1;
            $query1 = mysqli_query($conn, "SELECT * FROM tb_publikasi a JOIN tb_anggota b ON a.id_anggota = b.id_anggota 
            WHERE a.id_anggota  = 'A127' AND  waktu BETWEEN '$taw' AND '$tak' 
            ORDER BY waktu ASC");
            
        $hasil1  = mysqli_num_rows($query1);
            while ($data = mysqli_fetch_assoc($query1)) {
                $id   = $data['id_publikasi'];
                $nm   = $data['nama_media'];
                $na   = $data['nama_anggota'];
                $jb   = $data['judul_berita'];
                $lb   = $data['link_berita'];
                $gbr  = $data['foto_berita'];
                 $wkt  = tgl_indo($data['waktu']);
                ?>
                <tr>
                <td align="center"><?= $no++ ?></td>     
                <td align="center"><?= $wkt ?></td>
                <td align="center"><?= $nm ?></td>
                <td align="left"><?= $jb ?></td>
                <td align="center"><img src="../anggota/img/publikasi/<?= $gbr ?>" alt="" width="110" height="110" class="p-1"></td>
            </tr>
            <?php } ?>
            <?php if($hasil1 == 0){
             echo "<tr><td align='center' colspan='5'>belum ada data </td>
             </tr>";
            }
            ?>
    </table>
    <br>
    <br>
    <br>
  
    <p align="left" ><strong> IR.KRT.H. DARORI WONODIPURO, MM.IPU </strong></p>
    <table class="tabel2" border="1" cellspacing="1" cellpadding="1">
    <tr style="background-color:#D7C179; color:#323639">
            <col width="5">
            <th  align="center">No</th>
            <col width="120">
            <th  align="center">Tanggal </th>
            <col width="155">
            <th  align="center">Nama Media</th>
            <col width="210">
            <th  align="center">Judul Berita</th>
            <col width="110">
            <th  align="center">Foto Berita</th>
        </tr>

        <?php
        $no = 1;
            $query2 = mysqli_query($conn, "SELECT * FROM tb_publikasi a JOIN tb_anggota b ON a.id_anggota = b.id_anggota 
            WHERE a.id_anggota  = 'A101' AND  waktu BETWEEN '$taw' AND '$tak' 
            ORDER BY waktu ASC");
            
            $hasil2  = mysqli_num_rows($query2);
            while ($data = mysqli_fetch_assoc($query2)) {
                $id   = $data['id_publikasi'];
                $nm   = $data['nama_media'];
                $na   = $data['nama_anggota'];
                $jb   = $data['judul_berita'];
                $lb   = $data['link_berita'];
                $gbr  = $data['foto_berita'];
                $wkt  = tgl_indo($data['waktu']);
                ?>
                  <tr>
                <td align="center"><?= $no++ ?></td>
                <td align="center"><?= $wkt ?></td>
                <td align="center"><?= $nm ?></td>
                <td align="left"><?= $jb ?></td>
                <td align="center"><img src="../anggota/img/publikasi/<?= $gbr ?>" alt="" width="110" height="110" class="p-1"></td>
            </tr>
            <?php } ?>
            <?php if($hasil2 == 0){
             echo "<tr><td align='center' colspan='5'>belum ada data </td>
             </tr>";
            }
            ?>
    </table>
    <br>
    <br>
    <br>

    <p align="left" ><strong> DR.H.AZIKIN SOLTHAN, M.SI  </strong></p>
    <table class="tabel2" border="1" cellspacing="1" cellpadding="1">
    <tr style="background-color:#D7C179; color:#323639">
            <col width="5">
            <th  align="center">No</th>
            <col width="120">
            <th  align="center">Tanggal </th>
            <col width="155">
            <th  align="center">Nama Media</th>
            <col width="210">
            <th  align="center">Judul Berita</th>
            <col width="110">
            <th  align="center">Foto Berita</th>
        </tr>

        <?php
        $no = 1;
            $query3 = mysqli_query($conn, "SELECT * FROM tb_publikasi a JOIN tb_anggota b ON a.id_anggota = b.id_anggota 
            WHERE a.id_anggota  = 'A129' AND waktu BETWEEN '$taw' AND '$tak' 
            ORDER BY waktu ASC");
            
            $hasil3  = mysqli_num_rows($query3);
            while ($data = mysqli_fetch_assoc($query3)) {
                $id   = $data['id_publikasi'];
                $nm   = $data['nama_media'];
                $na   = $data['nama_anggota'];
                $jb   = $data['judul_berita'];
                $lb   = $data['link_berita'];
                $gbr  = $data['foto_berita'];
                $wkt  = tgl_indo($data['waktu']);
                ?>
                <tr>
                <td align="center"><?= $no++ ?></td>
                <td align="center"><?= $wkt ?></td>
                <td align="center"><?= $nm ?></td>
                <td align="left"><?= $jb ?></td>
                <td align="center"><img src="../anggota/img/publikasi/<?= $gbr ?>" alt="" width="110" height="110" class="p-1"></td>
            </tr>
            <?php } ?>
            <?php if($hasil3 == 0){
             echo "<tr><td align='center' colspan='5'>belum ada data </td>
             </tr>";
            }
            ?>
    </table>
   <br>
    <br>
    <br>
  
    <p align="left" ><strong> DR.IR. HJ. ENDANG SETYAWATI THOHARI, DESS, M.SC  </strong></p>
    <table class="tabel2" border="1" cellspacing="1" cellpadding="1">
    <tr style="background-color:#D7C179; color:#323639">
            <col width="5">
            <th  align="center">No</th>
            <col width="120">
            <th  align="center">Tanggal </th>
            <col width="155">
            <th  align="center">Nama Media</th>
            <col width="210">
            <th  align="center">Judul Berita</th>
            <col width="110">
            <th  align="center">Foto Berita</th>
        </tr>

        <?php
        $no = 1;
            $query4 = mysqli_query($conn, "SELECT * FROM tb_publikasi a JOIN tb_anggota b ON a.id_anggota = b.id_anggota 
            WHERE a.id_anggota  = 'A104' AND  waktu BETWEEN '$taw' AND '$tak' 
            ORDER BY waktu ASC");
            
           $hasil4  = mysqli_num_rows($query4);
            while ($data = mysqli_fetch_assoc($query4)) {
                $id   = $data['id_publikasi'];
                $nm   = $data['nama_media'];
                $na   = $data['nama_anggota'];
                $jb   = $data['judul_berita'];
                $lb   = $data['link_berita'];
                $gbr  = $data['foto_berita'];
                 $wkt  = tgl_indo($data['waktu']);
                ?>
                <tr>
                <td align="center"><?= $no++ ?></td>
                
                <td align="center"><?= $wkt ?></td>
                <td align="center"><?= $nm ?></td>
                <td align="left"><?= $jb ?></td>
                <td align="center"><img src="../anggota/img/publikasi/<?= $gbr ?>" alt="" width="110" height="110" class="p-1"></td>
            </tr>
            <?php } ?>
            <?php if($hasil4 == 0){
             echo "<tr><td align='center' colspan='5'>belum ada data </td>
             </tr>";
            }
            ?>
    </table>
    <br>
    <br>
    <br>

    <p align="left" ><strong>IR. ENDRO HERMONO, M.B.A  </strong></p>
    <table class="tabel2" border="1" cellspacing="1" cellpadding="1">
    <tr style="background-color:#D7C179; color:#323639">
            <col width="5">
            <th  align="center">No</th>
            <col width="120">
            <th  align="center">Tanggal </th>
            <col width="155">
            <th  align="center">Nama Media</th>
            <col width="210">
            <th  align="center">Judul Berita</th>
            <col width="110">
            <th  align="center">Foto Berita</th>
        </tr>

        <?php
        $no = 1;
            $query5 = mysqli_query($conn, "SELECT * FROM tb_publikasi a JOIN tb_anggota b ON a.id_anggota = b.id_anggota 
            WHERE a.id_anggota  = 'A111' AND  waktu BETWEEN '$taw' AND '$tak' 
            ORDER BY waktu ASC");
            
            $hasil5  = mysqli_num_rows($query5);
            while ($data = mysqli_fetch_assoc($query5)) {
                $id   = $data['id_publikasi'];
                $nm   = $data['nama_media'];
                $na   = $data['nama_anggota'];
                $jb   = $data['judul_berita'];
                $lb   = $data['link_berita'];
                $gbr  = $data['foto_berita'];
                $wkt  = tgl_indo($data['waktu']);
                ?>
                <tr>
                <td align="center"><?= $no++ ?></td>    
                <td align="center"><?= $wkt ?></td>
                <td align="center"><?= $nm ?></td>
                <td align="left"><?= $jb ?></td>
                <td align="center"><img src="../anggota/img/publikasi/<?= $gbr ?>" alt="" width="110" height="110" class="p-1"></td>
            </tr>
            <?php } ?>
            <?php if($hasil5 == 0){
             echo "<tr><td align='center' colspan='5'>belum ada data </td>
             </tr>";
            }
            ?>
    </table>
    <br>
    <br>
    <br>

    <p align="left" ><strong> IR. H. T.A. KHALID, MM </strong></p>
    <table class="tabel2" border="1" cellspacing="1" cellpadding="1">
    <tr style="background-color:#D7C179; color:#323639">
            <col width="5">
            <th  align="center">No</th>
            <col width="120">
            <th  align="center">Tanggal </th>
            <col width="155">
            <th  align="center">Nama Media</th>
            <col width="210">
            <th  align="center">Judul Berita</th>
            <col width="110">
            <th  align="center">Foto Berita</th>
        </tr>

        <?php
        $no = 1;
            $query6 = mysqli_query($conn, "SELECT * FROM tb_publikasi a JOIN tb_anggota b ON a.id_anggota = b.id_anggota 
            WHERE a.id_anggota  = 'A60' AND  waktu BETWEEN '$taw' AND '$tak' 
            ORDER BY waktu ASC");

            $hasil6  = mysqli_num_rows($query6);
            while ($data = mysqli_fetch_assoc($query6)) {
                $id   = $data['id_publikasi'];
                $nm   = $data['nama_media'];
                $na   = $data['nama_anggota'];
                $jb   = $data['judul_berita'];
                $lb   = $data['link_berita'];
                $gbr  = $data['foto_berita'];
                 $wkt  = tgl_indo($data['waktu']);
                ?>
                <tr>
                <td align="center"><?= $no++ ?></td>
                <td align="center"><?= $wkt ?></td>
                <td align="center"><?= $nm ?></td>
                <td align="left"><?= $jb ?></td>
                <td align="center"><img src="../anggota/img/publikasi/<?= $gbr ?>" alt="" width="110" height="110" class="p-1"></td>
            </tr>
            <?php } ?>
            <?php if($hasil6 == 0){
             echo "<tr><td align='center' colspan='5'>belum ada data </td>
             </tr>";
            }
            ?>
    </table>
    <br>
    <br>
    <br>

    <p align="left" ><strong>  RENNY ASTUTI, SH. SPN   </strong></p>
    <table class="tabel2" border="1" cellspacing="1" cellpadding="1">
        <tr style="background-color:#D7C179; color:#323639">
            <col width="5">
            <th  align="center">No</th>
            <col width="120">
            <th  align="center">Tanggal </th>
            <col width="155">
            <th  align="center">Nama Media</th>
            <col width="210">
            <th  align="center">Judul Berita</th>
            <col width="110">
            <th  align="center">Foto Berita</th>
        </tr>

        <?php
        $no = 1;
            $query7 = mysqli_query($conn, "SELECT * FROM tb_publikasi a JOIN tb_anggota b ON a.id_anggota = b.id_anggota 
            WHERE a.id_anggota  = 'A71' AND  waktu BETWEEN '$taw' AND '$tak' 
            ORDER BY waktu ASC");
            
        $hasil7  = mysqli_num_rows($query7);
            while ($data = mysqli_fetch_assoc($query7)) {
                $id   = $data['id_publikasi'];
                $nm   = $data['nama_media'];
                $na   = $data['nama_anggota'];
                $jb   = $data['judul_berita'];
                $lb   = $data['link_berita'];
                $gbr  = $data['foto_berita'];
                 $wkt  = tgl_indo($data['waktu']);
                ?>
                <tr>
                <td align="center"><?= $no++ ?></td>
                
                <td align="center"><?= $wkt ?></td>
                <td align="center"><?= $nm ?></td>
                <td align="left"><?= $jb ?></td>
                <td align="center"><img src="../anggota/img/publikasi/<?= $gbr ?>" alt="" width="110" height="110" class="p-1"></td>
            </tr>
            <?php } ?>
            <?php if($hasil7 == 0){
             echo "<tr><td align='center' colspan='5'>belum ada data </td>
             </tr>";
            }
            ?>
    </table>
    <br>
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
    $html2pdf->Output('laporanmedia.pdf');
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>