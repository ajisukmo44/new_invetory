<?php
session_start();
include 'koneksi.php';
include 'fungsi/cek_login.php';
include 'fungsi/cek_session.php';
include 'fungsi/tanggal_indo.php';
?>

<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TB. Amanah Gunung Kidul</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="images/logo.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="libraries/bootstrap/css/bootstrap44.css"> 
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles/main59.css">
        <script src="https://use.fontawesome.com/517c618f28.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    </head>
    <style>
      body{
        font-family: 'Roboto', sans-serif;
       
      }
    .btn{
     border-radius:4%;
 }
 .btn:hover{
   
  transition:all 0.8s;
 }
      .body{
        background: linear-gradient(#fff 0%, #f7f9ff 100%);
      }
         .btn-profil {
  border-radius: 4px;
  background-color: #E5A70F;
  color: #fff;
}

 .btn-profil:hover {
  background-color: #B62E27;
  color: #ffffff;
  -webkit-transition: 1s;
  transition: 1s;
}

.navbarx:hover{
  color: #C4151C;
  -webkit-transition: 1s;
  transition: 0.5s;
}

.navbarx{
  color: #191919;
}
        .nav-item .dropdown-item{
            font-family: 'Lato', sans-serif;
            color: #191919;
        }
        .nav-item:hover{
            color: #950000;
        }
        .dropdown-item:hover{
            background-color:rgba(0,139,139, 0.3)};

       .hover:hover{
          background-color:rgba(0,139,139, 0.2);
          transitions:0.7s;
          };  

       
 .dropdown-toggle::after {
    display: none;
  }
.text-decoration-none{
  text-decoration: none!important;
}
/* Font Awesome Icons have variable width. Added fixed width to fix that.*/
.icon-width { width: 2rem;}

.form-control:focus {
  border-color: #E5A70F;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.045), 0 0 4px rgba(255, 0, 0, 0.3);
  transitions:0.5s;
  border-radius:0%;
}
    </style>