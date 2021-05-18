<?php
// Cek sudah Login/belum
if (!isset($_SESSION['username'])) {
  echo "<script language='javascript'>location.replace('login.php')</script>";
} else {
}
