<?php
session_start();
include("./connection/connection.php");

if(isset($_POST['submit']))
{
	$sql = "SELECT * FROM `detail` WHERE `id` = '".$_SESSION['id']."'";
	$result = $conn->query($sql);
	$data = mysqli_fetch_array($result);

	$imgname=$_FILES['Image']['name'];
	echo '<br>';
	$extension = pathinfo($imgname,PATHINFO_EXTENSION);

	$rename= $data['id'];

	$newname=$rename.'.'.$extension;

    $filename=$_FILES['Image']['tmp_name'];

	if(move_uploaded_file($filename, './img/profile/'.$newname))
	{
		$w = "UPDATE `detail` SET `picture`= '".$newname."' WHERE `id` = '".$_SESSION['id']."' ";
		$send = $conn->query($w);
		echo "uploaded";
	}
	else
	{
		echo "not uploaded";
	}
	header("location:changeprofile.php");
}

?>