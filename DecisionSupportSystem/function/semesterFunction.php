<?php

function getSemesterPresent(){
    require("connection_connect.php");

    $sql = "SELECT semesterId,semesterYear,MAX(semesterPart) AS semesterPart
    FROM semester
    WHERE semesterPart != 'ภาคฤดูร้อน' AND semesterYear IN (SELECT MAX(semesterYear) AS semesterYear
    FROM semester
    WHERE semesterPart != 'ภาคฤดูร้อน')";

    $result = $conn->query($sql);
    $semester = $result->fetch_assoc();



    require("connection_close.php");

    return $semester;

}

function getSemesterIdByYearAndPart($year,$part){
    require("connection_connect.php");

    

    $sql = "SELECT semesterId
    FROM semester
    WHERE semesterPart = '".$part."' AND semesterYear = ".$year;

    $result = $conn->query($sql);
    $semester = $result->fetch_assoc();



    require("connection_close.php");

    return $semester["semesterId"];

}

?>