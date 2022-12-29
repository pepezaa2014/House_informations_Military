<?php
session_start();
include("./connection/connection.php");

if($_POST['id']!=""){
	$sql = "SELECT * FROM `detail` WHERE `id` = '".$_POST['id']."' ";
	$result = $conn->query($sql);
	$data = mysqli_fetch_array($result);
	$numrow = mysqli_num_rows($result);

	if ($numrow == 1) {
		$_SESSION['C1'] = 1;
		$_SESSION['C2'] = $data['house_num'];
	}else{
		$_SESSION['C1'] = 0;
	}
	
}else if ($_POST['name'] != "") {
	$x = explode(" ", $_POST['name']);
	$name = $x[0];
	$surname = $x[1];
	$sql = "SELECT * FROM `detail` WHERE `name` = '".$name."' AND `surname` = '".$surname."' ";
	$result = $conn->query($sql);
	$data = mysqli_fetch_array($result);
	$numrow = mysqli_num_rows($result);

	if ($numrow == 1) {
		$_SESSION['C1'] = 1;
		$_SESSION['C2'] = $data['house_num'];
	}else{
		$_SESSION['C1'] = 0;
	}
}else{
	$_SESSION['C1'] = 0;
}
header("location:showinfo.php");
?>