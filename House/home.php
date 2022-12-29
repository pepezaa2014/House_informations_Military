<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="./css/profilebox.css">
	<link rel="stylesheet" type="text/css" href="./css/all.css">
	<link rel="stylesheet" type="text/css" href="./css/navbar.css">
	<link rel="icon" href="./img/favicon.ico" type="image/x-icon">
	<?php include("./connection/connection.php");
	session_start();
	?>

</head>
<body>
	<ul>
		<li><a class="active" href="home.php">หน้าหลัก</a></li>
		<li class="dropdown">
			<a href="javascript:void(0)">แก้ไขข้อมูล</a>
			<div class="dropdown-content">
				<a href="changeinfo.php">แก้ไขข้อมูลส่วนตัว</a>
      			<a href="changehousepic.php">แก้ไขรูปบ้านพัก</a>
      			<a href="changeprofile.php">แก้ไขรูปประจำตัว</a>
      			<a href="changeanother2.php">แก้ไขข้อมูลของสมาชิกคนอื่นในบ้านพักของตนเอง</a>
			</div>
		</li>
		<li><a href="showinfo.php">ดูข้อมูลประชากรครัวเรือนอื่น</a></li>
		<li style="float: right;"><a href="index.php" class="logout">ออกจากระบบ</a></li>
		<li style="float: right;"><a class="id"><?php echo "หมายเลขประจำตัวประชาชน : " . $_SESSION['id']; ?></a></li>	
	</ul>

	

	<?php 
	$sql = "SELECT * FROM `detail` WHERE `house_num` = '".$_SESSION['house_num']."'";
	$result = $conn->query($sql);
	$numrow = mysqli_num_rows($result);

	$sql1 = "SELECT * FROM `qrcode` WHERE `house_number` = '".$_SESSION['house_num']."'";
	$result1 = $conn->query($sql1);
	$data = mysqli_fetch_array($result1);

	$sql2 = "SELECT * FROM `detail` WHERE `id` = '".$_SESSION['id']."'";
	$result2 = $conn->query($sql2);
	$me = mysqli_fetch_array($result2);

	echo "<center><div class='inside'><img src='./img/house/" . $data['house_pic'] . "'></div></center>";

	echo "<h1>บ้านเลขที่ : ". $_SESSION['house_num'] ."</h1>";
	echo "<h2>จำนวนผู้พักอาศัย : ". $numrow . " คน</h2><br>";

	echo "<div class='wrapper'>";
		echo "<div class='left'>";
 			echo "<img src='./img/profile/". $me['picture'] ."'>";
 			echo "<h4>". $me['title'] . " " . $me['name'] . " " .$me['surname'] ."</h4>";
 		echo "</div>";

 		echo "<div class='right'>";
			echo "<div class='info'>";
				echo "<h3>Information</h3>";
				echo "<div class='info_data'>";
					echo "<div class='data'>";
						echo "<h4>Age</h4>";
						echo "<p>". $me['old'] ." ปี</p>";
					echo "</div>";
					echo "<div class='data'>";
						echo "<h4>Gender</h4>";
						echo "<p>". $me['gender'] ."</p>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	echo "</div>";

	echo "<hr>";
	echo "<h5>ผู้พักอาศัยท่านอื่น</h5>";
	echo "<hr>";




	while ($row = mysqli_fetch_array($result)) {
		if ($row['id'] != $_SESSION['id']) {

			echo "<div class='wrapper'>";
				echo "<div class='left'>";
		 			echo "<img src='./img/profile/". $row['picture'] ."'>";
		 			echo "<h4>". $row['title'] . " " . $row['name'] . " " .$row['surname'] ."</h4>";
		 		echo "</div>";

		 		echo "<div class='right'>";
		 			echo "<div class='info'>";
						echo "<h3>Information</h3>";
						echo "<div class='info_data'>";
							echo "<div class='data'>";
								echo "<h4>Age</h4>";
								echo "<p>". $row['old'] . " ปี</p>";
							echo "</div>";
							echo "<div class='data'>";
								echo "<h4>Gender</h4>";
								echo "<p>".$row['gender'] ."</p>";
							echo "</div>";
						echo "</div>";
					echo "</div>";
					echo "<a href='changeinfo.php?CC=$row[0]' class='editdata'>แก้ไขข้อมูล</a>";
				echo "</div>";
			echo "</div>";
		}
		
	}

	?>
	
</body>
</html>