<!DOCTYPE html>

<?php
include 'koneksi.php';
?>


<html lang="en">
    
            <!-- Header--> 
    <?php include 'komponen/header.php'; ?>

    <body>
        <div class="d-flex" id="wrapper" >
          
            <!-- Sidebar-->    
         <?php include 'komponen/sidebar.php'; ?>


         <div id="page-content-wrapper">

            <!-- Navbar -->
         <?php include 'komponen/navbar.php'; ?>
            
              
<!-- KONTEN HEADER PEMILIK -->


          <!-- Konten admin -->
          <?php 
          if($sesen_hak_akses == 'superadmin') {
            include 'contenadmin.php'; }
            ?>

          <!-- konten bag.gudang -->

          <?php 
          if($sesen_hak_akses == 'admin gudang') {
            include 'contenadmingudang.php'; }
            ?>

          <!-- konten pemilik -->
          <?php 
          if($sesen_hak_akses == 'pemilik') {
            include 'contenpemilik.php'; }
            ?>

                    
        <!-- Bootstrap core JS-->

        
      <?php include 'komponen/footer.php'; ?>

      </div>
        </div>