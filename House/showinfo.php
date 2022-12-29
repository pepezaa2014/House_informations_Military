<!DOCTYPE html>
<html>
<head>
	<title>House details</title>
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
		<?php if(isset($_SESSION['C1'])){
			if ($_SESSION['C1'] == 1) {
			 	$sql = "SELECT * FROM `detail` WHERE `house_num` = '".$_SESSION['C2']."'";
				$result = $conn->query($sql);
				$numrow = mysqli_num_rows($result);

				$sql1 = "SELECT * FROM `qrcode` WHERE `house_number` = '".$_SESSION['C2']."'";
				$result1 = $conn->query($sql1);
				$data = mysqli_fetch_array($result1);

				echo "<center><div class='inside'><img src='./img/house/" . $data['house_pic'] . "'></div></center>";

				echo "<div><center><form action='clearc.php'><input type='submit' value='🔍ค้นหาใหม่' class='tt'></form></center></div>";

				echo "<h1>บ้านเลขที่ : ". $_SESSION['C2'] ."</h1>";
				echo "<h2>จำนวนผู้พักอาศัย : ". $numrow . " คน</h2>";

				while ($row = mysqli_fetch_array($result)) {
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
						echo "</div>";
					echo "</div>";
		}
			 }else{
			 	echo "<div class='loginbox'><form action='clearc.php'>";
				 	echo "<h1>ไม่พบข้อมูลในระบบ <br>กรุณาค้นหาใหม่อีกครั้ง</h1>";
				 	echo "<input type='submit' value='กลับไปค้นหาใหม่อีกครั้ง' style='font-size: 18px;'>";
			 	echo "</form></div>";
			 }
		}else{ ?>
		<div class="loginbox">
			<form action="checkinfo.php" method="post" action="checkinfo.php">
				<p>หมายเลขประจำตัวประชาชน</p>
				<input type="text" name="id" placeholder="Id . . .">
				<p style="color: red;">หรือ</p> <p>ชื่อ - นามสกุล</p>
				<input type="text" name="name" placeholder="Name - Surname . . .">
				<input type="submit" value="ยืนยัน">
			</form>
			<?php
		}
		?>
	</div>
	

</body>
</html>