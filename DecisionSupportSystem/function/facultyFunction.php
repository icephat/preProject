<?php

function getCountStudentInFaculty()
{
    require("connection_connect.php");



    $sql = "SELECT COUNT(studentId) AS countStudent FROM student;";

    $result = $conn->query($sql);

    $countStudent = $result->fetch_assoc();


    require("connection_close.php");

    return $countStudent;


}

function geStudyGeneretionStudentInFaculty()
{
    require("connection_connect.php");


    $generetions = [];

    $sql = "SELECT DISTINCT studyGeneretion FROM fact_student ORDER BY studyGeneretion;";

    $result = $conn->query($sql);



    while ($my_row = $result->fetch_assoc()) {
        $generetions[] = $my_row;
    }


    require("connection_close.php");

    return $generetions;


}

function getCountStudentGradeRangeInFaculty()
{

    require("connection_connect.php");

    $sql = "SELECT COUNT(CASE WHEN gpaStatusName = 'blue' THEN studentId END) AS blue,COUNT(CASE WHEN gpaStatusName = 'green' THEN studentId END) AS green,COUNT(CASE WHEN gpaStatusName = 'orange' THEN studentId END) AS orange,COUNT(CASE WHEN gpaStatusName = 'red' THEN studentId END) AS red
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student
    WHERE termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student    
    GROUP BY studentId);";

    $result = $conn->query($sql);
    $countRangeGrade = $result->fetch_assoc();


    require("connection_close.php");

    return $countRangeGrade;

}

function getCountStudentPlanStatusInFaculty()
{

    require("connection_connect.php");

    $sql = "SELECT COUNT(CASE WHEN planStatus = 'ตามแผน' THEN studentId END) AS plan,COUNT(CASE WHEN planStatus = 'ไม่ตามแผน' THEN studentId END) AS notPlan,COUNT(CASE WHEN planStatus = 'พ้นสภาพนิสิต' THEN studentId END) AS retire,COUNT(CASE WHEN planStatus = 'จบการศึกษา' THEN studentId END) AS grad
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student
    WHERE termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student 
    GROUP BY studentId);";

    $result = $conn->query($sql);
    $countPlanStatus = $result->fetch_assoc();


    require("connection_close.php");

    return $countPlanStatus;

}

function getGradeRangeSortByDepartmentInFaculty()
{

    require("connection_connect.php");

    $gradeRangeSortByDepartments = [];

    $sql = "SELECT departmentName,departmentInitials,COUNT(CASE WHEN gpaStatusName = 'blue' THEN studentId END) AS blue,COUNT(CASE WHEN gpaStatusName = 'green' THEN studentId END) AS green,COUNT(CASE WHEN gpaStatusName = 'orange' THEN studentId END) AS orange,COUNT(CASE WHEN gpaStatusName = 'red' THEN studentId END) AS red
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  NATURAL JOIN department
    WHERE termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student 
    GROUP BY studentId)
    GROUP BY departmentId;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {

        
        $gradeRangeSortByDepartments[] = $my_row;
    }


    require("connection_close.php");

    return $gradeRangeSortByDepartments;

}

function getplanStatusSortByDepartmentInFaculty()
{

    require("connection_connect.php");

    $planStatusSortByDepartments = [];

    $sql = "SELECT departmentName,departmentInitials,COUNT(CASE WHEN planStatus = 'ตามแผน' THEN studentId END) AS plan,COUNT(CASE WHEN planStatus = 'ไม่ตามแผน' THEN studentId END) AS notPlan,COUNT(CASE WHEN planStatus = 'พ้นสภาพนิสิต' THEN studentId END) AS retire,COUNT(CASE WHEN planStatus = 'จบการศึกษา' THEN studentId END) AS grad
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  NATURAL JOIN department
    WHERE termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student 
    GROUP BY studentId)
    GROUP BY departmentId;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {

        
        $planStatusSortByDepartments[] = $my_row;
    }


    require("connection_close.php");

    return $planStatusSortByDepartments;

}

function getMaxMinAVGGPAXSortByDepartmentInFaculty()
{


    require("connection_connect.php");

    $departmentMMAs = [];

    $sql = "SELECT departmentName,departmentInitials,ROUND(MAX(gpaAll),2) AS maxGPAX,ROUND(AVG(gpaAll),2) AS avgGPAX,ROUND(MIN(gpaAll),2) AS minGPAX
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  NATURAL JOIN department
    WHERE termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student 
    GROUP BY studentId)
    GROUP BY departmentId;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {


        $departmentMMAs[] = $my_row;
    }


    require("connection_close.php");

    return $departmentMMAs;

}


function getCountStudentRemainingGradeRangeInFaculty()
{

    require("connection_connect.php");

    $sql = "SELECT COUNT(CASE WHEN gpaStatusName = 'blue' THEN studentId END) AS blue,COUNT(CASE WHEN gpaStatusName = 'green' THEN studentId END) AS green,COUNT(CASE WHEN gpaStatusName = 'orange' THEN studentId END) AS orange,COUNT(CASE WHEN gpaStatusName = 'red' THEN studentId END) AS red
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student
    WHERE planStatus != 'จบการศึกษา' AND planStatus != 'พ้นสภาพนิสิต' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student    
    WHERE studyYear > 4
    GROUP BY studentId);";

    $result = $conn->query($sql);
    $countRangeGrade = $result->fetch_assoc();


    require("connection_close.php");

    return $countRangeGrade;

}

function getCountStudentRemainingPlanStatusInFaculty()
{

    require("connection_connect.php");

    $sql = "SELECT COUNT(CASE WHEN planStatus = 'ตามแผน' THEN studentId END) AS plan,COUNT(CASE WHEN planStatus = 'ไม่ตามแผน' THEN studentId END) AS notPlan,COUNT(CASE WHEN planStatus = 'พ้นสภาพนิสิต' THEN studentId END) AS retire,COUNT(CASE WHEN planStatus = 'จบการศึกษา' THEN studentId END) AS grad
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student
    WHERE planStatus != 'จบการศึกษา' AND planStatus != 'พ้นสภาพนิสิต' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student 
    WHERE studyYear > 4
    GROUP BY studentId);";

    $result = $conn->query($sql);
    $countPlanStatus = $result->fetch_assoc();


    require("connection_close.php");

    return $countPlanStatus;

}

function getGradeRangeRemainingSortByDepartmentInFaculty()
{

    require("connection_connect.php");

    $gradeRangeSortByDepartments = [];

    $sql = "SELECT departmentName,departmentInitials,COUNT(CASE WHEN gpaStatusName = 'blue' THEN studentId END) AS blue,COUNT(CASE WHEN gpaStatusName = 'green' THEN studentId END) AS green,COUNT(CASE WHEN gpaStatusName = 'orange' THEN studentId END) AS orange,COUNT(CASE WHEN gpaStatusName = 'red' THEN studentId END) AS red
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  NATURAL JOIN department
    WHERE planStatus != 'จบการศึกษา' AND planStatus != 'พ้นสภาพนิสิต' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student 
    WHERE studyYear > 4
    GROUP BY studentId)
    GROUP BY departmentId;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {

        
        $gradeRangeSortByDepartments[] = $my_row;
    }


    require("connection_close.php");

    return $gradeRangeSortByDepartments;

}

function getplanStatusRemainingSortByDepartmentInFaculty()
{

    require("connection_connect.php");

    $planStatusSortByDepartments = [];

    $sql = "SELECT departmentName,departmentInitials,COUNT(CASE WHEN planStatus = 'ตามแผน' THEN studentId END) AS plan,COUNT(CASE WHEN planStatus = 'ไม่ตามแผน' THEN studentId END) AS notPlan,COUNT(CASE WHEN planStatus = 'พ้นสภาพนิสิต' THEN studentId END) AS retire,COUNT(CASE WHEN planStatus = 'จบการศึกษา' THEN studentId END) AS grad
    FROM gpastatus NATURAL JOIN fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student  NATURAL JOIN department
    WHERE planStatus != 'จบการศึกษา' AND planStatus != 'พ้นสภาพนิสิต' AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student 
    WHERE studyYear > 4
    GROUP BY studentId)
    GROUP BY departmentId;";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {

        
        $planStatusSortByDepartments[] = $my_row;
    }


    require("connection_close.php");

    return $planStatusSortByDepartments;

}




?>