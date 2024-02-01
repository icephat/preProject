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

function getCountStudentStatusTatleSortByGeneretionAndYearStudyByDepartmentIdAndStatus($departmentId,$status)
{

    require("connection_connect.php");

    $yearStatus = [];

    $course = getCoursePresentByDepartmentId($departmentId)["nameCourseUse"];

    $sql = "SELECT studyGeneretion,COUNT(CASE WHEN semesterYear = couseStartYear THEN studentId END) AS one,COUNT(CASE WHEN semesterYear = couseStartYear+1 THEN studentId END) AS two,COUNT(CASE WHEN semesterYear = couseStartYear+2 THEN studentId END) AS three,COUNT(CASE WHEN semesterYear = couseStartYear+3 THEN studentId END) AS four,COUNT(CASE WHEN semesterYear = couseStartYear+4 THEN studentId END) AS five,COUNT(CASE WHEN semesterYear = couseStartYear+5 THEN studentId END) AS six,COUNT(CASE WHEN semesterYear = couseStartYear+6 THEN studentId END) AS seven,COUNT(CASE WHEN semesterYear = couseStartYear+7 THEN studentId END) AS eight,COUNT(CASE WHEN semesterYear = couseStartYear+8 THEN studentId END) AS nine,COUNT(CASE WHEN semesterYear = couseStartYear+9 THEN studentId END) AS ten,COUNT(CASE WHEN semesterYear = couseStartYear+10 THEN studentId END) AS eleven,COUNT(CASE WHEN semesterYear = couseStartYear+11 THEN studentId END) AS twelve
    FROM studentstatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId
    WHERE nameCourseUse = '$course' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId 
    WHERE nameCourseUse = '$course'  GROUP BY studentId,studyYear) AND status = '$status'
    GROUP BY studyGeneretion";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $yearStatus[] = $my_row;
    }



    require("connection_close.php");

    return $yearStatus;

}


?>