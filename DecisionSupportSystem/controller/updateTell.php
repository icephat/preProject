<?php


session_start();

// $sql = "UPDATE student
//         SET tell = '" . $_POST["tell"] . "' , parentTell = '" . $_POST["pTell"] . "'
//         WHERE studentUsername = '" . $_SESSION["access-user"] . "'";

$sqlCourse = "UPDATE fact_student
        SET courseId = " . $_POST["courseId"] .
        " WHERE studentId = '" . $_SESSION["studentId"] . "'";
echo $sqlCourse;

require_once '../function/connection_connect.php';

// $result = $conn->query($sql);

$result = $conn->query($sqlCourse);

require_once '../function/connection_close.php';

$path = "../student/tell/" . $_SESSION["studentId"] . ".json";
$jsonString = file_get_contents($path);
$tell = json_decode($jsonString, true);



$tell["tell"] = $_POST["tell"];
$tell["parentTell"] = $_POST["pTell"];

$toJson = json_encode($tell);
file_put_contents($path, $toJson);


header('Location: ' . '../student/info.php');
exit();

?>