<?php


function getListRegisByStudentIdAndSemesterId($studentId, $semesterId)
{

    require("connection_connect.php");

    $sql = "SELECT * FROM fact_regis NATURAL JOIN courselist WHERE studentId = '" . $studentId . "' AND semesterId = " . $semesterId." 
    ORDER BY gradeNumber,credit,subjectCode";
    $result = $conn->query($sql);
    //$regisList = $result->fetch_assoc();

    $regisList = [];
    while ($my_row = $result->fetch_assoc()) {
        $regisList[] = $my_row;
    }


    require("connection_close.php");

    return $regisList;
}

function getListRegisByStudentId($studentId)
{

    $regisList = [];
    require("connection_connect.php");

    $sql = "SELECT * FROM fact_regis NATURAL JOIN courselist WHERE studentId = '" . $studentId . "'";
    $result = $conn->query($sql);
    //$regisList = $result->fetch_assoc();


    while ($my_row = $result->fetch_assoc()) {
        $regisList[] = $my_row;
    }


    require("connection_close.php");

    return $regisList;
}

function getListRegisNotFAndWByStudentId($studentId)
{

    require("connection_connect.php");
    $regisList = [];

    $sql = "SELECT * FROM fact_regis NATURAL JOIN subject WHERE studentId = '" . $studentId . "' AND gradeCharacter != 'F' AND gradeCharacter != 'W'";
    $result = $conn->query($sql);
    //$regisList = $result->fetch_assoc();


    while ($my_row = $result->fetch_assoc()) {
        $regisList[] = $my_row;
    }


    require("connection_close.php");

    return $regisList;
}

function getListSubjectPassInRegisByStudentIdAndSubjectCategory($studentId, $subjectCategoryName)
{

    require("connection_connect.php");

    $sql = "SELECT * 
    FROM semester NATURAL JOIN fact_regis NATURAL JOIN courselist INNER JOIN coursegroup ON courselist.courseGroupId = coursegroup.courseGroupId 
    WHERE studentId = '" . $studentId . "' AND categoryName = '" . $subjectCategoryName . "' AND (gradeCharacter != 'F' AND gradeCharacter != 'W' AND gradeCharacter != 'P')";
    $result = $conn->query($sql);
    $subjects=[];
    while ($my_row = $result->fetch_assoc()) {
        $subjects[] = $my_row;
    }


    require("connection_close.php");

    return $subjects;

}

function getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, $subjectGroup)
{
    require("connection_connect.php");
    $subjects = [];
    $sql = "SELECT * 
    FROM semester NATURAL JOIN fact_regis NATURAL JOIN courselist NATURAL JOIN coursegroup
    WHERE studentId = '" . $studentId . "' AND groupName = '" . $subjectGroup . "' AND gradeCharacter != 'NP' AND gradeCharacter != 'W' AND gradeCharacter != 'P' AND gradeCharacter != 'F'";
    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $subjects[] = $my_row;
    }


    require("connection_close.php");

    return $subjects;

}




?>