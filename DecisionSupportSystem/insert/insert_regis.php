<?php

include_once '../function/regisFunction.php';
require_once '../function/studentFunction.php';






$year = 2566;
$part = "ภาคต้น";

$studentIds = [];

//ภาคปลาย
//ภาคต้น
//ภาคฤดูร้อน

// Open uploaded CSV file with read-only mode
$csvFile = fopen("D:\CPEKU\Project66\\regis_csv\\2566_1_regis.csv", 'r');

// Skip the first line
fgetcsv($csvFile);


require("../function/connection_connect.php");

$querySemester = "SELECT * FROM semester WHERE semesterYear = '" . $year . "' AND semesterPart = '" . $part . "'";
$result = $conn->query($querySemester); //mysqli_query($conn, $querySemester);
$semester = $result->fetch_assoc();
$semesterId = $semester["semesterId"];


while (($getData = fgetcsv($csvFile, 1000000, ",")) !== FALSE) {

    $studentId = $getData[0];
    $subjectCode = $getData[1];
    $subjectCourse = $getData[2];
    $room = $getData[3];
    $secLecture = $getData[4];
    $secLab = $getData[5];
    $gradeCharacter = $getData[6];
    $gradeNumber = $getData[7];
    $typeRegis = $getData[8];
    $classTimeLectureNum = $getData[9];
    $classTimeLabNum = $getData[10];


    if (!in_array($studentId, $studentIds)) {
        $studentIds[] = $studentId;
    }

    if ($secLecture == null) {
        $secLecture = 0;
    }
    if ($secLab == null) {
        $secLab = 0;
    }



    $sqlRoom = "SELECT * FROM room WHERE roomName = '" . $room . "'";
    $resultRoom = $conn->query($sqlRoom);
    $room1 = $resultRoom->fetch_assoc();
    $roomId = $room1["roomId"];
    echo $sqlRoom."<br>";

    $sqlTypeRegis = "SELECT * FROM typeregis WHERE type = '" . $typeRegis . "'";
    $resultTypeRegis = $conn->query($sqlTypeRegis);
    $typeRegis = $resultTypeRegis->fetch_assoc();
    $typeRegisId = $typeRegis["typeRegisId"];
    echo $sqlTypeRegis."<br>";

    $sqlSubject = "SELECT * FROM subject WHERE subjectCode = '" . $subjectCode . "' AND subjectCourse = " . $subjectCourse;
    $resultSubject = $conn->query($sqlSubject);
    $subject = $resultSubject->fetch_assoc();
    $subjectId = $subject["subjectId"];
    echo $sqlSubject."<br>";



    //เวลา เช้า บ่าย เย็น
    $classTimeLectureText = "ไม่มี";
    if ($classTimeLectureNum > 6.00 and $classTimeLectureNum < 13.00) {
        $classTimeLectureText = "เช้า";
    } else if ($classTimeLectureNum >= 13 and $classTimeLectureNum < 16.00) {
        $classTimeLectureText = "บ่าย";
    } else if ($classTimeLectureNum >= 16.00) {
        $classTimeLectureText = "เย็น";
    }

    $classTimeLabText = "ไม่มี";
    if ($classTimeLabNum > 6.00 and $classTimeLabNum < 13.00) {
        $classTimeLabText = "เช้า";
    } else if ($classTimeLabNum >= 13 and $classTimeLectureNum < 16.00) {
        $classTimeLabText = "บ่าย";
    } else if ($classTimeLabNum >= 16.00) {
        $classTimeLabText = "เย็น";
    }

    //echo $classTimeLectureText." ".$classTimeLabText."<br>";

    $queryCheck = "SELECT regisId FROM fact_regis WHERE studentId = '" . $studentId . "' AND subjectId = '" . $subjectId . "'" . " AND semesterId = '" . $semesterId . "'";
    $check = mysqli_query($conn, $queryCheck);

    if ($check->num_rows > 0) {

    } else {

        //$sql = "insert into subject(subjectCode,subjectCourse,nameSubjectThai,nameSubjectEng,credit,subjectTypeId,subjectGroupId) values ('$subjectCode','$subjectCourse','$nameSubjectThai','$nameSubjectEng',$credit,$subjectTypeId,$subjectGroupId)";
        $sql = "insert into fact_regis(studentId,subjectId,roomId,semesterId,secLecture,secLab,gradeCharacter,gradeNumber,typeRegisId,classTimeLecture,classTimeLab) values 
        ('$studentId',$subjectId,$roomId,$semesterId,$secLecture,$secLab,'$gradeCharacter',$gradeNumber,$typeRegisId,'$classTimeLectureText','$classTimeLabText')";
        //echo $sql."<br>";
        mysqli_query($conn, $sql);
    }





    //echo $studentId . " " . $subjectCode . " " . $subjectCourse . " " . $room . " " . $secLecture . " " . $secLab . " " . $gradeCharacter . " " . $gradeNumber . " " . $typeRegis . " " . $classTimeLectureNum . " " . $classTimeLabNum . "<br>";

    // $query = "SELECT regisId FROM fact_regis WHERE subjectCode = '" . $subjectCode . "' AND subjectCourse = '".$subjectCourse."'";

    // $check = mysqli_query($conn, $query);
}

//echo print_r($studentIds);



foreach ($studentIds as $sId) {
    //echo $sId." ".$semesterId;

    $regisList = getListRegisByStudentIdAndSemesterId($sId, $semesterId);

    //print_r($regisList);

    $sumCreditTerm = 0;
    $sumGradeCreditTerm = 0.0;

    foreach ($regisList as $regis) {
        //echo print_r($regis)."<br>";

        $sumGradeCreditTerm += $regis["gradeNumber"] * $regis["credit"];
        $sumCreditTerm += $regis["credit"];


    }

    //echo "$sId = $sumGradeCreditTerm ,".$sumCreditTerm."<br>";
    $gpaTerm = intval((($sumGradeCreditTerm / $sumCreditTerm) * 1000)) / 1000;
    //$gpaTerm = $sumGradeCreditTerm / $sumCreditTerm;
    //echo "Grade $sId = $gpaTerm <br>";

    $regisAllList = getListRegisByStudentId($sId);

    $sumCreditAll = 0;
    $sumGradeCreditAll = 0.0;

    foreach ($regisAllList as $regis) {
        //echo print_r($regis)."<br>";

        $sumGradeCreditAll += $regis["gradeNumber"] * $regis["credit"];
        $sumCreditAll += $regis["credit"];


    }

    echo "$sId = $sumGradeCreditAll ,".$sumCreditAll."<br>";
    $gpaAll = intval((($sumGradeCreditAll / $sumCreditAll) * 1000)) / 1000;
    echo "Grade $sId = $gpaAll<br>";


    //สถานภาพของนิสิต
    if ($gpaAll >= 0 and $gpaAll <= 1.5) {
        $gpaxStatusId = 4;
    } else if ($gpaAll >= 1.5 and $gpaAll <= 1.75) {
        $gpaxStatusId = 3;
    } else if ($gpaAll >= 1.76 and $gpaAll <= 3.24) {
        $gpaxStatusId = 2;
    } else if ($gpaAll >= 3.25 and $gpaAll <= 4.00) {
        $gpaxStatusId = 1;
    }


    //ระดับเกรดของนิสิต
    if ($gpaAll >= 0 and $gpaAll <= 1.7499) {
        $gpaStatusId = 1;
    } else if ($gpaAll >= 1.75 and $gpaAll <= 1.9999) {
        $gpaStatusId = 2;
    } else if ($gpaAll >= 2.0 and $gpaAll <= 3.24999) {
        $gpaStatusId = 3;
    } else if ($gpaAll >= 3.25 and $gpaAll <= 4.00) {
        $gpaStatusId = 4;
    }




    $student = getStudentByStudentId($sId);

    $studyYear = $year - $student["tcasYear"] + 1;

    $studentStatusId = $student["studentStatusId"];

    echo $sId . " ชั้นปีที่ $studyYear : GPA = $gpaTerm , GPAX = $gpaAll,$gpaxStatusId & $gpaStatusId ";



    $queryCheck = "SELECT termSummaryId FROM fact_term_summary WHERE studentId = '" . $studentId . "' AND semesterId = " . $semesterId;
    $check = mysqli_query($conn, $queryCheck);

    if ($check->num_rows > 0) {

    } else {

        $sqlTerm = "insert into fact_term_summary(studentId,studentStatusId,creditTerm,gpaTerm,gpaAll,creditAll,studyYear,gpaStatusId,gpaxStatusId ,semesterId) values 
        ('$studentId',$studentStatusId,$sumCreditTerm,$gpaTerm,$gpaAll,$sumCreditAll,$studyYear,$gpaStatusId,$gpaxStatusId,$semesterId)";
        echo $sqlTerm;
        mysqli_query($conn, $sqlTerm);
    }




}




require("../function/connection_close.php");

?>