<?php
include 'config.php';

$act=$_GET['act'];

if ($act=='delete'){
	$id_orang=$_GET['id_orang'];
	$row = mysqli_query($koneksi, "DELETE FROM orang WHERE id_orang = '$id_orang'");
	header('location:orang.php');
}


elseif ($act=='input'){
	$nama_orang = $_POST["nama_orang"];
	$jenis_kelamin = $_POST["jenis_kelamin"];

	$sql = "INSERT INTO orang VALUES ('','$nama_orang','$jenis_kelamin')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
	header('location:orang.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$id_orang =$_POST["id_orang"];
	$nama_orang = $_POST["nama_orang"];
	$jenis_kelamin = $_POST["jenis_kelamin"];

	$sql = "UPDATE orang SET nama_orang='$nama_orang', jenis_kelamin='$jenis_kelamin' WHERE id_orang='$id_orang'";

	if(mysqli_query($koneksi, $sql)){
		mysqli_close($koneksi);
		header('location:orang.php');
	}
	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

}
?>
