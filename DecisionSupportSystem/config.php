<?php

session_start();
$_SESSION["system"] = "DecisionSupport";
$_SESSION["access-user"] = "b6320500611";




header('Location: ' . './student/home.php');
exit();




?>