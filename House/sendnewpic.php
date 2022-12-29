<?php
session_start();
include("./connection/connection.php");

if(isset($_POST['submit']))
{
	$sql = "SELECT * FROM `qrcode` WHERE `house_number` = '".$_SESSION['house_num']."'";
	$result = $conn->query($sql);
	$data = mysqli_fetch_array($result);

	$imgname=$_FILES['Image']['name'];
	echo '<br>';
	$extension = pathinfo($imgname,PATHINFO_EXTENSION);

	$rename= $data['house_number'];

	$newname=$rename.'.'.$extension;

    $filename=$_FILES['Image']['tmp_name'];

	if(move_uploaded_file($filename, './img/house/'.$newname))
	{
		$w = "UPDATE `qrcode` SET `house_pic`= '".$newname."' WHERE `house_number` = '".$_SESSION['house_num']."' ";
		$send = $conn->query($w);
		echo "uploaded";
	}
	else
	{
		echo "not uploaded";
	}
	header("location:changehousepic.php");
}

?>