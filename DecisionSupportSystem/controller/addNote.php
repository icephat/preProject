<?php



session_start();



include_once '../function/teacherFunction.php';

$studentId = $_POST["studentId"];
$note = $_POST["note"];
$role = $_POST["role"];

$teacher = getTeacherByUsernameTeacher($_SESSION["access-user"]);




$remark;
if (file_exists("../teacher/note/" . $studentId . ".json")) {

    $path = "../teacher/note/" . $studentId . ".json";
    $jsonString = file_get_contents($path);
    $remark = json_decode($jsonString, true);
    $count = $remark["count"];
    $remark["note".$count] = $_POST["note"];
    $remark["name".$count] = $teacher["fisrtNameTh"]." ".$teacher["lastNameTh"];
    $remark["date".$count] = date("Y/m/d");
    $remark["username".$count] =  $_SESSION["access-user"];
    $remark["status".$count] = "on";
    $remark["count"] = $remark["count"] + 1;
    
} else {
    $remark["count"] = 1;
    $count = $remark["count"];
    $remark["note1"] = $_POST["note"];
    $remark["name1"] = $teacher["fisrtNameTh"]." ".$teacher["lastNameTh"];
    $remark["date".$count] = date("Y/m/d");
    $remark["username".$count] =  $teacher["access-user"];
    $remark["status".$count] = "on";
    $remark["count"] = $remark["count"] + 1;
}

$path = "../teacher/note/" . $studentId . ".json";
$toJson = json_encode($remark);
file_put_contents($path, $toJson);


// header('Location: ' . '../teacher/student_info.php?studentId='.$studentId);
// exit();

echo $role;




?>

<html>

<head>
    <title></title>
</head>

<body OnLoad="document.form1.submit();">
    <form action="../<?php echo $role?>/student_info.php" method="post" name="form1">
        <input type="hidden" name="studentId" value="<?php echo $studentId; ?>" />
        
        <input name="btnSubmit" type="submit" value="Submit">
    </form>
</body>

</html>