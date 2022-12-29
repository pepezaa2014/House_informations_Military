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
			<?php
			$sql = "SELECT * FROM `detail` WHERE `house_num` = '".$_SESSION['house_num']."' ";
			$result = $conn->query($sql);

			while ($row = mysqli_fetch_array($result)) {
				if ($row['id'] != $_SESSION['id']) {
					echo "<div class='bigbox'>";
						echo "<img src='./img/profile/". $row['picture'] ."'>";
						echo "<p>";
						echo "<a href='changeinfo.php?CC=$row[0]' class='z'>เลือก</a>";
						echo "</p>";
					echo "</div>";
				}		
			} 
			?>
	
</body>
</html>