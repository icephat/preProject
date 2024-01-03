<?php


require_once 'departmentFunction.php';
require_once 'programFunction.php';
require_once 'teacherFunction.php';
require_once 'schoolFunction.php';
require_once 'termSummaryFunction.php';
require_once 'regisFunction.php';


function getStudentByUsername($studentUsername)
{
    require("connection_connect.php");

    $sql = "SELECT * FROM student NATURAL JOIN fact_student NATURAL JOIN studentstatus WHERE studentUsername = '" . $studentUsername . "'";

    $result = $conn->query($sql);
    $student = $result->fetch_assoc();

    $student["teacher"] = getTeacherById($student["teacherId"]);
    $student["program"] = getProgramById($student["programId"]);
    $student["department"] = getDepartmentById($student["departmentId"]);
    $student["school"] = getSchoolById($student["schoolId"]);
    $student["terms"] = getTermSummaryListByStudentId($student["studentId"]);
    $student["gpax"] = getGPAX($student["studentId"]);

    require("connection_close.php");

    return $student;

}

function getStudentByStudentId($studentId)
{
    require("connection_connect.php");

    $sql = "SELECT * FROM student NATURAL JOIN fact_student NATURAL JOIN studentstatus WHERE $studentId = '" . $studentId . "'";

    $result = $conn->query($sql);
    $student = $result->fetch_assoc();

    $student["teacher"] = getTeacherById($student["teacherId"]);
    $student["program"] = getProgramById($student["programId"]);
    $student["department"] = getDepartmentById($student["departmentId"]);
    $student["school"] = getSchoolById($student["schoolId"]);

    require("connection_close.php");

    return $student;

}

function getGPAX($studentId){

    $regisAllList = getListRegisByStudentId($studentId);

    require("connection_connect.php");

    $sumCreditAll = 0;
    $sumGradeCreditAll = 0.0;

    foreach ($regisAllList as $regis) {
        //echo print_r($regis)."<br>";

        $sumGradeCreditAll += $regis["gradeNumber"] * $regis["credit"];
        $sumCreditAll += $regis["credit"];


    }

    $gpaAll = intval((($sumGradeCreditAll / $sumCreditAll) * 1000)) / 1000;



    require("connection_close.php");
    
    return $gpaAll;
}



?>