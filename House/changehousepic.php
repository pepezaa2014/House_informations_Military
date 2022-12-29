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
		<div class="changepic">
			<?php
			$sql = "SELECT * FROM `qrcode` WHERE `house_number` = '".$_SESSION['house_num']."' ";
			$result = $conn->query($sql);
			$data = mysqli_fetch_array($result); 
			echo "<h3>รูปปัจจุบัน</h3>";
			echo "<img src='./img/house/" . $data['house_pic'] . "'>";
			?>
			<form action="sendnewpic.php" method="post" enctype="multipart/form-data">
				<input type="file" name="Image"><br>
				<input type="submit" value="ยืนยัน" name="submit">
			</form>
		</div>
	
</body>
</html>