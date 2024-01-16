<?php


    function getTeacherById($teacherId){

        require("connection_connect.php");

        $sql = "SELECT * FROM teacher WHERE teacherId = ".$teacherId;
        $result = $conn->query($sql);
        $teacher = $result->fetch_assoc();

        require("connection_close.php");

        return $teacher;

    }

    function getTeacherByUsernameTeacher($usernameTeacher){

        require("connection_connect.php");
        echo $usernameTeacher."<br>";

        $sql = "SELECT * FROM teacher NATURAL JOIN teacherrole NATURAL JOIN role WHERE username = '".$usernameTeacher."'";
        $result = $conn->query($sql);
        $teacher = $result->fetch_assoc();

        require("connection_close.php");
       

        return $teacher;

    }

    function getCountStudentByPlaningByTeacherId($teacherId){


        $planingStatus["plan"] = getCountStudentInTeacherByPlaningByTeacherIdAndPlaningStatus($teacherId,"ตามแผน");
        $planingStatus["notPlan"] = getCountStudentInTeacherByPlaningByTeacherIdAndPlaningStatus($teacherId,"ไม่ตามแผน");
        $planingStatus["retire"] = getCountStudentInTeacherByStudentStatusByTeacherIdAndStatus($teacherId,"พ้นสภาพ");
        $planingStatus["grad"] = getCountStudentInTeacherByStudentStatusByTeacherIdAndStatus($teacherId,"จบการศึกษา");

        return $planingStatus;

    }

    function getCountStudentGPAXStatusByTeacherId($teacherId){

        require("connection_connect.php");

        $countGPAXs = [];
        

        $sql = "SELECT gpaxstatus.gpaxStatusName,IFNULL(count,0) AS count
        FROM gpaxstatus LEFT JOIN (SELECT gpaxStatusId,gpaxStatusName,COUNT(studentId) as count
        FROM (SELECT studentId,MAX(studyYear) AS studyYear,studyTerm,gpaxStatusId,planStatus,gpaxStatusName
        FROM fact_student NATURAL JOIN fact_term_summary NATURAL JOIN gpaxstatus
        WHERE teacherId = ".$teacherId." AND studyTerm != 3
        GROUP BY studentId) AS A
        GROUP BY gpaxStatusId) AS B 
        ON gpaxstatus.gpaxStatusId = B.gpaxStatusId;";

        $result = $conn->query($sql);

        while ($my_row = $result->fetch_assoc()) {
            $countGPAXs[] = $my_row;
        }

        require("connection_close.php");

        foreach($countGPAXs as $gpax){


            if($gpax["gpaxStatusName"] == "เกียรตินิยม"){
                $gpaxStatusCount["blue"] = $gpax["count"];
            }
            else if($gpax["gpaxStatusName"] == "ปกติ"){
                $gpaxStatusCount["green"] = $gpax["count"];
            }
            else if($gpax["gpaxStatusName"] == "รอพินิจ"){
                $gpaxStatusCount["orange"] = $gpax["count"];
            }
            else if($gpax["gpaxStatusName"] == "โปรต่ำ"){
                $gpaxStatusCount["red"] = $gpax["count"];
            }


            
        }

        return $gpaxStatusCount;

    }

    function getCountStudentInTeacherByStudentStatusByTeacherIdAndStatus($teacherId,$status){

        require("connection_connect.php");

        $sql = "SELECT COUNT(studentId) AS count
        FROM fact_student NATURAL JOIN studentstatus
        WHERE teacherId = ".$teacherId." AND status = '".$status."'
        GROUP BY studentStatusId";

        $result = $conn->query($sql);
        $studentStatus = $result->fetch_assoc();


        if(is_null($studentStatus)){
            $s["count"] = 0;
            $studentStatus = $s;
        }




        require("connection_close.php");

        return $studentStatus;

    }

    function getCountStudentInTeacherByPlaningByTeacherIdAndPlaningStatus($teacherId,$status){

        require("connection_connect.php");

        $sql = "SELECT COUNT(studentId) as count
        FROM (SELECT studentId,MAX(studyYear) AS studyYear,studyTerm,gpaxStatusId,planStatus,gpaxStatusName
        FROM fact_student NATURAL JOIN fact_term_summary NATURAL JOIN gpaxstatus
        WHERE teacherId = ".$teacherId." AND studyTerm != 3
        GROUP BY studentId) AS A
        WHERE planStatus = '".$status."'
        GROUP BY planStatus";

        $result = $conn->query($sql);
        $plan = $result->fetch_assoc();

        if(is_null($plan)){
            $s["count"] = 0;
            $plan = $s;
        }

        require("connection_close.php");

        return $plan;

    }

    function getCountStudentPlanStatusBystudyGeneretionByTeacherId($teacherId){

        require("connection_connect.php");

        $sqlGeneretion = "SELECT DISTINCT studyGeneretion
        FROM fact_student
        WHERE teacherId = ".$teacherId."
        ORDER BY studyGeneretion";

        $generetions = [];
        $gens = [];

        $result = $conn->query($sqlGeneretion);

        while ($my_row = $result->fetch_assoc()) {
            $generetions[] = $my_row["studyGeneretion"];
        }

        foreach($generetions as $generetion){
            
            $gen["generetion"] = $generetion;


            $plans = getCountPlanStatusByGeneretionAndTeacherId($generetion,$teacherId);

            foreach($plans as $plan){

                if($plan["planStatus"] == "ตามแผน"){
                    $gen["plan"] = $plan["count"];
                }
                else if($plan["planStatus"] == "ไม่ตามแผน"){
                    $gen["notPlan"] = $plan["count"];
                }


            }

            $studentStatus = getCountStudentStatusByGeneretionAndTeacherId($generetion,$teacherId);
            foreach($studentStatus as $plan){

                if($plan["status"] == "พ้นสภาพนิสิต"){
                    $gen["retire"] = $plan["count"];
                }
                else if($plan["status"] == "จบการศึกษา"){
                    $gen["grad"] = $plan["count"];
                }


            }
            $gens[] = $gen;

        }

        require("connection_close.php");

        return $gens;

    }

    function getCountStudentStatusByGeneretionAndTeacherId($generetion,$teacherId){
        require("connection_connect.php");

        $sql = "SELECT A.status ,IFNULL(count,0) AS count
        FROM (SELECT status
        FROM studentstatus
        WHERE status = 'พ้นสภาพนิสิต' OR status = 'จบการศึกษา') AS A LEFT JOIN (SELECT studyGeneretion,status,COUNT(studentId) AS count
        FROM fact_student NATURAL JOIN studentstatus
        WHERE teacherId = ".$teacherId." AND (status = 'พ้นสภาพนิสิต' OR status = 'จบการศึกษา' ) AND studyGeneretion = ".$generetion."
        GROUP BY studentStatusId) AS B
        ON A.status = B.status";

        $result = $conn->query($sql);

        $studentStatus= [];

        while ($my_row = $result->fetch_assoc()) {
            $studentStatus[] = $my_row;
        }


        require("connection_close.php");

        return $studentStatus;
    }

    function getCountPlanStatusByGeneretionAndTeacherId($generetion,$teacherId){


        require("connection_connect.php");

        $sql = "SELECT planStatus,COUNT(studentId) as count
        FROM (SELECT studentId,studyGeneretion,MAX(studyYear) AS studyYear,studyTerm,gpaxStatusId,planStatus,gpaxStatusName
        FROM fact_student NATURAL JOIN fact_term_summary NATURAL JOIN gpaxstatus
        WHERE teacherId = ".$teacherId." AND studyTerm != 3 AND studyGeneretion = ".$generetion."
        GROUP BY studentId) AS A
        GROUP BY planStatus";

        $result = $conn->query($sql);

        $studentStatus= [];

        while ($my_row = $result->fetch_assoc()) {
            $studentStatus[] = $my_row;
        }


        require("connection_close.php");

        return $studentStatus;
    }




?>