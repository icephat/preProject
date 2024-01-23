<?php

include_once '../function/semesterFunction.php';
include_once '../function/studentFunction.php';

function getTeacherById($teacherId)
{

    require("connection_connect.php");

    $sql = "SELECT * FROM teacher WHERE teacherId = " . $teacherId;
    $result = $conn->query($sql);
    $teacher = $result->fetch_assoc();

    require("connection_close.php");

    return $teacher;

}

function getTeacherByUsernameTeacher($usernameTeacher)
{

    require("connection_connect.php");
    echo $usernameTeacher . "<br>";

    $sql = "SELECT * FROM teacher NATURAL JOIN teacherrole NATURAL JOIN role WHERE username = '" . $usernameTeacher . "'";
    $result = $conn->query($sql);
    $teacher = $result->fetch_assoc();

    require("connection_close.php");


    return $teacher;

}

function getCountStudentByPlaningByTeacherId($teacherId)
{


    $planingStatus["plan"] = getCountStudentInTeacherByPlaningByTeacherIdAndPlaningStatus($teacherId, "ตามแผน");
    $planingStatus["notPlan"] = getCountStudentInTeacherByPlaningByTeacherIdAndPlaningStatus($teacherId, "ไม่ตามแผน");
    $planingStatus["retire"] = getCountStudentInTeacherByStudentStatusByTeacherIdAndStatus($teacherId, "พ้นสภาพ");
    $planingStatus["grad"] = getCountStudentInTeacherByStudentStatusByTeacherIdAndStatus($teacherId, "จบการศึกษา");

    return $planingStatus;

}

function getCountStudentGPAXStatusByTeacherId($teacherId)
{

    require("connection_connect.php");

    $countGPAXs = [];

    $semester = getSemesterPresent();


    $sql = "SELECT gpaxstatus.gpaxStatusName,IFNULL(count,0) AS count
        FROM gpaxstatus LEFT JOIN
        (SELECT gpaxStatusId,gpaxStatusName,COUNT(studentId) AS count
        FROM semester NATURAL JOIN fact_term_summary NATURAL JOIN fact_student NATURAL JOIN gpaxstatus
        WHERE teacherId = 1 AND semesterYear = " . $semester["semesterYear"] . " AND semesterPart = '" . $semester["semesterPart"] . "'
        GROUP BY gpaxStatusId) A
        ON gpaxstatus.gpaxStatusId = A.gpaxStatusId";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $countGPAXs[] = $my_row;
    }

    require("connection_close.php");

    foreach ($countGPAXs as $gpax) {


        if ($gpax["gpaxStatusName"] == "เกียรตินิยม") {
            $gpaxStatusCount["blue"] = $gpax["count"];
        } else if ($gpax["gpaxStatusName"] == "ปกติ") {
            $gpaxStatusCount["green"] = $gpax["count"];
        } else if ($gpax["gpaxStatusName"] == "รอพินิจ") {
            $gpaxStatusCount["orange"] = $gpax["count"];
        } else if ($gpax["gpaxStatusName"] == "โปรต่ำ") {
            $gpaxStatusCount["red"] = $gpax["count"];
        }



    }

    return $gpaxStatusCount;

}

function getCountStudentInTeacherByStudentStatusByTeacherIdAndStatus($teacherId, $status)
{

    require("connection_connect.php");

    $sql = "SELECT COUNT(studentId) AS count
        FROM fact_student NATURAL JOIN studentstatus
        WHERE teacherId = " . $teacherId . " AND status = '" . $status . "'
        GROUP BY studentStatusId";

    $result = $conn->query($sql);
    $studentStatus = $result->fetch_assoc();


    if (is_null($studentStatus)) {
        $s["count"] = 0;
        $studentStatus = $s;
    }




    require("connection_close.php");

    return $studentStatus;

}

function getCountStudentInTeacherByPlaningByTeacherIdAndPlaningStatus($teacherId, $status)
{

    require("connection_connect.php");

    $semester = getSemesterPresent();

    $sql = "SELECT planStatus,COUNT(studentId) AS count
        FROM semester NATURAL JOIN fact_term_summary NATURAL JOIN fact_student NATURAL JOIN gpaxstatus
        WHERE teacherId = " . $teacherId . " AND semesterYear = " . $semester["semesterYear"] . " AND semesterPart = '" . $semester["semesterPart"] . "' AND studentStatusId = 1 AND planStatus = '" . $status . "';";

    $result = $conn->query($sql);
    $plan = $result->fetch_assoc();

    if (is_null($plan)) {
        $s["count"] = 0;
        $plan = $s;
    }

    require("connection_close.php");

    return $plan;

}

function getCountStudentPlanStatusBystudyGeneretionByTeacherId($teacherId)
{

    require("connection_connect.php");

    $semester = getSemesterPresent();

    $sql = "SELECT studyGeneretion,COUNT(CASE WHEN planStatus = 'ตามแผน' THEN planStatus END) AS planCount,COUNT(CASE WHEN planStatus = 'ไม่ตามแผน' THEN planStatus END) AS notPlanCount,COUNT(CASE WHEN planStatus = 'พ้นสภาพนิสิต' THEN planStatus END) AS retire,COUNT(CASE WHEN planStatus = 'จบการศึกษา' THEN planStatus END) AS grad
    FROM fact_student NATURAL JOIN fact_term_summary NATURAL JOIN semester
    WHERE fact_term_summary.teacherId = $teacherId AND semesterYear = ".$semester["semesterYear"]." AND semesterPart = '".$semester["semesterPart"]."'
    GROUP BY studyGeneretion";

    $generetions = [];
    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $generetions[] = $my_row;
    }
    
    require("connection_close.php");

    return $generetions;

}

function getCountStudentStatusByGeneretionAndTeacherId($generetion, $teacherId)
{
    require("connection_connect.php");

    $sql = "SELECT A.status ,IFNULL(count,0) AS count
        FROM (SELECT status
        FROM studentstatus
        WHERE status = 'พ้นสภาพนิสิต' OR status = 'จบการศึกษา') AS A LEFT JOIN (SELECT studyGeneretion,status,COUNT(studentId) AS count
        FROM fact_student NATURAL JOIN studentstatus
        WHERE teacherId = " . $teacherId . " AND (status = 'พ้นสภาพนิสิต' OR status = 'จบการศึกษา' ) AND studyGeneretion = " . $generetion . "
        GROUP BY studentStatusId) AS B
        ON A.status = B.status";

    $result = $conn->query($sql);

    $studentStatus = [];

    while ($my_row = $result->fetch_assoc()) {
        $studentStatus[] = $my_row;
    }


    require("connection_close.php");

    return $studentStatus;
}

function getCountPlanStatusByGeneretionAndTeacherId($generetion, $teacherId)
{


    require("connection_connect.php");

    $semester = getSemesterPresent();

    $sql = "SELECT planStatus,COUNT(studentId) AS count
        FROM semester NATURAL JOIN fact_term_summary NATURAL JOIN fact_student NATURAL JOIN gpaxstatus
        WHERE teacherId = " . $teacherId . " AND semesterYear = " . $semester["semesterYear"] . " AND semesterPart = '" . $semester["semesterPart"] . "' AND studentStatusId = 1 AND studyGeneretion = " . $generetion
        . " GROUP BY planStatus";


    // $sql = "SELECT planStatus,COUNT(studentId) as count
    // FROM (SELECT studentId,studyGeneretion,MAX(studyYear) AS studyYear,studyTerm,gpaxStatusId,planStatus,gpaxStatusName
    // FROM fact_student NATURAL JOIN fact_term_summary NATURAL JOIN gpaxstatus
    // WHERE teacherId = ".$teacherId." AND studyTerm != 3 AND studyGeneretion = ".$generetion."
    // GROUP BY studentId) AS A
    // GROUP BY planStatus";

    $result = $conn->query($sql);

    $studentStatus = [];

    while ($my_row = $result->fetch_assoc()) {
        $studentStatus[] = $my_row;
    }


    require("connection_close.php");

    return $studentStatus;
}

function getCountGradeRangeByTeacherIdAndStudyYear($teacherId, $studyYear)
{


    require("connection_connect.php");

    $sqlGeneretion = "SELECT DISTINCT studyGeneretion
        FROM fact_student NATURAL JOIN fact_term_summary
        WHERE teacherId = " . $teacherId . " AND studyYear = " . $studyYear . "
        ORDER BY studyGeneretion";

    $generetions = [];

    $result = $conn->query($sqlGeneretion);

    while ($my_row = $result->fetch_assoc()) {
        $generetions[] = $my_row["studyGeneretion"];
    }

    $rangeGradeStudyYears = [];

    foreach ($generetions as $generetion) {
        $rangeGradeStudy["studyGeneretion"] = $generetion;
        $rangeGrades = getCountGradeRangeByTeacherIdAndStudyGeneretionAndStudyYear($teacherId, $generetion, $studyYear);

        foreach ($rangeGrades as $rangeGrade) {
            $gpaStatusName = $rangeGrade["gpaStatusName"];
            $rangeGradeStudy["$gpaStatusName"] = $rangeGrade["count"];
        }
        $rangeGradeStudyYears[] = $rangeGradeStudy;


    }

    require("connection_close.php");

    return $rangeGradeStudyYears;

}


function getCountGradeRangeByTeacherIdAndStudyGeneretionAndStudyYear($teacherId, $generetion, $studyYear)
{

    require("connection_connect.php");

    $sql = "SELECT gpaStatusName,IFNULL(count,0) AS count
        FROM gpastatus LEFT JOIN 
        (SELECT gpaStatusId,COUNT(*) as count
        FROM fact_term_summary NATURAL JOIN fact_student
        WHERE teacherId = " . $teacherId . " AND studyYear = " . $studyYear . " AND studyGeneretion = " . $generetion . " AND studyTerm IN 
        (SELECT MAX(studyTerm) AS studyTerm FROM fact_term_summary NATURAL JOIN fact_student WHERE teacherId = " . $teacherId . " AND studyYear = " . $studyYear . " AND studyGeneretion = " . $generetion . " AND studyTerm != 3)
        GROUP BY gpaStatusId) AS A
        ON gpastatus.gpaStatusId = A.gpaStatusId";

    $rangeGrades = [];

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $rangeGrades[] = $my_row;
    }
    require("connection_close.php");

    return $rangeGrades;



}

function getCountStudySemesterYearPartByTeacherID($teacherId)
{
    require("connection_connect.php");

    $sql = "SELECT semesterYear,semesterPart,COUNT(CASE WHEN planStatus = 'ตามแผน' THEN planStatus END) AS planStatus,COUNT(CASE WHEN planStatus = 'ไม่ตามแผน' THEN planStatus END) AS notPlanStatus,COUNT(CASE WHEN planStatus = 'ลาออก' THEN planStatus END) AS resign
        FROM fact_student NATURAL JOIN fact_term_summary NATURAL JOIN semester
        WHERE teacherId = " . $teacherId . " AND semesterPart != 'ภาคฤดูร้อน'
        GROUP BY semesterYear,semesterPart";

    $countStudySemesters = [];

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        
        $my_row["studentPlans"] = getListStudentByTeacherIDAndPlanStatusAndSemesterYearAndSemesterYear($teacherId,'ตามแผน',$my_row["semesterYear"],$my_row["semesterPart"]);
        $my_row["studentNotPlans"] = getListStudentByTeacherIDAndPlanStatusAndSemesterYearAndSemesterYear($teacherId,'ไม่ตามแผน',$my_row["semesterYear"],$my_row["semesterPart"]);
        $my_row["studentResign"] = getListStudentByTeacherIDAndPlanStatusAndSemesterYearAndSemesterYear($teacherId,'ลาออก',$my_row["semesterYear"],$my_row["semesterPart"]);
        $countStudySemesters[] = $my_row;

    }



    require("connection_close.php");

    return $countStudySemesters;
}

function getListStudentByTeacherIDAndPlanStatusAndSemesterYearAndSemesterYear($teacherId, $planStatus, $semesterYear, $semesterPart)
{

    require("connection_connect.php");

    $students = [];

    $semesterId = getSemesterIdByYearAndPart($semesterYear, $semesterPart);

    $sql = "SELECT studentId,fisrtNameTh,lastNameTh,gpaAll,planStatus
        FROM student NATURAL JOIN fact_term_summary NATURAL JOIN fact_student
        WHERE teacherId = " . $teacherId . " AND semesterId = " . $semesterId . " AND planStatus = '" . $planStatus . "'";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $students[] = $my_row;
    }


    require("connection_close.php");


    return $students;

}

function getGPAXStatusGerenetionByTeacherId($teacherId){

    $studyGeneretionGPAXs = [];

    $semester = getSemesterPresent();
    require("connection_connect.php");


    $sql = "SELECT studyGeneretion,COUNT(CASE WHEN gpaxStatusId = 1 THEN gpaxStatusId END) AS blue,COUNT(CASE WHEN gpaxStatusId = 2 THEN gpaxStatusId END) AS green,COUNT(CASE WHEN gpaxStatusId = 3 THEN gpaxStatusId END) AS orange,COUNT(CASE WHEN gpaxStatusId = 4 THEN gpaxStatusId END) AS red
    FROM fact_student NATURAL JOIN fact_term_summary
    WHERE teacherId = ".$teacherId." AND studentStatusId = 1 AND  semesterId = ".$semester["semesterId"]."
    GROUP BY studyGeneretion";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $studyGeneretionGPAXs[] = $my_row;
    }


    require("connection_close.php");

    return $studyGeneretionGPAXs;



}

function getGPAXStatusGerenetionGraduateByTeacherId($teacherId){

    $studyGeneretionGPAXs = [];

    $semester = getSemesterPresent();
    require("connection_connect.php");


    $sql = "SELECT studyGeneretion,COUNT(CASE WHEN gpaxStatusId = 1 THEN gpaxStatusId END) AS blue,COUNT(CASE WHEN gpaxStatusId = 2 THEN gpaxStatusId END) AS green,COUNT(CASE WHEN gpaxStatusId = 3 THEN gpaxStatusId END) AS orange,COUNT(CASE WHEN gpaxStatusId = 4 THEN gpaxStatusId END) AS red
    FROM fact_student NATURAL JOIN fact_term_summary
    WHERE teacherId = ".$teacherId." AND studentStatusId = 2
    GROUP BY studyGeneretion";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $studyGeneretionGPAXs[] = $my_row;
    }


    require("connection_close.php");

    return $studyGeneretionGPAXs;



}

function getCountStudentGPAXStatusByTeacherIdAndSemesterYearAndSemesterPartAndCourseId($teacherId,$semesterYear,$semesterPart,$courseId)
{

    require("connection_connect.php");

    $countGPAXs = [];

    $semester = getSemesterPresent();


    $sql = "SELECT gpaxstatus.gpaxStatusName,IFNULL(count,0) AS count
        FROM gpaxstatus LEFT JOIN
        (SELECT gpaxStatusId,gpaxStatusName,COUNT(studentId) AS count
        FROM semester NATURAL JOIN fact_term_summary NATURAL JOIN fact_student NATURAL JOIN gpaxstatus
        WHERE teacherId = 1 AND courseId = ".$courseId." AND semesterYear = " . $semesterYear . " AND semesterPart = '" . $semesterPart . "'
        GROUP BY gpaxStatusId) A
        ON gpaxstatus.gpaxStatusId = A.gpaxStatusId";

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $countGPAXs[] = $my_row;
    }

    require("connection_close.php");

    foreach ($countGPAXs as $gpax) {


        if ($gpax["gpaxStatusName"] == "เกียรตินิยม") {
            $gpaxStatusCount["blue"] = $gpax["count"];
        } else if ($gpax["gpaxStatusName"] == "ปกติ") {
            $gpaxStatusCount["green"] = $gpax["count"];
        } else if ($gpax["gpaxStatusName"] == "รอพินิจ") {
            $gpaxStatusCount["orange"] = $gpax["count"];
        } else if ($gpax["gpaxStatusName"] == "โปรต่ำ") {
            $gpaxStatusCount["red"] = $gpax["count"];
        }



    }

    return $gpaxStatusCount;

}

function getCountStudentByPlaningByTeacherIdAndCourseIdAndSemesterYearAndSemesterPart($teacherId,$courseId,$year,$part)
{


    $planingStatus["plan"] = getCountStudentInTeacherByPlaningByTeacherIdAndPlaningStatusAndCouresId($teacherId, "ตามแผน",$courseId,$year,$part);
    $planingStatus["notPlan"] = getCountStudentInTeacherByPlaningByTeacherIdAndPlaningStatusAndCouresId($teacherId, "ไม่ตามแผน",$courseId,$year,$part);
    $planingStatus["retire"] = getCountStudentInTeacherByStudentStatusByTeacherIdAndStatus($teacherId, "พ้นสภาพ");
    $planingStatus["grad"] = getCountStudentInTeacherByStudentStatusByTeacherIdAndStatus($teacherId, "จบการศึกษา");

    return $planingStatus;

}

function getCountStudentInTeacherByPlaningByTeacherIdAndPlaningStatusAndCouresId($teacherId, $status,$courseId,$semesterYear,$semesterPart)
{

    require("connection_connect.php");

    $semester = getSemesterPresent();

    $sql = "SELECT planStatus,COUNT(studentId) AS count
        FROM semester NATURAL JOIN fact_term_summary NATURAL JOIN fact_student NATURAL JOIN gpaxstatus
        WHERE teacherId = " . $teacherId . " AND courseId = ".$courseId." AND semesterYear = " . $semesterYear . " AND semesterPart = '" . $semesterPart . "' AND studentStatusId = 1 AND planStatus = '" . $status . "';";

    $result = $conn->query($sql);
    $plan = $result->fetch_assoc();

    if (is_null($plan)) {
        $s["count"] = 0;
        $plan = $s;
    }

    require("connection_close.php");

    return $plan;

}

function getCountStudentPlanStatusBystudyGeneretionByTeacherIdAndSemesterYearAndSemesterPartAndCourseId($teacherId,$year,$part,$courseId)
{

    require("connection_connect.php");

    $semester = getSemesterPresent();

    $sql = "SELECT studyGeneretion,COUNT(CASE WHEN planStatus = 'ตามแผน' THEN planStatus END) AS planCount,COUNT(CASE WHEN planStatus = 'ไม่ตามแผน' THEN planStatus END) AS notPlanCount,COUNT(CASE WHEN planStatus = 'พ้นสภาพนิสิต' THEN planStatus END) AS retire,COUNT(CASE WHEN planStatus = 'จบการศึกษา' THEN planStatus END) AS grad
    FROM fact_student NATURAL JOIN fact_term_summary NATURAL JOIN semester
    WHERE fact_term_summary.teacherId = $teacherId AND semesterYear = ".$year." AND semesterPart = '".$part."' AND courseId = ".$courseId."
    GROUP BY studyGeneretion";

    $generetions = [];
    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $generetions[] = $my_row;
    }
    
    require("connection_close.php");

    return $generetions;

}


function getCountGradeRangeByTeacherIdAndStudyYearAndSemesterYearAndSemesterPartAndCourseId($teacherId, $studyYear,$year,$part,$courseId)
{


    require("connection_connect.php");

    $sqlGeneretion = "SELECT DISTINCT studyGeneretion
        FROM fact_student NATURAL JOIN fact_term_summary
        WHERE teacherId = " . $teacherId . " AND studyYear = " . $studyYear . " AND studyGeneretion <= ".$year." - 2500
        ORDER BY studyGeneretion";

    $generetions = [];

    $result = $conn->query($sqlGeneretion);

    while ($my_row = $result->fetch_assoc()) {
        $generetions[] = $my_row["studyGeneretion"];
    }

    $rangeGradeStudyYears = [];

    foreach ($generetions as $generetion) {
        $rangeGradeStudy["studyGeneretion"] = $generetion;
        $rangeGrades = getCountGradeRangeByTeacherIdAndStudyGeneretionAndStudyYearAndSemesterYearAndSemesterPartAndCourseId($teacherId, $generetion, $studyYear,$year,$part,$courseId);

        foreach ($rangeGrades as $rangeGrade) {
            $gpaStatusName = $rangeGrade["gpaStatusName"];
            $rangeGradeStudy["$gpaStatusName"] = $rangeGrade["count"];
        }
        $rangeGradeStudyYears[] = $rangeGradeStudy;


    }

    require("connection_close.php");

    return $rangeGradeStudyYears;

}

function getCountGradeRangeByTeacherIdAndStudyGeneretionAndStudyYearAndSemesterYearAndSemesterPartAndCourseId($teacherId, $generetion,$studyYear,$year,$part,$courseId)
{

    require("connection_connect.php");

    if($part == "ภาคต้น"){
        $term = 1;
    }
    else if($part == "ภาคปลาย") {
        $term = 2;
    }

    $sql = "SELECT gpaStatusName,IFNULL(count,0) AS count
        FROM gpastatus LEFT JOIN 
        (SELECT gpaStatusId,COUNT(*) as count
        FROM semester NATURAL JOIN fact_term_summary NATURAL JOIN fact_student
        WHERE fact_term_summary.teacherId = " . $teacherId . " AND studyYear = " . $studyYear . " AND studyGeneretion = " . $generetion . " AND studyTerm =".$term."
        GROUP BY gpaStatusId) AS A
        ON gpastatus.gpaStatusId = A.gpaStatusId";

    $rangeGrades = [];

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $rangeGrades[] = $my_row;
    }
    require("connection_close.php");

    return $rangeGrades;



}

function getCountStudySemesterYearPartByTeacherIDAndSemesterYearAndSemesterPartAndCourseId($teacherId,$year,$part,$courseId)
{
    require("connection_connect.php");

    $sql = "SELECT semesterYear,semesterPart,COUNT(CASE WHEN planStatus = 'ตามแผน' THEN planStatus END) AS planStatus,COUNT(CASE WHEN planStatus = 'ไม่ตามแผน' THEN planStatus END) AS notPlanStatus,COUNT(CASE WHEN planStatus = 'ลาออก' THEN planStatus END) AS resign
        FROM fact_student NATURAL JOIN fact_term_summary NATURAL JOIN semester
        WHERE fact_term_summary.teacherId = " . $teacherId . " AND semesterPart = '".$part."' AND semesterYear = ".$year." AND courseId = ".$courseId."
        GROUP BY semesterYear,semesterPart";

    $countStudySemesters = [];

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        
        $my_row["studentPlans"] = getListStudentByTeacherIDAndPlanStatusAndSemesterYearAndSemesterYear($teacherId,'ตามแผน',$my_row["semesterYear"],$my_row["semesterPart"]);
        $my_row["studentNotPlans"] = getListStudentByTeacherIDAndPlanStatusAndSemesterYearAndSemesterYear($teacherId,'ไม่ตามแผน',$my_row["semesterYear"],$my_row["semesterPart"]);
        $my_row["studentResign"] = getListStudentByTeacherIDAndPlanStatusAndSemesterYearAndSemesterYear($teacherId,'ลาออก',$my_row["semesterYear"],$my_row["semesterPart"]);
        $countStudySemesters[] = $my_row;

    }



    require("connection_close.php");

    return $countStudySemesters;
}

function getStudentInAdviserBtTeacherId($teacherId){

    require("connection_connect.php");


    $students = [];

    $sql = "SELECT studentId FROM fact_student WHERE teacherId = ".$teacherId;

    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {

        
        
        $student = getStudentByStudentId($my_row["studentId"]);
        //echo $my_row["studentId"];

        $students[] = $student;
        
        

    }



    require("connection_close.php");

    return $students;

}




?>