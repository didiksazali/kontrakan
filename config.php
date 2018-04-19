<?php
$host     = "localhost";
$user     = "root";
$password = "";
$database = "kontrakan";

$hari_ini = date("Y-m-d");
$prefix_id_pelanggan = "PR"; 
$prefix_kode_kamar_pria = "KMP"; 
$prefix_kode_kamar_wanita = "KMW";

$koneksi   = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno($koneksi)) {

   echo "Failed to connect to MySQL: " . mysqli_connect_error();

}
?>
