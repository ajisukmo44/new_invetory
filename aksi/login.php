<?php session_start();
include "../koneksi.php";

if (isset($_POST['submit'])) {
    $errors   	= array();
    $username    = mysqli_real_escape_string($conn, $_POST['username']);
    $password 	= mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($ida) && empty($password)) {
        echo "<script language='javascript'>alert('Silahkan Isikan username dan PASSWORD'); location.replace('../login.php')</script>";
    } else  if (empty($username)) {
        echo "<script language='javascript'>alert('Isikan username'); location.replace('../login.php')</script>";
    } else if (empty($password)) {
        echo "<script language='javascript'>alert('Isikan PASSWORD'); location.replace('../login.php')</script>";
    }

    $sql    = "SELECT * FROM tb_user WHERE username = '$username' ";
    $result = mysqli_query($conn, $sql);
    $data   = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {
        if (password_verify($password, $data['password'])) {
            if (empty($errors)) {

                // Menyimpan session login
                
                $_SESSION['id_user']      = $data['id_user'];
                $_SESSION['username']     = $data['username'];
                $_SESSION['nama']         = $data['nama'];
                $_SESSION['hak_akses']    = $data['hak_akses'];

          echo "<script language='javascript'> location.replace('../index.php')</script>";
            }
        } else {

            header("location:../login.php?alert=gagal");
        }
    } else {
        header("location:../login.php?alert=tidakterdaftar");
    }
} else {
    echo "<script>alert('Pencet dulu tombolnya!');history.go(-1)</script>";
}
