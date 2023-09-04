<?php
header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
include '../config/database.php';
$mysqli = connect();
session_start();
$user = $_POST['txtuser'];
$pass = $_POST['txtpass'];
// Check Login
$sql = "SELECT *
from fact_student fact_std
INNER JOIN teachers t on fact_std.`teacherid` = t.`teacherid`
 WHERE studentid = '" . $user . "'  ";
global $mysqli;
$res = $mysqli->query($sql);
$data = $res->fetch_assoc();

$sql2 = "SELECT * from teachers where teacherid = '" . $user . "'";
// global $mysqli;
$res2 = $mysqli->query($sql2);
$data_teacher = $res2->fetch_assoc();

if (isset($data['studentid'])) {
	$_SESSION['studentid'] = $data['studentid'];
	header("Location: ../std_home.php");
}
if (isset($data_teacher['teacherid'])) {
	$_SESSION['teacherid'] = $data_teacher['teacherid'];
	$_SESSION['type'] = $data_teacher['type'];
	if ($_SESSION['type'] == 'teacher') {
		header('Location: ../page/teacher_home.php');
	}
}
if (isset($data_teacher['teacherid'])) {
	$_SESSION['teacherid'] = $data_teacher['teacherid'];
	$_SESSION['type'] = $data_teacher['type'];
	if ($_SESSION['type'] == 'head_depart') {
		header('Location: ../page/teacher_homehead.php');
	}
}
if (isset($data_teacher['teacherid'])) {
	$_SESSION['teacherid'] = $data_teacher['teacherid'];
	$_SESSION['type'] = $data_teacher['type'];
	if ($_SESSION['type'] == 'dean') {
		header('Location: ../page/teacher_homedean.php');
	}
}
if (isset($data_teacher['teacherid'])) {
	$_SESSION['teacherid'] = $data_teacher['teacherid'];
	$_SESSION['type'] = $data_teacher['type'];
	if ($_SESSION['type'] == 'admin') {
		header('Location: ../page/admin_home.php');
	}
}
/*if ($_POST['txtuser'] == 'admin' && $_POST['txtpass'] == 'admin') {
	header('Location: ../page/admin_home.php'); // *********** edit path *************
} */
else {
	echo "
           <script type='text/javascript'>
               alert('เข้าสู่ระบบล้มเหลว');
               window.location='../login.php';
           </script>";
}
?>