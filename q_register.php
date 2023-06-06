<?php 
include 'server/config.php';

$nama = "";
$email = "";
$password = "";

$nama = $_POST['nama'];
$email = $_POST['email'];
$pwd = $_POST['password'];
$password = MD5($pwd);

$sql = "INSERT INTO user (nama,email,password) VALUES ('$nama','$email','$password')";
$result = mysqli_query($conn,$sql);
if ($result) {
	header("Location: login.php");
}else{
	header("Location: register.php");
	echo "error : ".$sql;
}
