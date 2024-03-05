<?php


// Open uploaded CSV file with read-only mode
$csvFile = fopen("D:\CPEKU\Project66\course\cpe\course_cpe_60_not_int.csv", 'r');

// Skip the first line
fgetcsv($csvFile);


require("../function/connection_connect.php");

while (($getData = fgetcsv($csvFile, 1000000, ",")) !== FALSE) {

    $courseName = $getData[0];
    $coursePlan = $getData[1];
    $studyYear = $getData[2];
    $term = $getData[3];
    $subjectCode = $getData[4];
    $subjectNameTh = $getData[5];
    $subjectNameEng = $getData[6];
    $credit = $getData[7];
    $lecH = $getData[8];
    $labH = $getData[9];
    $selfH = $getData[10];
    $subjectGroup = $getData[11];
    $fact = $getData[12];


    //หา courseId
    $courseSQL = "SELECT courseId
    FROM course
    WHERE nameCourseUse = '$courseName' AND planCourse = '$coursePlan'";
    $result = $conn->query($courseSQL); //mysqli_query($conn, $querySemester);
    $course = $result->fetch_assoc();
    $courseId = $course["courseId"];

    //หา courseGroupId
    $courseGroupSQL = "SELECT courseGroupId
    FROM coursegroup
    WHERE courseId = $courseId AND groupName = '$subjectGroup'";
    // echo $courseGroupSQL."<br>";
    $result = $conn->query($courseGroupSQL); //mysqli_query($conn, $querySemester);
    $courseGroup = $result->fetch_assoc();
    $courseGroupId = $courseGroup["courseGroupId"];


    $sql = "INSERT INTO courselist(courseId,courseGroupId,studyYear,term,subjectCode,subjectNameTh,subjectNameEng,credit,lecture,lab,selfStudy,factCheck) VALUES ($courseId,$courseGroupId,$studyYear,$term,'$subjectCode','$subjectNameTh','$subjectNameEng',$credit,$lecH,$labH,$selfH,$fact)";

    $queryCheck = "SELECT courseListId FROM courselist WHERE subjectCode = '" . $subjectCode . "' AND courseId = " . $courseId;
    $check = mysqli_query($conn, $queryCheck);

    if ($check->num_rows > 0) {

    } else {
        mysqli_query($conn, $sql);
    }

    // $sql = "insert into courselist(courseName,coursePlan,studyYear,term,subjectCode,credit,subjectGroup) values ('$courseName','$coursePlan',$studyYear,$term,'$subjectCode',$credit,'$subjectGroup')";

}








require("../function/connection_close.php");



?>