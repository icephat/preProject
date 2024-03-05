<?php

include_once '../function/regisFunction.php';
require_once '../function/studentFunction.php';
require_once '../function/courseFunction.php';






$year = $_POST["semesterYear"];
$part = $_POST["semesterPart"];

if ($part == 1) {
    $partName = "ภาคต้น";
} elseif ($part == 2) {
    $partName = "ภาคปลาย";
} elseif ($part == 3) {
    $partName = "ภาคฤดูร้อน";
}

echo $year . " " . $part . " $partName<br>";



$p = 8;


$studentIds = [];

//ภาคปลาย
//ภาคต้น
//ภาคฤดูร้อน

// Open uploaded CSV file with read-only mode
// $csvFile = fopen("D:\CPEKU\Project66\\regis_csv\\".$year."_1_regis.csv", 'r');
$csvFile = fopen($_FILES['file']['tmp_name'], 'r');
// Skip the first line
fgetcsv($csvFile);


require("../function/connection_connect.php");

$queryCheck = "SELECT semesterId FROM semester WHERE semesterPart = '" . $partName . "' AND semesterYear = " . $year;
$check = mysqli_query($conn, $queryCheck);
if ($check->num_rows == 0) {
    $sqlInsertSemester = "insert into semester(semesterYear,semesterPart) values ($year,'$partName')";
    mysqli_query($conn, $sqlInsertSemester);
}



$querySemester = "SELECT * FROM semester WHERE semesterYear = " . $year . " AND semesterPart = '" . $partName . "'";
$result = $conn->query($querySemester); //mysqli_query($conn, $querySemester);
$semester = $result->fetch_assoc();
$semesterId = $semester["semesterId"];


while (($getData = fgetcsv($csvFile, 1000000, ",")) !== FALSE) {

    $studentId = $getData[0];
    $subjectCode = $getData[1];
    $secLecture = $getData[2];
    $secLab = $getData[3];
    $gradeCharacter = $getData[4];
    $creditRegis = $getData[5];
    $typeRegis = $getData[6];
    $status = $getData[7];



    if (!in_array($studentId, $studentIds)) {
        $studentIds[] = $studentId;
    }

    if ($secLecture == null) {
        $secLecture = 0;
    }
    if ($secLab == null) {
        $secLab = 0;
    }

    if ($gradeCharacter == 'W' or $gradeCharacter == 'P') {
        $gradeNumber = 0;
    } elseif ($gradeCharacter == "A") {
        $gradeNumber = 4;
    } elseif ($gradeCharacter == "B+") {
        $gradeNumber = 3.5;
    } elseif ($gradeCharacter == "B") {
        $gradeNumber = 3;
    } elseif ($gradeCharacter == "C+") {
        $gradeNumber = 2.5;
    } elseif ($gradeCharacter == "C") {
        $gradeNumber = 2;
    } elseif ($gradeCharacter == "D+") {
        $gradeNumber = 1.5;
    } elseif ($gradeCharacter == "D") {
        $gradeNumber = 1;
    } elseif ($gradeCharacter == "F") {
        $gradeNumber = 0;
    }


    //หา typeRegisId
    $sqlTypeRegis = "SELECT * FROM typeregis WHERE type = '" . $typeRegis . "'";
    $resultTypeRegis = $conn->query($sqlTypeRegis);
    $typeRegis = $resultTypeRegis->fetch_assoc();
    $typeRegisId = $typeRegis["typeRegisId"];
    //echo $typeRegisId."<br>";



    //หา courseId ของ student
    $sqlCourseStudentSQL = "SELECT courseId FROM fact_student WHERE studentId = '$studentId'";
    $resultTCourse = $conn->query($sqlCourseStudentSQL);
    $course = $resultTCourse->fetch_assoc();
    $courseId = $course["courseId"];

    //หา courseListId
    $sqlCourseListSQL = "SELECT courseListId,courseGroupId,credit FROM courselist WHERE courseId = $courseId AND subjectCode = '$subjectCode'";
    $resultTCourseList = $conn->query($sqlCourseListSQL);
    $courseList = $resultTCourseList->fetch_assoc();

    if (!isset($courseList)) {

        $subjectNewCode = substr_replace($subjectCode, "XXX", 5);
        $sqlCourseListSQL = "SELECT courseListId,courseGroupId,credit FROM courselist WHERE courseId = $courseId AND subjectCode = '$subjectNewCode'";
        $resultTCourseList = $conn->query($sqlCourseListSQL);
        $courseList = $resultTCourseList->fetch_assoc();

        if (!isset($courseList)) {

            $subjectNewCode = substr_replace($subjectCode, "XXXXXXXX",0);
            $sqlCourseListSQL = "SELECT courseListId,courseGroupId,credit FROM courselist WHERE courseId = $courseId AND subjectCode = '$subjectNewCode'";
            $resultTCourseList = $conn->query($sqlCourseListSQL);
            $courseList = $resultTCourseList->fetch_assoc();
    
        }



    }

    $courseListId = $courseList["courseListId"];
    //$courseGroupId = $courseList["courseGroupId"];

    // $sqlSubject = "SELECT * FROM subject WHERE subjectCode = '" . $subjectCode . "' AND subjectCourse = " . $subjectCourse;
    // $resultSubject = $conn->query($sqlSubject);
    // $subject = $resultSubject->fetch_assoc();
    // $subjectId = $subject["subjectId"];
    //echo $sqlSubject."<br>";

    $student = getStudentByStudentIdForInsert($studentId);

    $studyYear = $year - $student["tcasYear"] + 1;

    if ($part == 3) {
        $studyYear = $studyYear + 1;
    }





    //echo $classTimeLectureText." ".$classTimeLabText."<br>";

    $queryCheck = "SELECT regisId FROM fact_regis WHERE studentId = '" . $studentId . "' AND courseListId = '" . $courseListId . "'" . " AND semesterId = '" . $semesterId . "'";
    $check = mysqli_query($conn, $queryCheck);

    if ($check->num_rows > 0) {
        echo "$queryCheck <br>";
    } else {

        //$sql = "insert into subject(subjectCode,subjectCourse,nameSubjectThai,nameSubjectEng,credit,subjectTypeId,subjectGroupId) values ('$subjectCode','$subjectCourse','$nameSubjectThai','$nameSubjectEng',$credit,$subjectTypeId,$subjectGroupId)";
        // $sql = "insert into fact_regis(studentId,subjectId,roomId,semesterId,secLecture,secLab,gradeCharacter,gradeNumber,typeRegisId,classTimeLecture,classTimeLab) values 
        // ('$studentId',$subjectId,$roomId,$semesterId,$secLecture,$secLab,'$gradeCharacter',$gradeNumber,$typeRegisId,'$classTimeLectureText','$classTimeLabText')";
        // echo $sql . "<br>";
        $sql = "INSERT INTO fact_regis(studentId,semesterId,courseListId,secLecture,secLab,gradeCharacter,gradeNumber,creditRegis,typeRegisId,studyYearInRegis,studyTermInRegis,semesterYearInRegis,semesterPartInRegis) 
        VALUES ('$studentId',$semesterId,$courseListId,$secLecture,$secLecture,'$gradeCharacter',$gradeNumber,$creditRegis,$typeRegisId,$studyYear,$part,$year,'$partName')";
        echo "$sql <br>";
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
    echo "<br>$sId ".count($regisList) . "<br><br>";

    //print_r($regisList);

    $sumCreditTerm = 0;
    $sumGradeCreditTerm = 0.0;

    foreach ($regisList as $regis) {
        //echo print_r($regis)."<br>";
        if ($regis["gradeCharacter"] != 'W' and $regis["gradeCharacter"] != 'P' and $regis["gradeCharacter"] != 'NP') {
            //echo $regis["gradeCharacter"]."<br>";
            $sumGradeCreditTerm += $regis["gradeNumber"] * $regis["creditRegis"];
            $sumCreditTerm += $regis["creditRegis"];
            echo $regis["gradeNumber"]." ".$regis["creditRegis"]."<br>";
        }



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
        if ($regis["gradeCharacter"] != 'W' and $regis["gradeCharacter"] != 'P' and $regis["gradeCharacter"] != 'NP') {
            //echo $regis["gradeCharacter"]."<br>";
            $sumGradeCreditAll += $regis["gradeNumber"] * $regis["creditRegis"];
            $sumCreditAll += $regis["creditRegis"];
        }



    }

    //echo "$sId = $sumGradeCreditAll ," . $sumCreditAll . "<br>";
    $gpaAll = intval((($sumGradeCreditAll / $sumCreditAll) * 1000)) / 1000;
    //echo "Grade $sId = $gpaAll<br>";


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




    $student = getStudentByStudentIdForInsert($sId);
    $courseId = $student["courseId"];
    $course = getCourseById($student["courseId"]);

    $studyYear = $year - $student["tcasYear"] + 1;

    if ($partName == "ภาคต้น") {
        $term = 1;
    } else if ($partName == "ภาคปลาย") {
        $term = 2;
    } else if ($partName == "ภาคฤดูร้อน") {
        $term = 3;
    }

    $studentStatusId = 1;

    $termX = $term;
    $studyYearX = $studyYear;

    if ($termX == 3) {
        $termX = 2;
        $studyYearX = $studyYearX - 1;
    }


    echo $term . "<br>";
    if ($term == 1 and $studyYear > 1) {
        echo 'เข้าอันนี้<br>';
        //$courseCredits = getSubjectGroupCreditTermOneCourseByCourseIdAndStudyYearAndPart($courseId, $studyYearX, $termX);
        $planCheckSQL = "SELECT subjectCode
        FROM courselist INNER JOIN coursegroup ON courselist.courseGroupId = coursegroup.courseGroupId
        WHERE studyYear <= $studyYearX-1 AND term <= $termX+1 AND factCheck = 0 AND subjectCode NOT IN (SELECT subjectCode
        FROM fact_regis NATURAL JOIN courselist INNER JOIN coursegroup ON courselist.courseGroupId = coursegroup.courseGroupId
        WHERE studentId = '$sId' AND gradeCharacter != 'W' AND gradeCharacter != 'P' AND gradeCharacter != 'NP' AND gradeCharacter != 'F') 
        UNION
        SELECT subjectCode
        FROM courselist INNER JOIN coursegroup ON courselist.courseGroupId = coursegroup.courseGroupId
        WHERE studyYear = $studyYearX AND term = $termX AND factCheck = 0 AND subjectCode NOT IN (SELECT subjectCode
        FROM fact_regis NATURAL JOIN courselist INNER JOIN coursegroup ON courselist.courseGroupId = coursegroup.courseGroupId
        WHERE studentId = '$sId' AND gradeCharacter != 'W' AND gradeCharacter != 'P' AND gradeCharacter != 'NP' AND gradeCharacter != 'F') 
        ";
    } else {
        //$courseCredits = getSubjectGroupCreditCourseByNameCourseAndPlanAndStudyYearAndPart($course["nameCourseUse"], $course["planCourse"], $studyYearX, $termX);

        $planCheckSQL = "SELECT subjectCode
        FROM courselist INNER JOIN coursegroup ON courselist.courseGroupId = coursegroup.courseGroupId
        WHERE studyYear <= $studyYearX AND term <= $termX AND factCheck = 0 AND subjectCode NOT IN (SELECT subjectCode
        FROM fact_regis NATURAL JOIN courselist INNER JOIN coursegroup ON courselist.courseGroupId = coursegroup.courseGroupId
        WHERE studentId = '$sId' AND gradeCharacter != 'W' AND gradeCharacter != 'P' AND gradeCharacter != 'NP' AND gradeCharacter != 'F');";


    }

    $result = $conn->query($planCheckSQL);

    $coursePlans = [];

    while ($my_row = $result->fetch_assoc()) {
        $coursePlans[] = $my_row;
    }

    if (count($coursePlans) == 0) {
        $courseChecks = "ตามแผน";
    } else {
        $courseChecks = "ไม่ตามแผน";
    }









    // $studentCreditSQL = "SELECT *
    // FROM fact_regis NATURAL JOIN courselist INNER JOIN coursegroup ON courselist.courseGroupId = coursegroup.courseGroupId
    // WHERE studentId = '6320500611' AND gradeCharacter != 'W' AND gradeCharacter != 'P' AND gradeCharacter != 'NP' AND gradeCharacter != 'F'";

    // $result = $conn->query($studentCreditSQL);

    // $studentCredits = [];

    // while ($my_row = $result->fetch_assoc()) {
    //     $studentCredits[] = $my_row;
    // }

    // for ($i = 0; $i < count($courseCredits); $i++) {

    //     for ($j = 0; $j < count($studentCredits); $j++) {
    //         if ($courseCredits[$i]["subjectGroup"] == $studentCredits[$j]["subjectGroup"]) {
    //             echo $sId . " " . $courseCredits[$i]["subjectGroup"] . " " . $studentCredits[$j]["credit"] . " " . $courseCredits[$i]["credit"] . "<br>";
    //             if ($studentCredits[$j]["credit"] < $courseCredits[$i]["credit"]) {
    //                 $courseChecks = "ไม่ตามแผน";
    //             }
    //         }
    //     }
    // }




    echo $sId . " ชั้นปีที่ $studyYear $courseChecks : GPA = $gpaTerm , GPAX = $gpaAll,$gpaxStatusId & $gpaStatusId ";



    $queryCheck = "SELECT termSummaryId FROM fact_term_summary WHERE studentId = '" . $sId . "' AND semesterId = " . $semesterId;
    $check = mysqli_query($conn, $queryCheck);

    if ($check->num_rows > 0) {

    } else {

        $teacherId = $student["teacherId"];

        $sqlTerm = "insert into fact_term_summary(studentId,studentStatusId,teacherId,creditTerm,gpaTerm,gpaAll,creditAll,studyYear,studyTerm,planStatus,gpaStatusId,gpaxStatusId ,semesterId,semesterYearInTerm,semesterPartInTerm) values 
        ('$sId',$studentStatusId,$teacherId,$sumCreditTerm,$gpaTerm,$gpaAll,$sumCreditAll,$studyYear,$term,'$courseChecks',$gpaStatusId,$gpaxStatusId,$semesterId,$year,'$partName')";
        echo $sqlTerm;
        mysqli_query($conn, $sqlTerm);
    }




}




require("../function/connection_close.php");

?>