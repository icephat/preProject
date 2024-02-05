<?php
include_once '../function/semesterFunction.php';
include_once '../function/studentFunction.php';
include_once '../function/courseFunction.php';

function getCountStudentStatusSortByGeneretionByNameCourse($course)
{

    require("connection_connect.php");

    $generetionStatus = [];


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

function getCountStudentStatusSortByYearByNameCourse($course)
{

    require("connection_connect.php");

    $yearStatus = [];



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

function getCountStudentStatusTatleSortByGeneretionAndYearStudyByNameCourseIdAndStatus($course, $status)
{

    require("connection_connect.php");

    $yearStatus = [];

    //$course = getCoursePresentByDepartmentId($departmentId)["nameCourseUse"];

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

function getCountStudentGradeRangeByCourseNameAndSemesterYear($courseName, $semesterYear)
{

    require("connection_connect.php");

    $sql = "SELECT COUNT(CASE WHEN gpaStatusName = 'blue' THEN studentId END) AS blue,COUNT(CASE WHEN gpaStatusName = 'green' THEN studentId END) AS green,COUNT(CASE WHEN gpaStatusName = 'orange' THEN studentId END) AS orange,COUNT(CASE WHEN gpaStatusName = 'red' THEN studentId END) AS red
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId
    WHERE nameCourseUse = '$courseName' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId WHERE nameCourseUse = '$courseName' AND semesterYear <= $semesterYear   GROUP BY studentId);";

    $result = $conn->query($sql);
    $countRangeGrade = $result->fetch_assoc();


    require("connection_close.php");

    return $countRangeGrade;

}

function getCountStudentPlanStatusByCourseNameAndSemesterYear($courseName, $semesterYear)
{

    require("connection_connect.php");

    $sql = "SELECT COUNT(CASE WHEN planStatus = 'ตามแผน' THEN studentId END) AS plan,COUNT(CASE WHEN planStatus = 'ไม่ตามแผน' THEN studentId END) AS notPlan,COUNT(CASE WHEN planStatus = 'พ้นสภาพนิสิต' THEN studentId END) AS retire,COUNT(CASE WHEN planStatus = 'จบการศึกษา' THEN studentId END) AS grad
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId
    WHERE nameCourseUse = '$courseName' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId WHERE nameCourseUse = '$courseName' AND semesterYear <= $semesterYear   GROUP BY studentId);";

    $result = $conn->query($sql);
    $countPlanStatus = $result->fetch_assoc();


    require("connection_close.php");

    return $countPlanStatus;

}

function getCountStudentGradeRangeSortByGeneretionByCourseNameAndSemesterYearAndStudyYear($courseName, $semesterYear, $studyYear)
{

    require("connection_connect.php");

    $studentGeneretionGradeRanges = [];

    $sql = "SELECT studyGeneretion, COUNT(CASE WHEN gpaStatusName = 'blue' THEN studentId END) AS blue,COUNT(CASE WHEN gpaStatusName = 'green' THEN studentId END) AS green,COUNT(CASE WHEN gpaStatusName = 'orange' THEN studentId END) AS orange,COUNT(CASE WHEN gpaStatusName = 'red' THEN studentId END) AS red
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId
    WHERE nameCourseUse = '$courseName' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId WHERE nameCourseUse = '$courseName' AND semesterYear <= $semesterYear AND studyYear = $studyYear GROUP BY studentId)
    GROUP BY studyGeneretion;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $studentGeneretionGradeRanges[] = $my_row;
    }


    require("connection_close.php");

    return $studentGeneretionGradeRanges;

}

function getCountStudentGradeRangeSortByGeneretionByCourseNameAndSemesterYearAndStudyYearAndStatus($courseName, $semesterYear, $status)
{

    require("connection_connect.php");

    $studentGeneretionGradeRangeByStatus = [];

    $sql = "SELECT studyGeneretion, COUNT(CASE WHEN gpaStatusName = 'blue' THEN studentId END) AS blue,COUNT(CASE WHEN gpaStatusName = 'green' THEN studentId END) AS green,COUNT(CASE WHEN gpaStatusName = 'orange' THEN studentId END) AS orange,COUNT(CASE WHEN gpaStatusName = 'red' THEN studentId END) AS red
    FROM gpastatus NATURAL JOIN  fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId
    WHERE nameCourseUse = '$courseName' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM studentStatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId WHERE nameCourseUse = '$courseName' AND semesterYear <= $semesterYear AND status = '$status' GROUP BY studentId)
    GROUP BY studyGeneretion
    ORDER BY studyGeneretion;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $studentGeneretionGradeRangeByStatus[] = $my_row;
    }


    require("connection_close.php");

    return $studentGeneretionGradeRangeByStatus;

}

function getCountStudentStatusSortByGeneretionByCourseNameAndSemesterYearAndStudyYear($courseName, $semesterYear)
{

    require("connection_connect.php");

    $studentStatusGeneretions = [];

    $sql = "SELECT studyGeneretion,COUNT(CASE WHEN tcasYear = 2500+studyGeneretion THEN studentId END) AS firstEntry,COUNT(CASE WHEN status = 'กำลังศึกษา' THEN status END) AS study,COUNT(CASE WHEN status = 'จบการศึกษา' THEN status END) AS grad
    FROM studentStatus NATURAL JOIN  fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId
    WHERE nameCourseUse = '$courseName' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM studentStatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId WHERE nameCourseUse = '$courseName' AND semesterYear <= $semesterYear 
    GROUP BY studentId)
    ORDER BY studyGeneretion;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $studentStatusGeneretions[] = $my_row;
    }


    require("connection_close.php");

    return $studentStatusGeneretions;

}

function getCountStudentPlanStatusSortBySemesterYearByCourseNameAndSemesterYear($courseName, $semesterYear)
{

    require("connection_connect.php");

    $countPlanStatusSortBySemesterYear = [];

    $sql = "SELECT semesterYear, COUNT(CASE WHEN planStatus = 'ตามแผน' THEN studentId END) AS plan,COUNT(CASE WHEN planStatus = 'ไม่ตามแผน' THEN studentId END) AS notPlan,COUNT(CASE WHEN planStatus = 'พ้นสภาพนิสิต' THEN studentId END) AS retire
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId
    WHERE nameCourseUse = '$courseName' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId WHERE nameCourseUse = '$courseName' AND semesterYear <= $semesterYear   GROUP BY studentId,semesterYear)
    GROUP BY semesterYear
    ORDER BY semesterYear;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $countPlanStatusSortBySemesterYear[] = $my_row;
    }


    require("connection_close.php");

    return $countPlanStatusSortBySemesterYear;

}

function getCountStudentPlanStatusSortByStudyGeneretionByCourseNameAndSemesterYear($courseName, $semesterYear)
{

    require("connection_connect.php");

    $countPlanStatusSortByGeneretion = [];

    $sql = "SELECT studyGeneretion, COUNT(CASE WHEN planStatus = 'ตามแผน' THEN studentId END) AS plan,COUNT(CASE WHEN planStatus = 'ไม่ตามแผน' THEN studentId END) AS notPlan,COUNT(CASE WHEN planStatus = 'พ้นสภาพนิสิต' THEN studentId END) AS retire
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId
    WHERE nameCourseUse = '$courseName' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId WHERE nameCourseUse = '$courseName' AND semesterYear <= $semesterYear   GROUP BY studentId)
    GROUP BY studyGeneretion
    ORDER BY studyGeneretion;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $countPlanStatusSortByGeneretion[] = $my_row;
    }


    require("connection_close.php");

    return $countPlanStatusSortByGeneretion;

}

function getCountStudentTcasSortByStudyGeneretionByCourseName($courseName)
{

    require("connection_connect.php");

    $countStudentSortByGeneretion = [];

    $sql = "SELECT studyGeneretion,COUNT(CASE WHEN tcasName = 'TCAS1' THEN studentId END) AS TCAS1,COUNT(CASE WHEN tcasName = 'TCAS2' THEN studentId END) AS TCAS2,COUNT(CASE WHEN tcasName = 'TCAS3' THEN studentId END) AS TCAS3,COUNT(CASE WHEN tcasName = 'TCAS4' THEN studentId END) AS TCAS4
    FROM course NATURAL JOIN fact_student NATURAL JOIN tcas
    WHERE nameCourseUse = '$courseName'
    GROUP BY studyGeneretion;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $countStudentSortByGeneretion[] = $my_row;
    }


    require("connection_close.php");

    return $countStudentSortByGeneretion;

}

function getMaxMinAvgGPAXByCourseName($courseName)
{

    require("connection_connect.php");

    $gpaxMMA = [];

    $sql = "SELECT studyGeneretion,ROUND(MAX(gpaAll),2) AS maxGPAX,ROUND(AVG(gpaAll),2) AS avgGPAX,ROUND(MIN(gpaAll),2) AS minGPAX
    FROM semester NATURAL JOIN fact_term_summary NATURAL JOIN tcas NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId
    WHERE nameCourseUse = '$courseName' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId WHERE nameCourseUse = '$courseName' GROUP BY studentId)
    GROUP BY studyGeneretion
    ORDER BY studyGeneretion;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $gpaxMMA[] = $my_row;
    }


    require("connection_close.php");

    return $gpaxMMA;

}

function getPercentageStudySortByGeneretionByCourseName($courseName)
{

    require("connection_connect.php");

    $percentageGeneretions = [];

    $sql = "SELECT studyGeneretion,COUNT(studentId) AS entry,COUNT(CASE WHEN status = 'กำลังศึกษา' THEN studentId END) AS study,ROUND(COUNT(CASE WHEN status = 'กำลังศึกษา' THEN studentId END)*100/COUNT(studentId),2) AS percentage
    FROM semester NATURAL JOIN fact_term_summary NATURAL JOIN tcas NATURAL JOIN fact_student NATURAL JOIN studentstatus  INNER JOIN course ON fact_student.courseId = course.courseId
    WHERE nameCourseUse = '$courseName' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId WHERE nameCourseUse = '$courseName' GROUP BY studentId);";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $percentageGeneretions[] = $my_row;
    }


    require("connection_close.php");

    return $percentageGeneretions;

}

function getPercentageStudyAndRetireSortByGeneretionByCourseName($courseName)
{

    require("connection_connect.php");

    $percentageGeneretions = [];

    $sql = "SELECT studyGeneretion,COUNT(CASE WHEN status = 'กำลังศึกษา' THEN studentId END) AS study,COUNT(CASE WHEN status = 'พ้นสภาพนิสิต' THEN studentId END) AS retire,ROUND(COUNT(CASE WHEN status = 'กำลังศึกษา' THEN studentId END)*100/COUNT(studentId),2) AS percentage
    FROM semester NATURAL JOIN fact_term_summary NATURAL JOIN tcas NATURAL JOIN fact_student NATURAL JOIN studentstatus  INNER JOIN course ON fact_student.courseId = course.courseId
    WHERE nameCourseUse = '$courseName' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId WHERE nameCourseUse = '$courseName' GROUP BY studentId);";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $percentageGeneretions[] = $my_row;
    }


    require("connection_close.php");

    return $percentageGeneretions;

}

function getCountStudentStatusSortByGeneretionByDepartmentId($departmentId)
{

    require("connection_connect.php");

    $generetionStatus = [];


    $sql = "SELECT studyGeneretion,COUNT(studentId) AS firstEntry,COUNT(CASE WHEN status = 'พ้นสภาพนิสิต' THEN status END) AS retire,COUNT(CASE WHEN status = 'กำลังศึกษา' THEN status END) AS study,COUNT(CASE WHEN status = 'จบการศึกษา' THEN status END) AS grad
    FROM studentstatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student
    WHERE departmentId = $departmentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN fact_student WHERE departmentId = $departmentId  GROUP BY studentId)
    GROUP BY studyGeneretion;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $generetionStatus[] = $my_row;
    }



    require("connection_close.php");

    return $generetionStatus;

}

function getCountStudentStatusSortByYearByDepartmrntId($departmentId)
{

    require("connection_connect.php");

    $yearStatus = [];



    $sql = "SELECT semesterYear,COUNT(studentId) AS firstEntry,COUNT(CASE WHEN status = 'พ้นสภาพนิสิต' THEN status END) AS retire,COUNT(CASE WHEN status = 'กำลังศึกษา' THEN status END) AS study,COUNT(CASE WHEN status = 'จบการศึกษา' THEN status END) AS grad
    FROM studentstatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student
    WHERE departmentId = $departmentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN fact_student WHERE departmentId = $departmentId  GROUP BY studentId,studyYear)
    GROUP BY semesterYear;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $yearStatus[] = $my_row;
    }



    require("connection_close.php");

    return $yearStatus;

}

// function getCountStudentStatusTatleSortByGeneretionAndYearStudyByDepartmrntIdIdAndStatus($departmentId, $status)
// {

//     require("connection_connect.php");

//     $yearStatus = [];

//     //$course = getCoursePresentByDepartmentId($departmentId)["nameCourseUse"];

//     $sql = "SELECT studyGeneretion,COUNT(CASE WHEN semesterYear = couseStartYear THEN studentId END) AS one,COUNT(CASE WHEN semesterYear = couseStartYear+1 THEN studentId END) AS two,COUNT(CASE WHEN semesterYear = couseStartYear+2 THEN studentId END) AS three,COUNT(CASE WHEN semesterYear = couseStartYear+3 THEN studentId END) AS four,COUNT(CASE WHEN semesterYear = couseStartYear+4 THEN studentId END) AS five,COUNT(CASE WHEN semesterYear = couseStartYear+5 THEN studentId END) AS six,COUNT(CASE WHEN semesterYear = couseStartYear+6 THEN studentId END) AS seven,COUNT(CASE WHEN semesterYear = couseStartYear+7 THEN studentId END) AS eight,COUNT(CASE WHEN semesterYear = couseStartYear+8 THEN studentId END) AS nine,COUNT(CASE WHEN semesterYear = couseStartYear+9 THEN studentId END) AS ten,COUNT(CASE WHEN semesterYear = couseStartYear+10 THEN studentId END) AS eleven,COUNT(CASE WHEN semesterYear = couseStartYear+11 THEN studentId END) AS twelve
//     FROM studentstatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId
//     WHERE nameCourseUse = '$course' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN fact_student  INNER JOIN course ON fact_student.courseId = course.courseId 
//     WHERE nameCourseUse = '$course'  GROUP BY studentId,studyYear) AND status = '$status'
//     GROUP BY studyGeneretion";

//     $result = $conn->query($sql);

//     while ($my_row = $result->fetch_assoc()) {
//         $yearStatus[] = $my_row;
//     }



//     require("connection_close.php");

//     return $yearStatus;

// }


function getCountStudentGradeRangeByDepartmrntIdAndSemesterYear($departmentId, $semesterYear)
{

    require("connection_connect.php");

    $sql = "SELECT COUNT(CASE WHEN gpaStatusName = 'blue' THEN studentId END) AS blue,COUNT(CASE WHEN gpaStatusName = 'green' THEN studentId END) AS green,COUNT(CASE WHEN gpaStatusName = 'orange' THEN studentId END) AS orange,COUNT(CASE WHEN gpaStatusName = 'red' THEN studentId END) AS red
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student
    WHERE departmentId = $departmentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student   WHERE departmentId = $departmentId AND semesterYear <= $semesterYear   GROUP BY studentId);";

    $result = $conn->query($sql);
    $countRangeGrade = $result->fetch_assoc();


    require("connection_close.php");

    return $countRangeGrade;

}

function getCountStudentPlanStatusByDepartmrntIdAndSemesterYear($departmentId, $semesterYear)
{

    require("connection_connect.php");

    $sql = "SELECT COUNT(CASE WHEN planStatus = 'ตามแผน' THEN studentId END) AS plan,COUNT(CASE WHEN planStatus = 'ไม่ตามแผน' THEN studentId END) AS notPlan,COUNT(CASE WHEN planStatus = 'พ้นสภาพนิสิต' THEN studentId END) AS retire,COUNT(CASE WHEN planStatus = 'จบการศึกษา' THEN studentId END) AS grad
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student
    WHERE departmentId = $departmentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student 
    WHERE departmentId = $departmentId AND semesterYear <= $semesterYear   GROUP BY studentId);";

    $result = $conn->query($sql);
    $countPlanStatus = $result->fetch_assoc();


    require("connection_close.php");

    return $countPlanStatus;

}

function getCountStudentGradeRangeSortByGeneretionByDepartmentIdAndSemesterYearAndStudyYear($departmentId, $semesterYear, $studyYear)
{

    require("connection_connect.php");

    $studentGeneretionGradeRanges = [];

    $sql = "SELECT studyGeneretion, COUNT(CASE WHEN gpaStatusName = 'blue' THEN studentId END) AS blue,COUNT(CASE WHEN gpaStatusName = 'green' THEN studentId END) AS green,COUNT(CASE WHEN gpaStatusName = 'orange' THEN studentId END) AS orange,COUNT(CASE WHEN gpaStatusName = 'red' THEN studentId END) AS red
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student
    WHERE departmentId = $departmentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student
    WHERE departmentId = $departmentId AND semesterYear <= $semesterYear AND studyYear = $studyYear GROUP BY studentId)
    GROUP BY studyGeneretion
    ORDER BY studyGeneretion";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $studentGeneretionGradeRanges[] = $my_row;
    }


    require("connection_close.php");

    return $studentGeneretionGradeRanges;

}

function getCountStudentGradeRangeSortByGeneretionByDepartmentIdAndSemesterYearAndStudyYearAndStatus($departmentId, $semesterYear, $status)
{

    require("connection_connect.php");

    $studentGeneretionGradeRangeByStatus = [];

    $sql = "SELECT studyGeneretion, COUNT(CASE WHEN gpaStatusName = 'blue' THEN studentId END) AS blue,COUNT(CASE WHEN gpaStatusName = 'green' THEN studentId END) AS green,COUNT(CASE WHEN gpaStatusName = 'orange' THEN studentId END) AS orange,COUNT(CASE WHEN gpaStatusName = 'red' THEN studentId END) AS red
    FROM gpastatus NATURAL JOIN  fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  
    WHERE departmentId = $departmentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM studentStatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  
    WHERE departmentId = $departmentId AND semesterYear <= $semesterYear AND status = '$status' GROUP BY studentId)
    GROUP BY studyGeneretion
    ORDER BY studyGeneretion;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $studentGeneretionGradeRangeByStatus[] = $my_row;
    }


    require("connection_close.php");

    return $studentGeneretionGradeRangeByStatus;

}

function getCountStudentStatusSortByGeneretionByDepartmentIdAndSemesterYearAndStudyYear($departmentId, $semesterYear)
{

    require("connection_connect.php");

    $studentStatusGeneretions = [];

    $sql = "SELECT studyGeneretion,COUNT(CASE WHEN tcasYear = 2500+studyGeneretion THEN studentId END) AS firstEntry,COUNT(CASE WHEN status = 'กำลังศึกษา' THEN status END) AS study,COUNT(CASE WHEN status = 'จบการศึกษา' THEN status END) AS grad
    FROM studentStatus NATURAL JOIN  fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student
    WHERE departmentId = $departmentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM studentStatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student WHERE departmentId = $departmentId AND semesterYear <= $semesterYear 
    GROUP BY studentId)
    ORDER BY studyGeneretion;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $studentStatusGeneretions[] = $my_row;
    }


    require("connection_close.php");

    return $studentStatusGeneretions;

}

function getCountStudentPlanStatusSortBySemesterYearByDepartmentIdAndSemesterYear($departmentId, $semesterYear)
{

    require("connection_connect.php");

    $countPlanStatusSortBySemesterYear = [];

    $sql = "SELECT semesterYear, COUNT(CASE WHEN planStatus = 'ตามแผน' THEN studentId END) AS plan,COUNT(CASE WHEN planStatus = 'ไม่ตามแผน' THEN studentId END) AS notPlan,COUNT(CASE WHEN planStatus = 'พ้นสภาพนิสิต' THEN studentId END) AS retire
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student
    WHERE departmentId = $departmentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  WHERE departmentId = $departmentId AND semesterYear <= $semesterYear   GROUP BY studentId,semesterYear)
    GROUP BY semesterYear
    ORDER BY semesterYear;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $countPlanStatusSortBySemesterYear[] = $my_row;
    }


    require("connection_close.php");

    return $countPlanStatusSortBySemesterYear;

}

function getCountStudentPlanStatusSortByStudyGeneretionByDepartmentAndSemesterYear($departmentId, $semesterYear)
{

    require("connection_connect.php");

    $countPlanStatusSortByGeneretion = [];

    $sql = "SELECT studyGeneretion, COUNT(CASE WHEN planStatus = 'ตามแผน' THEN studentId END) AS plan,COUNT(CASE WHEN planStatus = 'ไม่ตามแผน' THEN studentId END) AS notPlan,COUNT(CASE WHEN planStatus = 'พ้นสภาพนิสิต' THEN studentId END) AS retire
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student
    WHERE departmentId = $departmentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student   WHERE departmentId = $departmentId AND semesterYear <= $semesterYear   GROUP BY studentId)
    GROUP BY studyGeneretion
    ORDER BY studyGeneretion;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $countPlanStatusSortByGeneretion[] = $my_row;
    }


    require("connection_close.php");

    return $countPlanStatusSortByGeneretion;

}

function getCountStudentTcasSortByStudyGeneretionByDepartmentId($departmentId)
{

    require("connection_connect.php");

    $countStudentSortByGeneretion = [];

    $sql = "SELECT studyGeneretion,COUNT(CASE WHEN tcasName = 'TCAS1' THEN studentId END) AS TCAS1,COUNT(CASE WHEN tcasName = 'TCAS2' THEN studentId END) AS TCAS2,COUNT(CASE WHEN tcasName = 'TCAS3' THEN studentId END) AS TCAS3,COUNT(CASE WHEN tcasName = 'TCAS4' THEN studentId END) AS TCAS4
    FROM department NATURAL JOIN fact_student NATURAL JOIN tcas
    WHERE departmentId = $departmentId
    GROUP BY studyGeneretion;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $countStudentSortByGeneretion[] = $my_row;
    }


    require("connection_close.php");

    return $countStudentSortByGeneretion;

}

function getMaxMinAvgGPAXByDepartmentId($departmentId)
{

    require("connection_connect.php");

    $gpaxMMA = [];

    $sql = "SELECT studyGeneretion,ROUND(MAX(gpaAll),2) AS maxGPAX,ROUND(AVG(gpaAll),2) AS avgGPAX,ROUND(MIN(gpaAll),2) AS minGPAX
    FROM semester NATURAL JOIN fact_term_summary NATURAL JOIN tcas NATURAL JOIN fact_student
    WHERE departmentId = $departmentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student WHERE departmentId = $departmentId GROUP BY studentId)
    GROUP BY studyGeneretion
    ORDER BY studyGeneretion;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $gpaxMMA[] = $my_row;
    }


    require("connection_close.php");

    return $gpaxMMA;

}

function getPercentageStudySortByGeneretionByDepartmentId($departmentId)
{

    require("connection_connect.php");

    $percentageGeneretions = [];

    $sql = "SELECT studyGeneretion,COUNT(studentId) AS entry,COUNT(CASE WHEN status = 'กำลังศึกษา' THEN studentId END) AS study,ROUND(COUNT(CASE WHEN status = 'กำลังศึกษา' THEN studentId END)*100/COUNT(studentId),2) AS percentage
    FROM semester NATURAL JOIN fact_term_summary NATURAL JOIN tcas NATURAL JOIN fact_student NATURAL JOIN studentstatus  
    WHERE departmentId = $departmentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student GROUP BY studentId);";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $percentageGeneretions[] = $my_row;
    }


    require("connection_close.php");

    return $percentageGeneretions;

}

function getPercentageStudyAndRetireSortByGeneretionByDepartmentId($departmentId)
{

    require("connection_connect.php");

    $percentageGeneretions = [];

    $sql = "SELECT studyGeneretion,COUNT(CASE WHEN status = 'กำลังศึกษา' THEN studentId END) AS study,COUNT(CASE WHEN status = 'พ้นสภาพนิสิต' THEN studentId END) AS retire,ROUND(COUNT(CASE WHEN status = 'กำลังศึกษา' THEN studentId END)*100/COUNT(studentId),2) AS percentage
    FROM semester NATURAL JOIN fact_term_summary NATURAL JOIN tcas NATURAL JOIN fact_student NATURAL JOIN studentstatus  
    WHERE departmentId = $departmentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student   WHERE departmentId = $departmentId GROUP BY studentId);";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $percentageGeneretions[] = $my_row;
    }


    require("connection_close.php");

    return $percentageGeneretions;

}

function getGradeRangeSortByAdviserByDepartmentId($departmentId)
{

    require("connection_connect.php");

    $gradeRangeSortByAdvisers = [];

    $sql = "SELECT teacherId,titleTecherTh,fisrtNameTh,lastNameTh,COUNT(CASE WHEN gpaStatusName = 'blue' THEN studentId END) AS blue,COUNT(CASE WHEN gpaStatusName = 'green' THEN studentId END) AS green,COUNT(CASE WHEN gpaStatusName = 'orange' THEN studentId END) AS orange,COUNT(CASE WHEN gpaStatusName = 'red' THEN studentId END) AS red
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  NATURAL JOIN teacher
    WHERE departmentId = $departmentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student NATURAL JOIN teacher
    WHERE departmentId = $departmentId GROUP BY studentId)
    GROUP BY teacherId;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {

        $my_row["blues"] = getListStudentByTeacherIdAndGPAStatusName($my_row["teacherId"], "blue");
        $my_row["greens"] = getListStudentByTeacherIdAndGPAStatusName($my_row["teacherId"], "green");
        $my_row["oranges"] = getListStudentByTeacherIdAndGPAStatusName($my_row["teacherId"], "orange");
        $my_row["reds"] = getListStudentByTeacherIdAndGPAStatusName($my_row["teacherId"], "red");
        $gradeRangeSortByAdvisers[] = $my_row;
    }


    require("connection_close.php");

    return $gradeRangeSortByAdvisers;

}

function getListStudentByTeacherIdAndGPAStatusName($teacherId, $gpaStatusName)
{

    require("connection_connect.php");

    $students = [];

    $sql = "SELECT *
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  NATURAL JOIN teacher INNER JOIN student ON fact_student.studentId = student.studentId
    WHERE teacherId = $teacherId AND gpaStatusName = '$gpaStatusName' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student NATURAL JOIN teacher
    WHERE teacherId = $teacherId GROUP BY studentId);";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $students[] = $my_row;
    }


    require("connection_close.php");

    return $students;

}

function getPlanStatusSortByAdviserByDepartmentId($departmentId)
{

    require("connection_connect.php");

    $planStatusSortByAdvisers = [];

    $sql = "SELECT teacherId,titleTecherTh,fisrtNameTh,lastNameTh,COUNT(CASE WHEN planStatus = 'ตามแผน' THEN studentId END) AS plan,COUNT(CASE WHEN planStatus = 'ไม่ตามแผน' THEN studentId END) AS notPlan,COUNT(CASE WHEN planStatus = 'พ้นสภาพนิสิต' THEN studentId END) AS retire ,COUNT(CASE WHEN planStatus = 'จบการศึกษา' THEN studentId END) AS grad
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  NATURAL JOIN teacher
    WHERE departmentId = $departmentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student NATURAL JOIN teacher
    WHERE departmentId = $departmentId GROUP BY studentId)
    GROUP BY teacherId;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {

        $my_row["plans"] = getListStudentByTeacherIdAndPlanStatus($my_row["teacherId"], "ตามแผน");
        $my_row["notPlans"] = getListStudentByTeacherIdAndPlanStatus($my_row["teacherId"], "ไม่ตามแผน");
        $my_row["retires"] = getListStudentByTeacherIdAndPlanStatus($my_row["teacherId"], "พ้นสภาพนิสิต");
        $my_row["grads"] = getListStudentByTeacherIdAndPlanStatus($my_row["teacherId"], "จบการศึกษา");
        $planStatusSortByAdvisers[] = $my_row;
    }


    require("connection_close.php");

    return $planStatusSortByAdvisers;

}

function getListStudentByTeacherIdAndPlanStatus($teacherId, $planStatus)
{

    require("connection_connect.php");

    $students = [];

    $sql = "SELECT *
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  NATURAL JOIN teacher INNER JOIN student ON fact_student.studentId = student.studentId
    WHERE teacherId = $teacherId AND planStatus = '$planStatus' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student NATURAL JOIN teacher
    WHERE teacherId = $teacherId
    GROUP BY studentId);";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $students[] = $my_row;
    }


    require("connection_close.php");

    return $students;

}

function getMaxMinAVGGPAXSortByAdviserByDepartmentId($departmentId)
{


    require("connection_connect.php");

    $advisorMMAs = [];

    $sql = "SELECT teacherId,titleTecherTh,fisrtNameTh,lastNameTh,ROUND(MAX(gpaAll),2) AS maxGPAX,ROUND(AVG(gpaAll),2) AS avgGPAX,ROUND(MIN(gpaAll),2) AS minGPAX
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  NATURAL JOIN teacher
    WHERE departmentId = $departmentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student NATURAL JOIN teacher
    WHERE departmentId = $departmentId GROUP BY studentId)
    GROUP BY teacherId;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {


        $advisorMMAs[] = $my_row;
    }


    require("connection_close.php");

    return $advisorMMAs;

}


function getRemainingGradeRangeSortByAdviserByDepartmentId($departmentId)
{

    require("connection_connect.php");

    $gradeRangeSortByAdvisers = [];

    $sql = "SELECT teacherId,titleTecherTh,fisrtNameTh,lastNameTh,COUNT(CASE WHEN gpaStatusName = 'blue' THEN studentId END) AS blue,COUNT(CASE WHEN gpaStatusName = 'green' THEN studentId END) AS green,COUNT(CASE WHEN gpaStatusName = 'orange' THEN studentId END) AS orange,COUNT(CASE WHEN gpaStatusName = 'red' THEN studentId END) AS red
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  NATURAL JOIN teacher
    WHERE departmentId = $departmentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student NATURAL JOIN teacher
    WHERE departmentId = $departmentId And studyYear > 4 GROUP BY studentId)
    GROUP BY teacherId;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {

        $my_row["blues"] = getRemainingListStudentByTeacherIdAndGPAStatusName($my_row["teacherId"], "blue");
        $my_row["greens"] = getRemainingListStudentByTeacherIdAndGPAStatusName($my_row["teacherId"], "green");
        $my_row["oranges"] = getRemainingListStudentByTeacherIdAndGPAStatusName($my_row["teacherId"], "orange");
        $my_row["reds"] = getRemainingListStudentByTeacherIdAndGPAStatusName($my_row["teacherId"], "red");
        $gradeRangeSortByAdvisers[] = $my_row;
    }


    require("connection_close.php");

    return $gradeRangeSortByAdvisers;

}

function getRemainingListStudentByTeacherIdAndGPAStatusName($teacherId, $gpaStatusName)
{

    require("connection_connect.php");

    $students = [];

    $sql = "SELECT *
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  NATURAL JOIN teacher INNER JOIN student ON fact_student.studentId = student.studentId
    WHERE teacherId = $teacherId AND gpaStatusName = '$gpaStatusName' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student NATURAL JOIN teacher
    WHERE teacherId = $teacherId  And studyYear > 4  GROUP BY studentId);";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $students[] = $my_row;
    }


    require("connection_close.php");

    return $students;

}

function getRemainingPlanStatusSortByAdviserByDepartmentId($departmentId)
{

    require("connection_connect.php");

    $planStatusSortByAdvisers = [];

    $sql = "SELECT teacherId,titleTecherTh,fisrtNameTh,lastNameTh,COUNT(CASE WHEN planStatus = 'ตามแผน' THEN studentId END) AS plan,COUNT(CASE WHEN planStatus = 'ไม่ตามแผน' THEN studentId END) AS notPlan,COUNT(CASE WHEN planStatus = 'พ้นสภาพนิสิต' THEN studentId END) AS retire,COUNT(CASE WHEN planStatus = 'จบการศึกษา' THEN studentId END) AS grad
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  NATURAL JOIN teacher
    WHERE departmentId = $departmentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student NATURAL JOIN teacher
    WHERE departmentId = $departmentId And studyYear > 4 GROUP BY studentId)
    GROUP BY teacherId;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {

        $my_row["plans"] = getListRemainingStudentByTeacherIdAndPlanStatus($my_row["teacherId"], "ตามแผน");
        $my_row["notPlans"] = getListRemainingStudentByTeacherIdAndPlanStatus($my_row["teacherId"], "ไม่ตามแผน");
        $my_row["retires"] = getListRemainingStudentByTeacherIdAndPlanStatus($my_row["teacherId"], "พ้นสภาพนิสิต");
        $my_row["grads"] = getListRemainingStudentByTeacherIdAndPlanStatus($my_row["teacherId"], "จบการศึกษา");
        $planStatusSortByAdvisers[] = $my_row;
    }


    require("connection_close.php");

    return $planStatusSortByAdvisers;

}

function getListRemainingStudentByTeacherIdAndPlanStatus($teacherId, $planStatus)
{

    require("connection_connect.php");

    $students = [];

    $sql = "SELECT *
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  NATURAL JOIN teacher INNER JOIN student ON fact_student.studentId = student.studentId
    WHERE teacherId = $teacherId AND planStatus = '$planStatus' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student NATURAL JOIN teacher
    WHERE teacherId = $teacherId  And studyYear > 4 GROUP BY studentId);";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $students[] = $my_row;
    }


    require("connection_close.php");

    return $students;

}





?>