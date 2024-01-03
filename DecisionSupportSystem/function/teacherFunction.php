<?php


    function getTeacherById($teacherId){

        require("connection_connect.php");

        $sql = "SELECT * FROM teacher WHERE teacherId = ".$teacherId;
        $result = $conn->query($sql);
        $teacher = $result->fetch_assoc();

        require("connection_close.php");

        return $teacher;

    }


?>