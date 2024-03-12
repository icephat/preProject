<?php

include_once '../function/regisFunction.php';
require_once '../function/studentFunction.php';
require_once '../function/courseFunction.php';


// Open uploaded CSV file with read-only mode
$csvFile = fopen("D:\CPEKU\Project66\status\studentStatus66.csv", 'r');

// Skip the first line
fgetcsv($csvFile);


require("../function/connection_connect.php");

while (($getData = fgetcsv($csvFile, 1000000, ",")) !== FALSE) {

    $studentId = $getData[0];
    $status = $getData[1];
    $semesterYear = $getData[3];
    $semesterPart = $getData[2];


    if ($semesterPart == "ภาคต้น") {
        $semesterPartNo = 1;
    } else {
        $semesterPartNo = 2;
    }

    $student = getStudentByStudentId($studentId);

    if (!isset($student)) {
        continue;
    }

    $gpaTerm = 0.00;
    $gpaAll = $student["gpax"];
    $sumCreditTerm = 0;
    $sumCreditAll = $student["credit"];
    $teacherId = $student["teacherId"];
    $studyYear = (int) $semesterYear - $student["tcasYear"] + 1;
    $term = $semesterPartNo;
    $gpaStatusId = 1;
    $gpaxStatusId = 4;
    echo $semesterYear . "$semesterPart<br>";
    $semesterId = getSemesterIdByYearAndPart((int) $semesterYear, $semesterPart);

    if(!isset($semesterId)){
        continue;
    }



    $studentStatusId = 3;


    $sql = "insert into fact_term_summary(studentId,studentStatusId,teacherId,creditTerm,gpaTerm,gpaAll,creditAll,studyYear,studyTerm,planStatus,gpaStatusId,gpaxStatusId ,semesterId,semesterYearInTerm,semesterPartInTerm) values 
    ('$studentId',$studentStatusId,$teacherId,$sumCreditTerm,$gpaTerm,$gpaAll,$sumCreditAll,$studyYear,$term,'$status',$gpaStatusId,$gpaxStatusId,$semesterId,$semesterYear,'$semesterPart')";

    //$queryCheck = "SELECT courseListId FROM courselist WHERE subjectCode = '" . $subjectCode . "' AND courseId = " . $courseId;
    //$check = mysqli_query($conn, $queryCheck);


    echo $sql . "<br>";
    mysqli_query($conn, $sql);


    // $sql = "insert into courselist(courseName,coursePlan,studyYear,term,subjectCode,credit,subjectGroup) values ('$courseName','$coursePlan',$studyYear,$term,'$subjectCode',$credit,'$subjectGroup')";

}








require("../function/connection_close.php");



?>