<?php

function getCourseById($id)
{

    require("connection_connect.php");

    $sql = "SELECT * FROM course WHERE courseId = " . $id ;

    $result = $conn->query($sql);
    $course = $result->fetch_assoc();


    require("connection_close.php");


    return $course;

}

function getSubjectGroupCreditCourseByNameCourseAndPlanAndStudyYearAndPart($name,$plan,$year,$part)
{

    require("connection_connect.php");

    $sql = "SELECT subjectGroup,SUM(credit) as credit
    FROM courselist
    WHERE courseName = '".$name."' AND coursePlan = '".$plan."' AND studyYear <= ".$year." AND term <= ".$part."
    GROUP BY subjectGroup";

    $result = $conn->query($sql);

    $courseCredits = [];

    while ($my_row = $result->fetch_assoc()) {
        $courseCredits[] = $my_row;
    }


    require("connection_close.php");


    return $courseCredits;

}

function getSubjectGroupCreditTermOneCourseByNameCourseAndPlanAndStudyYearAndPart($name,$plan,$year,$part)
{

    require("connection_connect.php");

    $yearX = $year -1;
    $termX = $part + 1;

    $sql = "SELECT subjectGroup,SUM(credit) AS credit
    FROM (SELECT studyYear,term,subjectGroup,SUM(credit) AS credit
    FROM courselist
    WHERE courseName = '".$name."' AND coursePlan = '".$plan."' AND studyYear <= ".$yearX." AND term <= ".$termX."
    GROUP BY studyYear,term,subjectGroup
    UNION
    SELECT studyYear,term,subjectGroup,SUM(credit) as credit
    FROM courselist
    WHERE courseName = '".$name."' AND coursePlan = '".$plan."' AND studyYear = ".$year." AND term = ".$part."
    GROUP BY subjectGroup,studyYear,term) AS A
    GROUP BY subjectGroup;";

    $result = $conn->query($sql);

    $courseCredits = [];

    while ($my_row = $result->fetch_assoc()) {
        $courseCredits[] = $my_row;
    }


    require("connection_close.php");


    return $courseCredits;

}


function getCourseByDepartmentId($departmentId)
{

    require("connection_connect.php");



    $sql = "SELECT courseId,nameCourseTh,nameCourseUse,planCourse
    FROM course
    WHERE departmentId = ".$departmentId;

    $result = $conn->query($sql);

    $course = [];

    while ($my_row = $result->fetch_assoc()) {
        $course[] = $my_row;
    }


    require("connection_close.php");


    return $course;

}

?>