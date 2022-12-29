<?php
session_start();
unset($_SESSION['C1']);
unset($_SESSION['C2']);
header("location:showinfo.php");
?>