<?php
if (isset($_SESSION['username'])) {
	$sesen_id		  = $_SESSION['id_user'];
	$sesen_nama       = $_SESSION['nama'];
	$sesen_foto	      = $_SESSION['foto'];
	$sesen_username   = $_SESSION['username'];
	$sesen_jabatan    = $_SESSION['jabatan'];
}
