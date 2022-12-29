<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<!-- 	<link rel="stylesheet" type="text/css" href="./css/all.css"> -->
	<link rel="stylesheet" type="text/css" href="./css/loginbox.css">
	<link rel="stylesheet" type="text/css" href="./css/navbar.css">
	<link rel="icon" href="./img/favicon.ico" type="image/x-icon">
	<?php include("./connection/connection.php");
	session_start();
	session_destroy();
	?>

</head>
<body>

<div class="box-form">
	<div class="left">
		<div class="overlay">
		<h1>IM Camp</h1>
		<p>House informations in military camp.</p>
		</div>
	</div>
	
		<div class="right">
		<h5>เข้าสู่ระบบ</h5>
		<div>
			<form action="checkuser.php" method="post">
				<input type="text" name="id" placeholder="เลขประจำตัวประชาชน . . ."><br>
				<input type="password" name="password" placeholder="รหัสผ่าน . . .">
				<input type="submit" value="ยืนยัน">
			</form>
		</div>
			
</div>






<!-- 	<div class="container">
		<img src="./img/ff.jpg">
		<div class="loginbox">
			<h3>เข้าสู่ระบบ</h3>
			<hr>
			<form action="checkuser.php" method="post">
				<p>เลขบัตรประชาชน</p>
				<input type="text" name="id" placeholder="Id . . ." autofocus=""><br>
				<p>รหัสผ่าน</p>
				<input type="password" name="password" placeholder="Password . . ."><br>
				<input type="submit" value="ยืนยัน">
			</form>
		</div>
	</div> -->

</body>
</html>