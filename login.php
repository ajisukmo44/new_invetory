<!DOCTYPE html>
<html lang="en">
<?php session_start();
// Cek sudah Login/belum
if (isset($_SESSION['username'])) {
  header("location:index.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login TB.Amanah</title>
    <link rel="stylesheet" href="libraries/bootstrap/css/bootstrap44.css">
    <link rel="stylesheet" href="libraries/gijgo-master/dist/combined/css/gijgo.min.css">
    
    <link rel="stylesheet" href="styles/main59.css">
    
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/logo.ico"/>
<style>
.form-control:focus {
  border-color: #FEC625;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.045), 0 0 4px rgba(255, 0, 0, 0.3);
  transitions:0.5s;
}
</style>
</head>

<body>
    <!-- main -->
    <main class="login-container">
        <div class="container" >
            <div class="row page-login d-flex align-items-center " >
                <div class="section-left col-12 col-md-6" >
                    <h2 class="mb-4 text-left d-none d-md-block">
                       <b>TB. AMANAH </b>- GUNUNG KIDUL
                    </h2>
                    <h6 class="mb-0 text-left d-md-none">
                       <b>TB. AMANAH </b> - GUNUNG KIDUL
                    </h6>
                    <img src="images/amanah.jpg" class="w-75 d-none d-sm-flex" alt="" />
                </div>
                <div class="section-right col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                               <h2> <b>FORM</b> LOGIN </h2>
                               <hr>
                            </div>
                            <?php
                            if (isset($_GET['alert'])) {
                                if ($_GET['alert'] == "gagal") {
                                echo "<div class='alert alert-danger text-center'>Username atau Password salah!</div>";
                                } elseif ($_GET['alert'] == "tidakterdaftar") {
                                echo "<div class='alert alert-danger text-center'>Username Tidak Terdaftar!</div>";
                                }
                            }
                            ?>
                            <form action="aksi/login.php" method="post">
                                <div class="form-group">
                                    <label for="username"> Username </label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        aria-describedby="text" required />
                                </div>
                                <div class="form-group">
                                    <label for="password"> Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required />
                                </div>

                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" onclick="myFunction()">
                                    <label class="form-check-label" for="exampleCheck1">
                                        tampilkan </label>
                                </div>
                                <button type="submit" name="submit" class="btn btn-login btn-block mt-4">Masuk</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- end main -->
<script src="libraries/jquery/jquery-3.4.1.min.js"></script>
<script src="libraries/bootstrap/js/bootstrap.js"></script>
 <script>
    //password
    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    };
  </script>
</body>
</html>
