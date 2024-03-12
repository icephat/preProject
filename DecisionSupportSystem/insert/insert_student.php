<?php


$generetion = $_POST["generetion"];
$departmentCode = $_POST["department"];



$csvFile = fopen($_FILES['file']['tmp_name'], 'r');
// Skip the first line
fgetcsv($csvFile);


require("../function/connection_connect.php");


while (($getData = fgetcsv($csvFile, 1000000, ",")) !== FALSE) {

    $studentId = $getData[0];
    $title = $getData[1];
    $firstName = $getData[2];
    $lastName = $getData[3];
    $tcas = $getData[4];
    $teacherCode = $getData[5];

    $studentUsername = "b" . $studentId;


    if ($title == "นาย") {
        $titleEng = "Mr.";
    } else {
        $titleEng = "Mrs.";
    }



    //หา tcasId
    $tcasSQL = "SELECT * FROM tcas WHERE tcasRound = $tcas";
    $resultTcas = $conn->query($tcasSQL);
    $tcas = $resultTcas->fetch_assoc();
    $tcasId = $tcas["tcasId"];



    //หา teacherId
    $teacherSQL = "SELECT teacherId FROM teacher WHERE teacherCode = '$teacherCode'";
    $resultTeacher = $conn->query($teacherSQL);
    $teacher = $resultTeacher->fetch_assoc();
    $teacherId = $teacher["teacherId"];
    echo $teacherSQL."<br>";

    //หา departmentId
    $departmentSQL = "SELECT departmentId FROM department WHERE departmentCode = '$departmentCode'";
    $resultDepartment = $conn->query($departmentSQL);
    $department = $resultDepartment->fetch_assoc();
    $departmentId = $department["departmentId"];

    $courseId = 6;
    // $courseId = 6;


    $queryCheck = "SELECT studentId FROM student WHERE studentId = '" . $studentId . "'";
    $check = mysqli_query($conn, $queryCheck);

    if ($check->num_rows > 0) {
        echo "$queryCheck <br>";
    } else {
        $sql = "INSERT INTO student(studentId,studentUsername,fisrtNameTh,lastNameTh,titleTh,titleEng,tell,parentTell,email)
        VALUES ('$studentId','$studentUsername','$firstName','$lastName','$title','$titleEng','XXXXXXXXXX','XXXXXXXXXX','XXXX.YYYY@ku.th')";

        $path = "../student/tell/" . $studentId . ".json";
        $tell["tell"] = "XXXXXXXXXX";
        $tell["parentTell"] ="XXXXXXXXXX";
        $toJson = json_encode($tell);
        file_put_contents($path, $toJson);

        // $sql = "INSERT INTO student(studentId,semesterId,courseListId,secLecture,secLab,gradeCharacter,gradeNumber,creditRegis,typeRegisId,studyYearInRegis,studyTermInRegis,semesterYearInRegis,semesterPartInRegis) 
        // VALUES ('$studentId',$semesterId,$courseListId,$secLecture,$secLecture,'$gradeCharacter',$gradeNumber,$creditRegis,$typeRegisId,$studyYear,$part,$year,'$partName')";
        // echo "$sql <br>";
        mysqli_query($conn, $sql);

        $tcasYear = 2500+$generetion;

        $sqlFactStudent = "INSERT INTO fact_student(studentId,schoolId,departmentId,programId,teacherId,courseId,tcasId,tcasYear,studyGeneretion)
        VALUES ('$studentId',1,$departmentId,1,$teacherId,$courseId,$tcasId,$tcasYear,$generetion)";
        echo $sqlFactStudent."<br>";
        mysqli_query($conn, $sqlFactStudent);
    }
}



require("../function/connection_close.php");



?>