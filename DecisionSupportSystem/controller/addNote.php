<?php

$studentId = $_POST["studentId"];
$note = $_POST["note"];


$remark;
if (file_exists("../teacher/note/" . $studentId . ".json")) {

    $path = "../teacher/note/" . $studentId . ".json";
    $jsonString = file_get_contents($path);
    $remark = json_decode($jsonString, true);

    $remark = $remark . "," . $note;
} else {
    $remark = $_POST["note"];
}

$path = "../teacher/note/" . $studentId . ".json";
$toJson = json_encode($remark);
file_put_contents($path, $toJson);


// header('Location: ' . '../teacher/student_info.php?studentId='.$studentId);
// exit();




?>

<html>

<head>
    <title></title>
</head>

<body OnLoad="document.form1.submit();">
    <form action="../teacher/student_info.php" method="post" name="form1">
        <input type="hidden" name="studentId" value="<?php echo $studentId; ?>" />
        <!--<a type="button" name="std_info">
                                <span class="glyphicon glyphicon-user"></span></a>-->
        <input name="btnSubmit" type="submit" value="Submit">
    </form>
</body>

</html>