<?php


require_once 'departmentFunction.php';
require_once 'programFunction.php';
require_once 'teacherFunction.php';
require_once 'schoolFunction.php';
require_once 'termSummaryFunction.php';
require_once 'regisFunction.php';
require_once 'courseFunction.php';


function getStudentByUsername($studentUsername)
{
    require("connection_connect.php");

    $sql = "SELECT * FROM student NATURAL JOIN fact_student NATURAL JOIN studentstatus WHERE studentUsername = '" . $studentUsername . "'";

    $result = $conn->query($sql);
    $student = $result->fetch_assoc();

    $student["teacher"] = getTeacherById($student["teacherId"]);
    $student["program"] = getProgramById($student["programId"]);
    $student["department"] = getDepartmentById($student["departmentId"]);
    $student["school"] = getSchoolById($student["schoolId"]);
    $student["terms"] = getTermSummaryListByStudentId($student["studentId"]);
    $student["gpax"] = getGPAX($student["studentId"]);
    $student["credit"] = getCredit($student["studentId"]);

    require("connection_close.php");

    return $student;

}

function getStudentByStudentId($studentId)
{
    require("connection_connect.php");

    $sql = "SELECT * FROM student NATURAL JOIN fact_student NATURAL JOIN studentstatus WHERE $studentId = '" . $studentId . "'";

    $result = $conn->query($sql);
    $student = $result->fetch_assoc();

    $student["teacher"] = getTeacherById($student["teacherId"]);
    $student["program"] = getProgramById($student["programId"]);
    $student["department"] = getDepartmentById($student["departmentId"]);
    $student["school"] = getSchoolById($student["schoolId"]);
    $student["terms"] = getTermSummaryListByStudentId($student["studentId"]);
    $student["gpax"] = getGPAX($student["studentId"]);
    $student["credit"] = getCredit($student["studentId"]);

    require("connection_close.php");

    return $student;

}

function getGPAX($studentId)
{

    $regisAllList = getListRegisByStudentId($studentId);

    require("connection_connect.php");

    $sumCreditAll = 0;
    $sumGradeCreditAll = 0.0;

    foreach ($regisAllList as $regis) {
        //echo print_r($regis)."<br>";
        if($regis["gradeCharacter"] != 'W' and $regis["gradeCharacter"] != 'P' and $regis["gradeCharacter"] != 'NP')
        $sumGradeCreditAll += $regis["gradeNumber"] * $regis["credit"];
        $sumCreditAll += $regis["credit"];


    }

    $gpaAll = intval((($sumGradeCreditAll / $sumCreditAll) * 1000)) / 1000;



    require("connection_close.php");

    return $gpaAll;
}

function getCredit($studentId)
{

    $regisAllList = getListRegisNotFAndWByStudentId($studentId);

    require("connection_connect.php");

    $sumCreditAll = 0;

    foreach ($regisAllList as $regis) {
        //echo print_r($regis)."<br>";
        $sumCreditAll += $regis["credit"];


    }




    require("connection_close.php");

    return $sumCreditAll;
}

function getListSubjectForFAndWByStudentId($studentId)
{

    require("connection_connect.php");
    $subjects = [];
    $sql = "SELECT * FROM semester NATURAL JOIN fact_regis NATURAL JOIN subject NATURAL JOIN subjectgroup NATURAL JOIN subjectcategory WHERE studentId = '" . $studentId . "' AND ( gradeCharacter = 'F' OR gradeCharacter = 'W')";
    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $subjects[] = $my_row;
    }


    require("connection_close.php");

    return $subjects;
}


function getListSubjectInRegisByStudentIdAndSubjectCategory($studentId, $subjectCategoryName)
{

    require("connection_connect.php");

    $sql = "SELECT * FROM semester NATURAL JOIN fact_regis NATURAL JOIN subject NATURAL JOIN subjectgroup NATURAL JOIN subjectcategory WHERE studentId = '" . $studentId . "' AND subjectCategoryName = '" . $subjectCategoryName . "' AND (gradeCharacter != 'P' OR gradeCharacter != 'W' )";
    $result = $conn->query($sql);
    $subjects = [];
    while ($my_row = $result->fetch_assoc()) {
        $subjects[] = $my_row;
    }


    require("connection_close.php");

    return $subjects;

}

function getListSubjectInRegisByStudentIdAndSubjectGroup($studentId, $subjectGroup)
{
    require("connection_connect.php");

    $sql = "SELECT * FROM semester NATURAL JOIN fact_regis NATURAL JOIN subject NATURAL JOIN subjectgroup NATURAL JOIN subjectcategory WHERE studentId = '" . $studentId . "' AND subjectGroup = '" . $subjectGroup . "' AND (gradeCharacter != 'P' OR gradeCharacter != 'W' )";
    $result = $conn->query($sql);

    $subjects = [];
    while ($my_row = $result->fetch_assoc()) {
        $subjects[] = $my_row;
    }


    require("connection_close.php");

    return $subjects;

}

function getSumCreditSubjectCategoryByStudentId($studentId)
{

    require("connection_connect.php");

    $sql = "SELECT subjectCategoryName,SUM(credit) AS credit FROM fact_regis NATURAL JOIN subject NATURAL JOIN subjectgroup NATURAL JOIN subjectcategory WHERE studentId = '" . $studentId . "' AND (gradeCharacter != 'F' OR gradeCharacter != 'W' ) GROUP BY subjectCategoryName;";
    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $subjectCategoryCredits[] = $my_row;
    }

    require("connection_close.php");


    return $subjectCategoryCredits;

}

function getSumCreditSubjectGroupByStudentId($studentId)
{

    require("connection_connect.php");

    $sql = "SELECT subjectGroup,SUM(credit) AS credit FROM fact_regis NATURAL JOIN subject NATURAL JOIN subjectgroup NATURAL JOIN subjectcategory WHERE studentId = '" . $studentId . "' AND (gradeCharacter != 'F' OR gradeCharacter != 'W' ) GROUP BY subjectGroup;";
    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $subjectGroupCredits[] = $my_row;
    }

    require("connection_close.php");


    return $subjectGroupCredits;

}

function getAcademicInSubjectCategoryByStudentId($studentId)
{
    $student = getStudentByStudentId($studentId);

    $academicStudents = [];

    $course = getCourseById($student['courseId']);

    //$generalSubjectPassList = getListSubjectPassInRegisByStudentIdAndSubjectCategory($studentId,"หมวดวิชาศึกษาทั่วไป");



    $freeSubjectCredit = 0;
    $freeSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "วิชาเลือกเสรี");
    foreach ($freeSubjects as $freeSubject) {
        $freeSubjectCredit += $freeSubject["credit"];
    }


    $generalSubjectCredit = 0;
    // foreach($generalSubjectPassList as $generalSubject){

    //     if($sumCreditGeneral < $course["generalSubjectCredit"]){
    //         $sumCreditGeneral += $generalSubject["credit"];
    //         //echo $sumCreditGeneral."<br>";
    //     }
    //     else{
    //         $sumCregitFree += $generalSubject["credit"];
    //         $freeSubjects[] = $generalSubject;
    //     }
    // }


    $happySubjectCredit = 0;
    $happySubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระอยู่ดีมีสุข");

    foreach ($happySubjects as $happySubject) {

        if ($happySubjectCredit < $course["happySubjectCredit"]) {
            $happySubjectCredit += $happySubject["credit"];
            $generalSubjectCredit += $happySubject["credit"];
        } else {
            $freeSubjectCredit += $happySubject["credit"];
            $freeSubjects[] = $happySubject;
        }
    }

    $entrepreneurshipSubjectCredit = 0;
    $entrepreneurshipSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระศาสตร์แห่งผู้ประกอบการ");

    foreach ($entrepreneurshipSubjects as $entrepreneurshipSubject) {

        if ($happySubjectCredit < $course["entrepreneurshipSubjectCredit"]) {
            $entrepreneurshipSubjectCredit += $entrepreneurshipSubject["credit"];
            $generalSubjectCredit += $entrepreneurshipSubject["credit"];
        } else {
            $freeSubjectCredit += $entrepreneurshipSubject["credit"];
            $freeSubjects[] = $entrepreneurshipSubject;
        }
    }

    $languageSubjectCredit = 0;
    $languageSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระภาษากับการสื่อสาร");

    foreach ($languageSubjects as $languageSubject) {

        if ($languageSubjectCredit < $course["languageSubjectCredit"]) {
            $languageSubjectCredit += $languageSubject["credit"];
            $generalSubjectCredit += $languageSubject["credit"];
        } else {
            $freeSubjectCredit += $languageSubject["credit"];
            $freeSubjects[] = $languageSubject;
        }
    }

    $peopleSubjectCredit = 0;
    $peopleSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระพลเมืองไทยและพลเมืองโลก");

    foreach ($peopleSubjects as $peopleSubject) {

        if ($peopleSubjectCredit < $course["peopleSubjectCredit"]) {
            $peopleSubjectCredit += $peopleSubject["credit"];
            $generalSubjectCredit += $peopleSubject["credit"];
        } else {
            $freeSubjectCredit += $peopleSubject["credit"];
            $freeSubjects[] = $peopleSubject;
        }
    }

    $aestheticsSubjectCredit = 0;
    $aestheticsSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระสุนทรียศาสตร์");

    foreach ($aestheticsSubjects as $aestheticsSubject) {

        if ($aestheticsSubjectCredit < $course["peopleSubjectCredit"]) {
            $aestheticsSubjectCredit += $aestheticsSubject["credit"];
            $generalSubjectCredit += $aestheticsSubject["credit"];
        } else {
            $freeSubjectCredit += $aestheticsSubject["credit"];
            $freeSubjects[] = $aestheticsSubject;
        }
    }




    $coreSubjectCredit = 0;
    $coreSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "วิชาแกน");

    foreach ($coreSubjects as $coreSubject) {

        if ($coreSubjectCredit < $course["coreSubjectCredit"]) {
            $coreSubjectCredit += $coreSubject["credit"];
        } else {
            $freeSubjectCredit += $coreSubject["credit"];
            $freeSubjects[] = $coreSubject;
        }
    }

    $spacailSubjectCredit = 0;
    $spacailSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "วิชาเฉพาะด้าน");

    foreach ($spacailSubjects as $spacailSubject) {

        if ($spacailSubjectCredit < $course["spacailSubjectCredit"]) {
            $spacailSubjectCredit += $spacailSubject["credit"];
        } else {
            $freeSubjectCredit += $coreSubject["credit"];
            $freeSubjects[] = $spacailSubject;
        }
    }

    $selectSubjectCredit = 0;
    $selectSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "วิชาเลือก");

    foreach ($selectSubjects as $selectSubject) {

        if ($selectSubjectCredit < $course["spacailSubjectCredit"]) {
            $selectSubjectCredit += $selectSubject["credit"];
        } else {
            $freeSubjectCredit += $coreSubject["credit"];
            $freeSubjects[] = $selectSubject;
        }
    }


    $academis["general"]["credit"] = $generalSubjectCredit;
    $academis["general"]["name"] = "วิชาศึกษาทั่วไป";
    $generalSubjects = getListSubjectInRegisByStudentIdAndSubjectCategory($studentId, "หมวดวิชาศึกษาทั่วไป");
    $sumGradeCreditGeneral = 0;
    $generalSubjectCredit = 0;
    foreach ($generalSubjects as $generalSubject) {
        if (!in_array($generalSubject, $freeSubjects)) {
            $generalSubjectCredit += $generalSubject["credit"];
            $sumGradeCreditGeneral += $generalSubject["gradeNumber"] * $generalSubject["credit"];
        }
    }
    $academis["general"]["creditAll"] = $course["generalSubjectCredit"];
    $academis["general"]["creditYet"] = $course["generalSubjectCredit"] - $academis["general"]["credit"];
    $academis["general"]["grade"] = round($sumGradeCreditGeneral / $generalSubjectCredit, 2);





    $academis["free"]["credit"] = $freeSubjectCredit;
    $academis["free"]["name"] = "วิชาเสรี";
    $sumGradeCreditFree = 0;
    foreach ($freeSubjects as $freeSubject) {
        $sumGradeCreditFree += $freeSubject["gradeNumber"] * $freeSubject["credit"];
    }
    $academis["free"]["creditAll"] = $course["freeSubjectCredit"];
    $academis["free"]["creditYet"] = $course["freeSubjectCredit"] - $academis["free"]["credit"];
    if ($freeSubjectCredit == 0) {
        $academis["free"]["grade"] = 0.00;
    } else {
        $academis["free"]["grade"] = round($sumGradeCreditFree / $freeSubjectCredit, 2);
    }






    $academis["core"]["credit"] = $coreSubjectCredit;
    $academis["core"]["name"] = "วิชาแกน";
    $cores = getListSubjectInRegisByStudentIdAndSubjectGroup($studentId, "วิชาแกน");
    $sumGradeCreditCore = 0;
    $coreSubjectCredit = 0;
    foreach ($cores as $core) {
        if (!in_array($core, $freeSubjects)) {
            $coreSubjectCredit += $core["credit"];
            $sumGradeCreditCore += $core["gradeNumber"] * $core["credit"];
        }
    }
    $academis["core"]["creditAll"] = $course["coreSubjectCredit"];
    $academis["core"]["creditYet"] = $course["coreSubjectCredit"] - $academis["core"]["credit"];
    $academis["core"]["grade"] = round($sumGradeCreditCore / $coreSubjectCredit, 2);





    $academis["spacail"]["credit"] = $spacailSubjectCredit;
    $academis["spacail"]["name"] = "วิชาเฉพาะด้าน";
    $spacails = getListSubjectInRegisByStudentIdAndSubjectGroup($studentId, "วิชาเฉพาะด้าน");
    $spacailSubjectCredit = 0;
    $sumGradeCreditSpacail = 0;
    foreach ($spacails as $spacail) {
        if (!in_array($spacail, $freeSubjects)) {
            $spacailSubjectCredit += $spacail["credit"];
            $sumGradeCreditSpacail += $spacail["gradeNumber"] * $spacail["credit"];
        }
    }
    $academis["spacail"]["creditAll"] = $course["spacailSubjectCredit"];
    $academis["spacail"]["creditYet"] = $course["spacailSubjectCredit"] - $academis["spacail"]["credit"];
    if ($spacailSubjectCredit == 0) {
        $academis["spacail"]["grade"] = 0.00;
    } else {
        $academis["spacail"]["grade"] = round($sumGradeCreditSpacail / $spacailSubjectCredit, 2);
    }




    $academis["select"]["credit"] = $selectSubjectCredit;
    $academis["select"]["name"] = "วิชาเฉพาะเลือก";
    $selects = getListSubjectInRegisByStudentIdAndSubjectGroup($studentId, "วิชาเลือก");
    $sumGradeCreditSelect = 0;
    $selectSubjectCredit = 0;
    foreach ($selects as $select) {
        if (!in_array($spacail, $freeSubjects)) {
            $selectSubjectCredit += $select["credit"];
            $sumGradeCreditSelect += $select["gradeNumber"] * $select["credit"];
        }
    }
    $academis["select"]["creditAll"] = $course["selectSubjectCredit"];
    $academis["select"]["creditYet"] = $course["selectSubjectCredit"] - $academis["select"]["credit"];
    if($selectSubjectCredit == 0){
        $academis["select"]["grade"] = 0.00;
    }
    else{
       $academis["select"]["grade"] = round($sumGradeCreditSelect / $selectSubjectCredit, 2); 
    }
    


    return $academis;
}


function getListSubjectGroupPassInRegisByStudentId($studentId)
{

    $student = getStudentByStudentId($studentId);

    $academicStudents = [];

    $course = getCourseById($student['courseId']);

    //$generalSubjectPassList = getListSubjectPassInRegisByStudentIdAndSubjectCategory($studentId,"หมวดวิชาศึกษาทั่วไป");



    $freeSubjectCredit = 0;
    $freeSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "วิชาเลือกเสรี");
    foreach ($freeSubjects as $freeSubject) {
        $freeSubjectCredit += $freeSubject["credit"];
    }


    $generalSubjectCredit = 0;
    $generalSubjects = [];
    // foreach($generalSubjectPassList as $generalSubject){

    //     if($sumCreditGeneral < $course["generalSubjectCredit"]){
    //         $sumCreditGeneral += $generalSubject["credit"];
    //         //echo $sumCreditGeneral."<br>";
    //     }
    //     else{
    //         $sumCregitFree += $generalSubject["credit"];
    //         $freeSubjects[] = $generalSubject;
    //     }
    // }


    $happySubjectCredit = 0;
    $happySubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระอยู่ดีมีสุข");

    foreach ($happySubjects as $happySubject) {

        if ($happySubjectCredit < $course["happySubjectCredit"]) {
            $happySubjectCredit += $happySubject["credit"];
            $generalSubjectCredit += $happySubject["credit"];
            $generalSubjects[] = $happySubject;
        } else {
            $freeSubjectCredit += $happySubject["credit"];
            $freeSubjects[] = $happySubject;
        }
    }

    $entrepreneurshipSubjectCredit = 0;
    $entrepreneurshipSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระศาสตร์แห่งผู้ประกอบการ");

    foreach ($entrepreneurshipSubjects as $entrepreneurshipSubject) {

        if ($happySubjectCredit < $course["entrepreneurshipSubjectCredit"]) {
            $entrepreneurshipSubjectCredit += $entrepreneurshipSubject["credit"];
            $generalSubjectCredit += $entrepreneurshipSubject["credit"];
            $generalSubjects[] = $entrepreneurshipSubject;
        } else {
            $freeSubjectCredit += $entrepreneurshipSubject["credit"];
            $freeSubjects[] = $entrepreneurshipSubject;
        }
    }

    $languageSubjectCredit = 0;
    $languageSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระภาษากับการสื่อสาร");

    foreach ($languageSubjects as $languageSubject) {

        if ($languageSubjectCredit < $course["languageSubjectCredit"]) {
            $languageSubjectCredit += $languageSubject["credit"];
            $generalSubjectCredit += $languageSubject["credit"];
            $generalSubjects[] = $languageSubject;
        } else {
            $freeSubjectCredit += $languageSubject["credit"];
            $freeSubjects[] = $languageSubject;
        }
    }

    $peopleSubjectCredit = 0;
    $peopleSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระพลเมืองไทยและพลเมืองโลก");

    foreach ($peopleSubjects as $peopleSubject) {

        if ($peopleSubjectCredit < $course["peopleSubjectCredit"]) {
            $peopleSubjectCredit += $peopleSubject["credit"];
            $generalSubjectCredit += $peopleSubject["credit"];
            $generalSubjects[] = $peopleSubject;
        } else {
            $freeSubjectCredit += $peopleSubject["credit"];
            $freeSubjects[] = $peopleSubject;
        }
    }

    $aestheticsSubjectCredit = 0;
    $aestheticsSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระสุนทรียศาสตร์");

    foreach ($aestheticsSubjects as $aestheticsSubject) {

        if ($aestheticsSubjectCredit < $course["peopleSubjectCredit"]) {
            $aestheticsSubjectCredit += $aestheticsSubject["credit"];
            $generalSubjectCredit += $aestheticsSubject["credit"];
            $generalSubjects[] = $aestheticsSubject;
        } else {
            $freeSubjectCredit += $aestheticsSubject["credit"];
            $freeSubjects[] = $aestheticsSubject;
        }
    }




    $coreSubjectCredit = 0;
    $coreSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "วิชาแกน");

    foreach ($coreSubjects as $coreSubject) {

        if ($coreSubjectCredit < $course["coreSubjectCredit"]) {
            $coreSubjectCredit += $coreSubject["credit"];
        } else {
            $freeSubjectCredit += $coreSubject["credit"];
            $freeSubjects[] = $coreSubject;
        }
    }

    $spacailSubjectCredit = 0;
    $spacailSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "วิชาเฉพาะด้าน");

    foreach ($spacailSubjects as $spacailSubject) {

        if ($spacailSubjectCredit < $course["spacailSubjectCredit"]) {
            $spacailSubjectCredit += $spacailSubject["credit"];
        } else {
            $freeSubjectCredit += $coreSubject["credit"];
            $freeSubjects[] = $spacailSubject;
        }
    }

    $selectSubjectCredit = 0;
    $selectSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "วิชาเลือก");

    foreach ($selectSubjects as $selectSubject) {

        if ($selectSubjectCredit < $course["spacailSubjectCredit"]) {
            $selectSubjectCredit += $selectSubject["credit"];
        } else {
            $freeSubjectCredit += $coreSubject["credit"];
            $freeSubjects[] = $selectSubject;
        }
    }



    $generalSubjectx = getListSubjectPassInRegisByStudentIdAndSubjectCategory($studentId, "หมวดวิชาศึกษาทั่วไป");
    $generates = [];

    foreach ($generalSubjectx as $gene) {
        if (!in_array($gene, $freeSubjects)) {
            $generates[] = $gene;
        }
    }


    $subjects["general"]["list"] = $generalSubjects;
    $subjects["general"]["name"] = "วิชาศึกษาทั่วไป";
    $subjects["free"]["list"] = $freeSubjects;
    $subjects["free"]["name"] = "วิชาเสรี";
    $subjects["core"]["list"] = $coreSubjects;
    $subjects["core"]["name"] = "วิชาแกน";
    $subjects["spacail"]["list"] = $spacailSubjects;
    $subjects["spacail"]["name"] = "วิชาเฉพาะด้าน";
    $subjects["select"]["list"] = $selectSubjects;
    $subjects["select"]["name"] = "วิชาเฉพาะเลือก";

    return $subjects;

}

function getRegisPassAndNotPassByStudentId($studentId)
{


    require("connection_connect.php");

    $subjects = [];

    $sql = "
    
    SELECT semesterYear,semesterPart,subjectCode,nameSubjectThai,nameSubjectEng,credit,gradeCharacter
    FROM semester NATURAL JOIN fact_regis NATURAL JOIN subject
    WHERE studentId = '" . $studentId . "' AND (gradeCharacter != 'F' OR gradeCharacter != 'W') AND subjectCode IN
    (
    SELECT subjectCode
    FROM semester NATURAL JOIN fact_regis NATURAL JOIN subject
    WHERE studentId = '" . $studentId . "' AND (gradeCharacter = 'F' OR gradeCharacter = 'W')
    )
    UNION
    SELECT semesterYear,semesterPart,subjectCode,nameSubjectThai,nameSubjectEng,credit,gradeCharacter	
    FROM semester NATURAL JOIN fact_regis NATURAL JOIN subject
    WHERE studentId = '" . $studentId . "' AND (gradeCharacter = 'F' OR gradeCharacter = 'W')
    ";
    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $subjects[] = $my_row;
    }

    require("connection_close.php");

    return $subjects;

}






?>