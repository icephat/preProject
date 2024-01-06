<?php

function getCourseById($id)
{

    require("connection_connect.php");

    $sql = "SELECT * FROM course WHERE courseId = " . $id ;

    $result = $conn->query($sql);
    $course = $result->fetch_assoc();


    require("connection_close.php");


    return $course;

}
?>