<?php


    function getDepartmentById($departmentId){

        require("connection_connect.php");

        $sql = "SELECT * FROM department WHERE departmentId = ".$departmentId;
        $result = $conn->query($sql);
        $department = $result->fetch_assoc();

        require("connection_close.php");

        return $department;

    }


?>