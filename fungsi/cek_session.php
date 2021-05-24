<?php
if (isset($_SESSION['username'])) {
	$sesen_id		  = $_SESSION['id_user'];
	$sesen_nama       = $_SESSION['nama'];
	$sesen_username   = $_SESSION['username'];
	$sesen_hak_akses    = $_SESSION['hak_akses'];
}
