<?php


function getListRegisByStudentIdAndSemesterId($studentId, $semesterId)
{

    require("connection_connect.php");

    $sql = "SELECT * FROM fact_regis NATURAL JOIN subject WHERE studentId = '" . $studentId . "' AND semesterId = " . $semesterId;
    $result = $conn->query($sql);
    //$regisList = $result->fetch_assoc();


    while($my_row = $result->fetch_assoc()){
        $regisList[] = $my_row;
    }


    require("connection_close.php");

    return $regisList;
}

function getListRegisByStudentId($studentId)
{

    require("connection_connect.php");

    $sql = "SELECT * FROM fact_regis NATURAL JOIN subject WHERE studentId = '" . $studentId . "'";
    $result = $conn->query($sql);
    //$regisList = $result->fetch_assoc();


    while($my_row = $result->fetch_assoc()){
        $regisList[] = $my_row;
    }


    require("connection_close.php");

    return $regisList;
}


?>