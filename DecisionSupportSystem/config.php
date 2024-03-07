<?php

session_start();


include_once 'function/teacherFunction.php';
//require_once 'function/studentFunction.php';

$_SESSION["system"] = "DecisionSupport";
// $_SESSION["access-user"] = "fengtps";
$_SESSION["access-user"] = "fengvry";
// $_SESSION["access-user"] = "b6320500654";
$username = $_SESSION["access-user"];





if (!is_null(getTeacherByUsernameTeacher($username))) {


    $teacher = getTeacherByUsernameTeacher($username);
    if ($teacher["facultyCheck"] == 0) {
        header('Location: ' . './teacher/home.php');
        exit();
    } elseif ($teacher["facultyCheck"] == 1) {
        header('Location: ' . './head/home.php');
        exit();
    }

} else {
    echo "เข้า";
    header('Location: ' . './student/home.php');
    exit();
}










?>