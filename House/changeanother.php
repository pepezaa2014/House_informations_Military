<!DOCTYPE html>
<html>
<head>
	<title>Change Infomations</title>
	<link rel="stylesheet" type="text/css" href="./css/all.css">
	<link rel="stylesheet" type="text/css" href="./css/navbar.css">
	<link rel="icon" href="./img/favicon.ico" type="image/x-icon">
	<?php include("./connection/connection.php"); 
	session_start();
	?>
</head>
<body>
	<ul>
		<li><a href="home.php">หน้าหลัก</a></li>
		<li><a class="active" href="changeinfo.php">แก้ไขข้อมูล</a></li>
		<li><a href="showinfo.php">ดูข้อมูลประชากรครัวเรือนอื่น</a></li>
		<li style="float: right;"><a href="index.php" class="logout">ออกจากระบบ</a></li>
		<li style="float: right;"><a class="id"><?php echo "หมายเลขประจำตัวประชาชน : " . $_SESSION['id']; ?></a></li>
	</ul>
		<div class="changeinfo">
			<form action="changehousepic.php"><input type="submit" value="แก้ไขรูปบ้านพัก" class="x"></form>
			<form action="changeprofile.php"><input type="submit" value="แก้ไขรูปประจำตัว" class="y"></form>
			<form action="changeanother2.php"><input type="submit" value="แก้ไขข้อมูลของสมาชิกคนอื่นในบ้านพักของตนเอง" class="x"></form>
		</div>
	
</body>
</html>