<?php


require_once 'departmentFunction.php';
require_once 'programFunction.php';
require_once 'teacherFunction.php';
require_once 'schoolFunction.php';
require_once 'termSummaryFunction.php';
require_once 'regisFunction.php';
require_once 'courseFunction.php';
require_once 'semesterFunction.php';


function getStudentByUsername($studentUsername)
{
    require("connection_connect.php");

    $sql = "SELECT * FROM student NATURAL JOIN fact_student WHERE studentUsername = '" . $studentUsername . "'";

    $result = $conn->query($sql);
    $student = $result->fetch_assoc();

    if (!isset($student)) {
        return $student;
    }

    $student["teacher"] = getTeacherById($student["teacherId"]);
    $student["program"] = getProgramById($student["programId"]);
    $student["department"] = getDepartmentById($student["departmentId"]);
    $student["school"] = getSchoolById($student["schoolId"]);
    //$student["terms"] = getTermSummaryListByStudentId($student["studentId"]);
    $student["gpax"] = getGPAX($student["studentId"]);
    $student["credit"] = getCredit($student["studentId"]);
    $student["creditThree"] = getCreditThree($student["studentId"]);

    $student["course"] = getCourseById($student["courseId"]);
    $student["status"] = getStudentStatusByStudentId($student["studentId"]);

    $path = "../student/tell/" . $student["studentId"] . ".json";
    $jsonString = file_get_contents($path);
    $tell = json_decode($jsonString, true);

    $student["tell"] = $tell;

    $semester = getSemesterPresent();

    $student["studyYear"] = $semester["semesterYear"] - $student["tcasYear"] + 1;

    if ($semester["semesterPart"] == "ภาคต้น") {
        $student["studyTerm"] = 1;
    } else {
        $student["studyTerm"] = 2;
    }

    require("connection_close.php");

    return $student;

}



function getStudentByStudentId($studentId)
{
    require("connection_connect.php");

    $sql = "SELECT * FROM student NATURAL JOIN fact_student WHERE studentId = '" . $studentId . "'";

    $result = $conn->query($sql);
    $student = $result->fetch_assoc();

    if (!isset($student)) {
        return $student;
    }

    $student["teacher"] = getTeacherById($student["teacherId"]);
    $student["program"] = getProgramById($student["programId"]);
    $student["department"] = getDepartmentById($student["departmentId"]);
    $student["school"] = getSchoolById($student["schoolId"]);
    //$student["terms"] = getTermSummaryListByStudentId($student["studentId"]);
    $student["gpax"] = getGPAX($student["studentId"]);
    $student["course"] = getCourseById($student["courseId"]);
    $student["status"] = getStudentStatusByStudentId($student["studentId"]);

    $semester = getSemesterPresent();



    $student["studyYear"] = $semester["semesterYear"] - $student["tcasYear"] + 1;

    if ($semester["semesterPart"] == "ภาคต้น") {
        $student["studyTerm"] = 1;
    } else {
        $student["studyTerm"] = 2;
    }

    $path = "../student/tell/" . $student["studentId"] . ".json";
    $jsonString = file_get_contents($path);
    $tell = json_decode($jsonString, true);

    $student["tell"] = $tell;

    $student["credit"] = getCredit($student["studentId"]);

    $student["creditThree"] = getCreditThree($student["studentId"]);

    require("connection_close.php");




    return $student;

}

function getStudentByStudentIdForInsert($studentId)
{
    require("connection_connect.php");

    $sql = "SELECT * FROM student NATURAL JOIN fact_student WHERE studentId = '" . $studentId . "'";

    $result = $conn->query($sql);
    $student = $result->fetch_assoc();
    
    if (!isset($student)) {
        return $student;
    }

    // $student["teacher"] = getTeacherById($student["teacherId"]);
    // $student["program"] = getProgramById($student["programId"]);
    // $student["department"] = getDepartmentById($student["departmentId"]);
    // $student["school"] = getSchoolById($student["schoolId"]);
    // $student["terms"] = getTermSummaryListByStudentId($student["studentId"]);
    // $student["gpax"] = getGPAX($student["studentId"]);
    // $student["course"] = getCourseById($student["courseId"]);
    //$student["status"] = getStudentStatusByStudentId($student["studentId"]);

    $semester = getSemesterPresent();

    

    $student["studyYear"] = $semester["semesterYear"] - $student["tcasYear"] + 1;

    if ($semester["semesterPart"] == "ภาคต้น") {
        $student["studyTerm"] = 1;
    } else {
        $student["studyTerm"] = 2;
    }

    // $student["credit"] = getCredit($student["studentId"]);

    // $student["creditThree"] = getCreditThree($student["studentId"]);

    require("connection_close.php");




    return $student;

}

function getStudentStatusByStudentId($studentId)
{
    require("connection_connect.php");

    $sql = "SELECT *
    FROM  fact_term_summary NATURAL JOIN studentStatus
    WHERE studentId = $studentId AND termSummaryId IN (SELECT MAX(termSummaryId) AS termSummaryId FROM fact_term_summary NATURAL JOIN semester NATURAL JOIN fact_student
    WHERE studentId = $studentId
    GROUP BY studentId);";

    $result = $conn->query($sql);
    $status = $result->fetch_assoc();

    if(!isset($status)){
        $status["status"] = "พ้นสภาพ";
    }





    require("connection_close.php");

    return $status["status"];
}

function getGPAX($studentId)
{
    //echo $studentId."<br>";

    $regisAllList = getListRegisByStudentId($studentId);

    require("connection_connect.php");

    $sumCreditAll = 0;
    $sumGradeCreditAll = 0.0;

    foreach ($regisAllList as $regis) {
        //echo print_r($regis)."<br>";
        if ($regis["gradeCharacter"] != 'W' and $regis["gradeCharacter"] != 'P' and $regis["gradeCharacter"] != 'NP') {
            $sumGradeCreditAll += $regis["gradeNumber"] * $regis["credit"];
            $sumCreditAll += $regis["credit"];
        }

    }

    if($sumCreditAll == 0){
        $sumCreditAll = 1;
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
        $sumCreditAll += $regis["creditRegis"];


    }


    require("connection_close.php");

    return $sumCreditAll;
}

function getCreditThree($studentId)
{

    $regisAllList = getListRegisNotFAndWByStudentId($studentId);

    require("connection_connect.php");

    $sql = "SELECT studentId,SUM(CASE WHEN gradeCharacter != 'W' AND  gradeCharacter != 'P' AND gradeCharacter != 'NP' THEN creditRegis END) AS creditAll,SUM(CASE WHEN gradeCharacter != 'F' AND gradeCharacter != 'W' AND gradeCharacter != 'P' AND gradeCharacter != 'NP' THEN creditRegis END) AS creditPass,IFNULL(SUM(CASE WHEN gradeCharacter = 'F' OR gradeCharacter = 'NP' THEN creditRegis END),0) AS creditNotPass
    FROM fact_regis NATURAL JOIN courselist
    WHERE studentId = '" . $studentId . "'
    GROUP BY studentId";

    $result = $conn->query($sql);

    $credit = $result->fetch_assoc();





    require("connection_close.php");

    return $credit;
}

function getListSubjectForFAndWByStudentId($studentId)
{

    require("connection_connect.php");
    $subjects = [];
    $sql = "SELECT semesterYear,semesterPart,subjectCode,subjectNameTh,subjectNameEng,groupName,credit,creditRegis,gradeCharacter
    FROM semester NATURAL JOIN fact_regis NATURAL JOIN courselist NATURAL JOIN coursegroup
    WHERE studentId = '$studentId' AND ( gradeCharacter = 'F' OR gradeCharacter = 'W') AND subjectCode NOT IN
    (
        SELECT subjectCode
        FROM fact_regis NATURAL JOIN courselist
        WHERE studentId = '$studentId' AND gradeCharacter != 'F' AND gradeCharacter != 'W'
    )";

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

    $sql = "SELECT * 
    FROM semester NATURAL JOIN fact_regis NATURAL JOIN courselist NATURAL JOIN coursegroup
    WHERE studentId = '" . $studentId . "' AND categoryName = '" . $subjectCategoryName . "' AND gradeCharacter != 'P' AND gradeCharacter != 'W' AND gradeCharacter != 'NP' ";
    $result = $conn->query($sql);
    $subjects = [];
    while ($my_row = $result->fetch_assoc()) {
        //echo $my_row["credit"] . "<br>";
        $subjects[] = $my_row;
    }


    require("connection_close.php");

    return $subjects;

}

function getListSubjectInRegisByStudentIdAndSubjectGroup($studentId, $subjectGroup)
{
    require("connection_connect.php");

    $sql = "SELECT * 
    FROM semester NATURAL JOIN fact_regis NATURAL JOIN courselist NATURAL JOIN coursegroup 
    WHERE studentId = '" . $studentId . "' AND groupName = '" . $subjectGroup . "' AND gradeCharacter != 'P' AND gradeCharacter != 'W' AND gradeCharacter != 'NP'";
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

    //echo count($freeSubjects)."<br>";

    foreach ($freeSubjects as $freeSubject) {
        $freeSubjectCredit += $freeSubject["creditRegis"];
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

        //echo $happySubjectCredit." ".$course["happySubjectCredit"]."<br>";
        if ($happySubjectCredit < $course["happySubjectCredit"]) {
            $happySubjectCredit += $happySubject["creditRegis"];
            $generalSubjectCredit += $happySubject["creditRegis"];
        } else {
            //echo "เข้าได้ไง<br>";
            $freeSubjectCredit += $happySubject["creditRegis"];
            $freeSubjects[] = $happySubject;
        }
    }
    //echo count($freeSubjects)."อยู่ดี<br>";

    $entrepreneurshipSubjectCredit = 0;
    $entrepreneurshipSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระศาสตร์แห่งผู้ประกอบการ");

    foreach ($entrepreneurshipSubjects as $entrepreneurshipSubject) {
        //echo $entrepreneurshipSubjectCredit."ผู้ประกอบการ101".$entrepreneurshipSubject["subjectNameTh"]."<br>";
        if ($entrepreneurshipSubjectCredit < $course["entrepreneurshipSubjectCredit"]) {
            $entrepreneurshipSubjectCredit += $entrepreneurshipSubject["creditRegis"];
            //
            $generalSubjectCredit += $entrepreneurshipSubject["creditRegis"];
        } else {
            $freeSubjectCredit += $entrepreneurshipSubject["creditRegis"];
            $freeSubjects[] = $entrepreneurshipSubject;
            //echo print_r($freeSubjects)."<br>";
        }
    }
    //echo count($freeSubjects)."ผู้ประกอบ<br>";

    $languageSubjectCredit = 0;
    $languageSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระภาษากับการสื่อสาร");


    foreach ($languageSubjects as $languageSubject) {

        if ($languageSubjectCredit < $course["languageSubjectCredit"]) {
            $languageSubjectCredit += $languageSubject["creditRegis"];
            $generalSubjectCredit += $languageSubject["creditRegis"];
        } else {
            $freeSubjectCredit += $languageSubject["creditRegis"];
            $freeSubjects[] = $languageSubject;
        }
    }
    // echo count($freeSubjects)."<br>";
    // echo print_r($freeSubjects)."<br>";

    $peopleSubjectCredit = 0;
    $peopleSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระพลเมืองไทยและพลเมืองโลก");

    foreach ($peopleSubjects as $peopleSubject) {

        if ($peopleSubjectCredit < $course["peopleSubjectCredit"]) {
            $peopleSubjectCredit += $peopleSubject["creditRegis"];
            $generalSubjectCredit += $peopleSubject["creditRegis"];
        } else {
            $freeSubjectCredit += $peopleSubject["creditRegis"];
            $freeSubjects[] = $peopleSubject;
        }
    }
    //echo count($freeSubjects)."กลุ่มสาระพลเมืองไทยและพลเมืองโลก<br>";

    $aestheticsSubjectCredit = 0;
    $aestheticsSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระสุนทรียศาสตร์");

    foreach ($aestheticsSubjects as $aestheticsSubject) {

        if ($aestheticsSubjectCredit < $course["peopleSubjectCredit"]) {
            $aestheticsSubjectCredit += $aestheticsSubject["creditRegis"];
            $generalSubjectCredit += $aestheticsSubject["creditRegis"];
        } else {
            $freeSubjectCredit += $aestheticsSubject["creditRegis"];
            $freeSubjects[] = $aestheticsSubject;
        }
    }
    //echo count($freeSubjects)."กลุ่มสาระสุนทรียศาสตร์<br>";
    // echo print_r($freeSubjects)."<br>";




    $coreSubjectCredit = 0;
    $coreSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "วิชาแกน");


    foreach ($coreSubjects as $coreSubject) {

        if ($coreSubjectCredit < $course["coreSubjectCredit"]) {
            $coreSubjectCredit += $coreSubject["creditRegis"];
        } else {
            $freeSubjectCredit += $coreSubject["creditRegis"];
            $freeSubjects[] = $coreSubject;
        }
    }

    $spacailSubjectCredit = 0;
    $spacailSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "วิชาเฉพาะด้าน");


    foreach ($spacailSubjects as $spacailSubject) {

        if ($spacailSubjectCredit < $course["spacailSubjectCredit"]) {
            $spacailSubjectCredit += $spacailSubject["creditRegis"];
        } else {
            $freeSubjectCredit += $spacailSubject["creditRegis"];
            $freeSubjects[] = $spacailSubject;
        }
    }

    $selectSubjectCredit = 0;
    $selectSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "วิชาเลือก");

    foreach ($selectSubjects as $selectSubject) {

        if ($selectSubjectCredit < $course["spacailSubjectCredit"]) {
            $selectSubjectCredit += $selectSubject["creditRegis"];
        } else {
            $freeSubjectCredit += $coreSubject["creditRegis"];
            $freeSubjects[] = $selectSubject;
        }
    }


    $academis["general"]["credit"] = $generalSubjectCredit;
    $academis["general"]["name"] = "วิชาศึกษาทั่วไป";
    $generalSubjects = getListSubjectInRegisByStudentIdAndSubjectCategory($studentId, "วิชาศึกษาทั่วไป");
    //echo count($generalSubjects);
    $sumGradeCreditGeneral = 0;
    $generalSubjectCredit = 0;
    foreach ($generalSubjects as $generalSubject) {
        if (!in_array($generalSubject, $freeSubjects)) {
            //echo $generalSubject["credit"] . "<br>";
            $generalSubjectCredit += $generalSubject["creditRegis"];
            $sumGradeCreditGeneral += $generalSubject["gradeNumber"] * $generalSubject["creditRegis"];

        }
    }
    $academis["general"]["creditAll"] = $course["generalSubjectCredit"];
    $academis["general"]["creditYet"] = $course["generalSubjectCredit"] - $academis["general"]["credit"];
    $academis["general"]["grade"] = round($sumGradeCreditGeneral / $generalSubjectCredit, 2);





    $academis["free"]["credit"] = $freeSubjectCredit;
    $academis["free"]["name"] = "วิชาเสรี";
    $sumGradeCreditFree = 0;
    foreach ($freeSubjects as $freeSubject) {
        $sumGradeCreditFree += $freeSubject["gradeNumber"] * $freeSubject["creditRegis"];
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
            $sumGradeCreditCore += $core["gradeNumber"] * $core["creditRegis"];
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
            $sumGradeCreditSpacail += $spacail["gradeNumber"] * $spacail["creditRegis"];
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
            $sumGradeCreditSelect += $select["gradeNumber"] * $select["creditRegis"];
        }
    }
    $academis["select"]["creditAll"] = $course["selectSubjectCredit"];
    $academis["select"]["creditYet"] = $course["selectSubjectCredit"] - $academis["select"]["credit"];
    if ($selectSubjectCredit == 0) {
        $academis["select"]["grade"] = 0.00;
    } else {
        $academis["select"]["grade"] = round($sumGradeCreditSelect / $selectSubjectCredit, 2);
    }



    return $academis;
}


function getListSubjectGroupPassInRegisByStudentId($studentId)
{

    $student = getStudentByStudentId($studentId);

    $academicStudents = [];

    $course = getCourseById($student['courseId']);


    $overSubjects = [];

    //$generalSubjectPassList = getListSubjectPassInRegisByStudentIdAndSubjectCategory($studentId,"หมวดวิชาศึกษาทั่วไป");



    $freeSubjectCredit = 0;
    $freeSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "วิชาเลือกเสรี");
    foreach ($freeSubjects as $freeSubject) {
        if($freeSubject["gradeCharacter"] != 'F')
            $freeSubjectCredit += $freeSubject["creditRegis"];
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

        if($happySubject["gradeCharacter"] != 'F')
            if ($happySubjectCredit < $course["happySubjectCredit"]) {
                $happySubjectCredit += $happySubject["creditRegis"];
                $generalSubjectCredit += $happySubject["creditRegis"];
                $generalSubjects[] = $happySubject;
            } else if ($freeSubjectCredit < $course["freeSubjectCredit"]) {
                $freeSubjectCredit += $happySubject["creditRegis"];
                $freeSubjects[] = $happySubject;
            } else {
                $overSubjects[] = $happySubject;
            }
    }

    $entrepreneurshipSubjectCredit = 0;
    $entrepreneurshipSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระศาสตร์แห่งผู้ประกอบการ");

    foreach ($entrepreneurshipSubjects as $entrepreneurshipSubject) {

        if($entrepreneurshipSubject["gradeCharacter"] != 'F')
            if ($entrepreneurshipSubjectCredit < $course["entrepreneurshipSubjectCredit"]) {
                $entrepreneurshipSubjectCredit += $entrepreneurshipSubject["creditRegis"];
                $generalSubjectCredit += $entrepreneurshipSubject["creditRegis"];
                $generalSubjects[] = $entrepreneurshipSubject;
            } else if ($freeSubjectCredit < $course["freeSubjectCredit"]) {
                $freeSubjectCredit += $entrepreneurshipSubject["credit"];
                $freeSubjects[] = $entrepreneurshipSubject;
            } else {
                $overSubjects[] = $entrepreneurshipSubject;
            }
    }

    $languageSubjectCredit = 0;
    $languageSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระภาษากับการสื่อสาร");

    foreach ($languageSubjects as $languageSubject) {

        if($languageSubject["gradeCharacter"] != 'F')
            if ($languageSubjectCredit < $course["languageSubjectCredit"]) {
                $languageSubjectCredit += $languageSubject["creditRegis"];
                $generalSubjectCredit += $languageSubject["creditRegis"];
                $generalSubjects[] = $languageSubject;
            } else if ($freeSubjectCredit < $course["freeSubjectCredit"]) {
                $freeSubjectCredit += $languageSubject["creditRegis"];
                $freeSubjects[] = $languageSubject;
            } else {
                $overSubjects[] = $languageSubject;
            }
    }


    $peopleSubjectCredit = 0;
    $peopleSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระพลเมืองไทยและพลเมืองโลก");

    foreach ($peopleSubjects as $peopleSubject) {
       
        if($peopleSubject["gradeCharacter"] != 'F')
            if ($peopleSubjectCredit < $course["peopleSubjectCredit"]) {
                $peopleSubjectCredit += $peopleSubject["creditRegis"];
                $generalSubjectCredit += $peopleSubject["creditRegis"];
                $generalSubjects[] = $peopleSubject;
            } else if ($freeSubjectCredit < $course["freeSubjectCredit"]) {
                $freeSubjectCredit += $peopleSubject["creditRegis"];
                $freeSubjects[] = $peopleSubject;
            } else {
                $overSubjects[] = $peopleSubject;
            }
    }


    $aestheticsSubjectCredit = 0;
    $aestheticsSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "กลุ่มสาระสุนทรียศาสตร์");

    foreach ($aestheticsSubjects as $aestheticsSubject) {

        if($aestheticsSubject["gradeCharacter"] != 'F')
            if ($aestheticsSubjectCredit < $course["peopleSubjectCredit"]) {
                $aestheticsSubjectCredit += $aestheticsSubject["creditRegis"];
                $generalSubjectCredit += $aestheticsSubject["creditRegis"];
                $generalSubjects[] = $aestheticsSubject;
            } else if ($freeSubjectCredit < $course["freeSubjectCredit"]) {
                $freeSubjectCredit += $aestheticsSubject["creditRegis"];
                $freeSubjects[] = $aestheticsSubject;
            } else {
                $overSubjects[] = $aestheticsSubject;
            }
    }





    $coreSubjectCredit = 0;
    $coreSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "วิชาแกน");

    foreach ($coreSubjects as $coreSubject) {

        if($coreSubject["gradeCharacter"] != 'F')
            if ($coreSubjectCredit < $course["coreSubjectCredit"]) {
                $coreSubjectCredit += $coreSubject["creditRegis"];
            } else if ($freeSubjectCredit < $course["freeSubjectCredit"]) {
                $freeSubjectCredit += $coreSubject["creditRegis"];
                $freeSubjects[] = $coreSubject;
            } else {
                $overSubjects[] = $coreSubject;
            }
    }


    $spacailSubjectCredit = 0;
    $spacailSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "วิชาเฉพาะด้าน");

    foreach ($spacailSubjects as $spacailSubject) {


        if($spacailSubject["gradeCharacter"] != 'F')
            if ($spacailSubjectCredit < $course["spacailSubjectCredit"]) {
                $spacailSubjectCredit += $spacailSubject["creditRegis"];
            } else if ($freeSubjectCredit < $course["freeSubjectCredit"]) {
                $freeSubjectCredit += $coreSubject["creditRegis"];
                $freeSubjects[] = $spacailSubject;
            } else {
                $overSubjects[] = $spacailSubject;
            }
    }

    // echo count($freeSubjects)."<br>";
    // echo count($overSubjects)."<br><br>";

    $selectSubjectCredit = 0;
    $selectSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "วิชาเลือก");

    foreach ($selectSubjects as $selectSubject) {

        if($selectSubject["gradeCharacter"] != 'F')
            if ($selectSubjectCredit < $course["spacailSubjectCredit"]) {
                $selectSubjectCredit += $selectSubject["creditRegis"];
            } else if ($freeSubjectCredit < $course["freeSubjectCredit"]) {
                $freeSubjectCredit += $coreSubject["creditRegis"];
                $freeSubjects[] = $selectSubject;
            } else {
                $overSubjects[] = $selectSubject;
            }
    }



    $generalSubjectx = getListSubjectPassInRegisByStudentIdAndSubjectCategory($studentId, "วิชาศึกษาทั่วไป");
    $generates = [];

    foreach ($generalSubjectx as $gene) {
        if (!in_array($gene, $freeSubjects)) {
            $generates[] = $gene;
        }
    }


    $subjects["general"]["list"] = $generates;
    $subjects["general"]["name"] = "วิชาศึกษาทั่วไป";
    $subjects["free"]["list"] = $freeSubjects;
    $subjects["free"]["name"] = "วิชาเสรี";
    $subjects["core"]["list"] = $coreSubjects;
    $subjects["core"]["name"] = "วิชาแกน";
    $subjects["spacail"]["list"] = $spacailSubjects;
    $subjects["spacail"]["name"] = "วิชาเฉพาะด้าน";
    $subjects["select"]["list"] = $selectSubjects;
    $subjects["select"]["name"] = "วิชาเฉพาะเลือก";
    $subjects["over"]["list"] = $overSubjects;
    $subjects["over"]["name"] = "over";


    return $subjects;

}

function getRegisPassAndNotPassByStudentId($studentId)
{


    require("connection_connect.php");

    $subjects = [];

    $sql = "SELECT semesterYear,semesterPart,subjectCode,subjectNameTh,subjectNameEng,groupName,credit,GROUP_CONCAT( gradeCharacter ORDER BY semesterYear   SEPARATOR ',') AS gradeCharacter
    FROM
    (
    SELECT semesterYear,semesterPart,subjectCode,subjectNameTh,subjectNameEng,credit,gradeCharacter,groupName
    FROM semester NATURAL JOIN fact_regis NATURAL JOIN courselist NATURAL JOIN coursegroup
    WHERE studentId = '$studentId' AND gradeCharacter != 'F' AND gradeCharacter != 'W' AND subjectCode IN
    (
    SELECT subjectCode
    FROM semester NATURAL JOIN fact_regis NATURAL JOIN courselist NATURAL JOIN coursegroup
    WHERE studentId = '$studentId' AND (gradeCharacter = 'F' OR gradeCharacter = 'W')
    )
    UNION
    SELECT semesterYear,semesterPart,subjectCode,subjectNameTh,subjectNameEng,credit,gradeCharacter,groupName	
    FROM semester NATURAL JOIN fact_regis NATURAL JOIN courselist NATURAL JOIN coursegroup
    WHERE studentId = '$studentId' AND (gradeCharacter = 'F' OR gradeCharacter = 'W') AND subjectCode IN
     (
    SELECT subjectCode
    FROM semester NATURAL JOIN fact_regis NATURAL JOIN courselist NATURAL JOIN coursegroup
    WHERE studentId = '$studentId' AND gradeCharacter != 'F' AND gradeCharacter != 'W'
    )
    ORDER BY semesterYear
    ) AS A
    GROUP BY subjectCode
    ORDER BY semesterYear
    ";
    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $subjects[] = $my_row;
    }




    require("connection_close.php");

    return $subjects;

}

function getSubjectNotLearnInCoureseList($studentId, $courseId, $year, $part)
{

    //$courses;

    if ($part == 1) {
        $courses = getSubjectNotLearnInCoureseListInFirstTerm($studentId, $courseId, $year, $part);
    } else {
        $courses = getSubjectNotLearnInCoureseListSecondTerm($studentId,$courseId, $year, $part);
    }

    $selectSubjects = getListSubjectPassInRegisByStudentIdAndSubjectGroup($studentId, "วิชาเลือก");

    $selects = [];
    //echo print_r($courses)."<br>";

    // foreach ($selectSubjects as $selectSubject) {
    //     for ($i = 0; $i < count($courses); $i++) {

    //         if ($courses[$i]["groupName"] == "วิชาเลือก") {
    //             if ($courses[$i]["credit"] == $selectSubject["creditRegis"]) {
    //                 echo print_r($courses[$i])."<br>";
    //                 unset($courses[$i]);
                    
    //             }
    //         }
            
    //     }
    // }


    return $courses;

}

function getSubjectNotLearnInCoureseListInFirstTerm($studentId, $courseId, $year, $part)
{

    require("connection_connect.php");

    $subjects = [];

    $yearX = $year - 1;
    $termX = $part + 1;

    



    $sql = "SELECT DISTINCT subjectCode,groupName,credit,subjectNameTh
    FROM courselist NATURAL JOIN coursegroup
    WHERE courseId = $courseId AND studyYear <= $yearX AND term <= $termX AND (groupName = 'วิชาเฉพาะด้าน' OR groupName = 'วิชาแกน' OR groupName = 'วิชาเลือก') AND subjectCode NOT IN (SELECT subjectCode
    FROM fact_regis NATURAL JOIN courselist NATURAL JOIN coursegroup 
    WHERE studentId = '$studentId')
    UNION
    SELECT DISTINCT subjectCode,groupName,credit,subjectNameTh
    FROM courselist NATURAL JOIN coursegroup
    WHERE courseId = $courseId AND studyYear = $year AND term = $part  AND (groupName = 'วิชาเฉพาะด้าน' OR groupName = 'วิชาแกน' OR groupName = 'วิชาเลือก') AND subjectCode NOT IN (SELECT subjectCode
    FROM fact_regis NATURAL JOIN courselist NATURAL JOIN coursegroup 
    WHERE studentId = '$studentId');";
    $result = $conn->query($sql);

    //echo $sql."<br>";

    while ($my_row = $result->fetch_assoc()) {
        $subjects[] = $my_row;
    }

    require("connection_close.php");



    return $subjects;

}
function getSubjectNotLearnInCoureseListSecondTerm($studentId,$courseId, $year, $part)
{

    require("connection_connect.php");

    $subjects = [];




    $sql = "SELECT DISTINCT subjectCode,groupName,credit,subjectNameTh,subjectNameTh
    FROM courselist NATURAL JOIN coursegroup
    WHERE courseId = $courseId AND studyYear <= $year AND term <= $part AND (groupName = 'วิชาเฉพาะด้าน' OR groupName = 'วิชาแกน' OR groupName = 'วิชาเลือก') AND subjectCode NOT IN (SELECT subjectCode
    FROM fact_regis NATURAL JOIN courselist NATURAL JOIN coursegroup 
    WHERE studentId = '$studentId')";
    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {
        $subjects[] = $my_row;
    }

    require("connection_close.php");



    return $subjects;

}





?>