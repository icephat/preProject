<?php

$course = $_POST["courseName"];
// $tcas = $_POST["tcas"];
$generetion = $_POST["generetion"];


if ($generetion == 0) {

    ?>
    <html>

    <head>
        <title></title>
    </head>

    <body OnLoad="document.form1.submit();">
        <form action="../head/student_static_tcasRound_search.php" method="post" name="form1">
            <input type="text" name="courseName" value="<?php echo $course; ?>" />
            <!--<a type="button" name="std_info">
                            <span class="glyphicon glyphicon-user"></span></a>-->
            <input name="btnSubmit" type="submit" value="Submit">
        </form>
    </body>

    </html>
    <?php
} else {
    ?>
    <html>

    <head>
        <title></title>
    </head>

    <body OnLoad="document.form1.submit();">
        <form action="../head/student_static_tcasRound_search_generetion.php" method="post" name="form1">
            <input type="text" name="courseName" value="<?php echo $course; ?>" />
            <input type="number" name="generetion" value="<?php echo $generetion; ?>" />
            <!--<a type="button" name="std_info">
                    <span class="glyphicon glyphicon-user"></span></a>-->
            <input name="btnSubmit" type="submit" value="Submit">
        </form>
    </body>

    </html>
    <?php
}
?>