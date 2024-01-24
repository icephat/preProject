<?php


session_start();

$sql = "UPDATE student
        SET tell = '".$_POST["tell"]."' , parentTell = '".$_POST["pTell"]."'
        WHERE studentUsername = '".$_SESSION["access-user"]."'";

require_once '../function/connection_connect.php';

$result = $conn->query($sql);

require_once '../function/connection_close.php';

header('Location: ' . '../student/info.php');
exit();

?>