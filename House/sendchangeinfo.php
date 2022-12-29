<?php
session_start();
include("./connection/connection.php");

if (isset($_SESSION['anotherid'])) {
	if($_POST['name']!= ""){
		$x = explode(" ", $_POST['name']);
		$name = $x[0];
		$surname = $x[1];
		$sql = "UPDATE `detail` SET `name` = '".$name."', `surname` = '".$surname."' WHERE `id` = '".$_SESSION['anotherid']."'";
		$result = $conn->query($sql);
	}

	if ($_POST['title'] != "") {
		$sql = "UPDATE `detail` SET `title` = '".$_POST['title']."' WHERE `id` = '".$_SESSION['anotherid']."'";
		$result = $conn->query($sql);
	}

	if ($_POST['gender'] != "") {
		$sql = "UPDATE `detail` SET `gender` = '".$_POST['gender']."' WHERE `id` = '".$_SESSION['anotherid']."'";
		$result = $conn->query($sql);
	}

	if ($_POST['age'] != "") {
		$sql = "UPDATE `detail` SET `old` = '".$_POST['age']."' WHERE `id` = '".$_SESSION['anotherid']."'";
		$result = $conn->query($sql);
	}	
}else{
	if($_POST['name']!= ""){
		$x = explode(" ", $_POST['name']);
		$name = $x[0];
		$surname = $x[1];
		$sql = "UPDATE `detail` SET `name` = '".$name."', `surname` = '".$surname."' WHERE `id` = '".$_SESSION['id']."'";
		$result = $conn->query($sql);
	}

	if ($_POST['title'] != "") {
		$sql = "UPDATE `detail` SET `title` = '".$_POST['title']."' WHERE `id` = '".$_SESSION['id']."'";
		$result = $conn->query($sql);
	}

	if ($_POST['gender'] != "") {
		$sql = "UPDATE `detail` SET `gender` = '".$_POST['gender']."' WHERE `id` = '".$_SESSION['id']."'";
		$result = $conn->query($sql);
	}

	if ($_POST['age'] != "") {
		$sql = "UPDATE `detail` SET `old` = '".$_POST['age']."' WHERE `id` = '".$_SESSION['id']."'";
		$result = $conn->query($sql);
	}
}

unset($_SESSION['anotherid']);
header("location:home.php");
?>