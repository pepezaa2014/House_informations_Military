<?php
session_start();
include("./connection/connection.php");
$sql = "SELECT * FROM `user` WHERE `id` = '".$_POST['id']."' AND `password` = '".$_POST['password']."' ";
$result = $conn->query($sql);
$numrow = mysqli_num_rows($result);
$data = mysqli_fetch_array($result);

$sql1 = "SELECT * FROM `detail` WHERE `id` = '".$_POST['id']."' ";
$result1 = $conn->query($sql1);
$data1 = mysqli_fetch_array($result1);

if($numrow != 0){
	$_SESSION['id'] = $_POST['id'];
	$_SESSION['house_num'] = $data1['house_num'];
	header("location:home.php");
}else{
	$_SESSION['check'] = "N";
	header("location:index.php");	
}





?>