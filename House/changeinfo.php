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
	if (isset($_REQUEST['CC'])) {
		echo "<div class='bigbox'>";
			$sql = "SELECT * FROM `detail` WHERE `id` = '".$_REQUEST['CC']."' ";
			$result = $conn->query($sql);
			$data = mysqli_fetch_array($result);
			echo "<h3>คุณ : ".$data['id']."</h3>";
			echo "<img src='./img/profile/" . $data['picture'] . "'>";
			$_SESSION['anotherid'] = $data['id'];
			?>
			
			<form action="sendchangeinfo.php" method="post">
				<p>คำนำหน้าชื่อ</p>
				<input type="text" name="title"><br>
				<p>ชื่อ - สกุล</p>
				<input type="text" name="name"><br>
				<p>เพศ</p>
				<select name="gender" id="gender">
					<option value="">Select Gender</option>
					<option value="ชาย">ชาย</option>
					<option value="หญิง">หญิง</option>
				</select><br>
				<p>อายุ</p>
				<input type="number" name="age"><br>
				<input type="submit" value="ยืนยัน">
			</form>
		</div>
		<?php
	}else{
		?>
		<div class="bigbox">
			<h2>You</h2>
			<?php
			$sql = "SELECT * FROM `detail` WHERE `id` = '".$_SESSION['id']."' ";
			$result = $conn->query($sql);
			$data = mysqli_fetch_array($result);
			echo "<img src='./img/profile/" . $data['picture'] . "'>"; 
			?>
			
			<form action="sendchangeinfo.php" method="post">
				<p>คำนำหน้าชื่อ</p>
				<input type="text" name="title"><br>
				<p>ชื่อ - สกุล</p>
				<input type="text" name="name"><br>
				<p>เพศ</p>
				<select name="gender" id="gender">
					<option value="">Select Gender</option>
					<option value="ชาย">ชาย</option>
					<option value="หญิง">หญิง</option>
				</select><br>
				<p>อายุ</p>
				<input type="number" name="age"><br>
				<input type="submit" value="ยืนยัน">
			</form>
			
		</div>
		<?php
	}
		?>
	
</body>
</html>