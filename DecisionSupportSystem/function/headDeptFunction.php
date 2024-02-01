<?php
include_once '../function/semesterFunction.php';
include_once '../function/studentFunction.php';
include_once '../function/courseFunction.php';

function getCountStudentStatusSortByGeneretionByDepartmentId($departmentId)
{

    require("connection_connect.php");

    $generetionStatus = [];

    $course = getCoursePresentByDepartmentId($departmentId)["nameCourseUse"];

    $sql = "SELECT studyGeneretion,COUNT(studentId) AS firstEntry,COUNT(CASE WHEN status = 'พ้นสภาพนิสิต' THEN status END) AS retire,COUNT(CASE WHEN status = 'กำลังศึกษา' THEN status END) AS study,COUNT(CASE WHEN status = 'จบการศึกษา' THEN status END) AS grad
    FROM studentstatus NATURAL JOIN fact_term_summary NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId
    WHERE nameCourseUse = '$course' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId WHERE nameCourseUse = '$course'  GROUP BY studentId)
    GROUP BY studyGeneretion";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $generetionStatus[] = $my_row;
    }



    require("connection_close.php");

    return $generetionStatus;

}

function getCountStudentStatusSortByYerByDepartmentId($departmentId)
{

    require("connection_connect.php");

    $yearStatus = [];

    $course = getCoursePresentByDepartmentId($departmentId)["nameCourseUse"];

    $sql = "SELECT semesterYear,COUNT(CASE WHEN tcasYear = semesterYear THEN studentId END) AS firstEntry,COUNT(CASE WHEN status = 'พ้นสภาพนิสิต' THEN status END) AS retire,COUNT(CASE WHEN status = 'กำลังศึกษา' THEN status END) AS study,COUNT(CASE WHEN status = 'จบการศึกษา' THEN status END) AS grad
    FROM studentstatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId
    WHERE nameCourseUse = '$course' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId WHERE nameCourseUse = '$course'  GROUP BY studentId,studyYear)
    GROUP BY semesterYear;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $yearStatus[] = $my_row;
    }



    require("connection_close.php");

    return $yearStatus;

}


?>