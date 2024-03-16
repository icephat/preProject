<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        .t1:hover {
            background-color: #ececec;
            transition: all 0.5s linear;
        }
    </style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบสนับสนุนการตัดสินใจ</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php


                session_start();

                require_once '../function/teacherFunction.php';
                require_once '../function/semesterFunction.php';
                require_once '../function/courseFunction.php';
                require_once '../function/headDeptFunction.php';
                require_once '../function/departmentFunction.php';

                $teacher = getTeacherByUsernameTeacher($_SESSION["access-user"]);
                $semester = getSemesterPresent();


                $course = getCoursePresentByDepartmentId($teacher["departmentId"]);

                $departments = getAllDepartment();
                $semesterYears = getSemesterYear();

                ?>

                <?php include('../layout/head/report.php'); ?>

                <div>
                    <form class="form-valide" action="student_faculty_search.php" method="post" enctype="multipart/form-data">
                        <div class="row mx-auto">
                            <div class="column col-sm-4">

                                <div class="text-center">
                                    <h5>ภาควิชา<span style="color: red;">*</span></th>
                                </div>
                                <div class="text-center">
                                    <div>
                                        <select class="form-control" data-live-search="true" name = "departmentId">
                                            
                                            <?php
                                            foreach($departments as $department){
                                            ?>
    
                                                <option value="<?php echo $department["departmentId"] ?>"><?php echo $department["departmentName"] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="column col-sm-4">
                                <div class="text-center">
                                    <h5>ปีที่สืบค้น<span style="color: red;">*</span></th>
                                </div>
                                <div class="text-center">
                                    <div>
                                        <select class="form-control" data-live-search="true" name = "year">
                                            
                                            <?php
                                            foreach($semesterYears as $year){
                                            ?>
                                            <option value="<?php echo $year["semesterYear"]?>"><?php echo $year["semesterYear"]?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="column col-sm-3">
                                <div class="text-center">
                                    <br>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" id="data"
                                        class="btn btn-success btn-m active">ดูผล</button>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>

                <hr>
                <div class="row" style="color: black;">
                    <?php

                    $generetions = getGeneretionInCourseByDepartmentId($teacher["departmentId"]);
                    $countStudentInCourse = getCountStudentInDepartmentByDepartmentId($teacher["departmentId"]);

                    ?>
                    <h5>ภาควิชา
                        <?php echo $teacher["departmentName"] . " ปีการศึกษา ".$semester["semesterYear"] ?>
                    </h5>
                </div>
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="row">
                            <div class="col-sm-4 mx-auto">
                                <table class="table "
                                    style="margin-top: 30px; border: 1px solid black; border-collapse: collapse; ">
                                    <tr style="border: 1px solid black; border-collapse: collapse; ">
                                        <th class="t1" style="border: 1px solid black; border-collapse: collapse; width: 50%; ">

                                            <?php
                                            $countRangeGrade = getCountStudentGradeRangeByDepartmrntIdAndSemesterYear($teacher["departmentId"], $semester["semesterYear"])

                                                ?>

                                            <div style="color: rgb(134, 211, 247);">
                                                <a style="text-decoration: none; color: rgb(134, 211, 247);" href="#" data-toggle="modal" data-target="#modalblue">
                                                    <div class="text-center">
                                                        
                                                            <h4>3.25-4.00</h4>
                                                        
                                                    </div>
                                                    <div class="text-center">
                                                        <h1 style="font-weight: bolder; font-size: 70px; ">
                                                            <?php echo $countRangeGrade["blue"] ?>
                                                        </h1>
                                                    </div>
                                                    <div class="text-right">
                                                        <p>คน</p>
                                                    </div>
                                                </a>
                                            </div>


                                        </th>
                                        <th class="t1" style="border: 1px solid black; border-collapse: collapse; ">
                                            <div style="color: rgb(153, 204, 153);">
                                                <a style="text-decoration: none; color: rgb(153, 204, 153);" href="#" data-toggle="modal" data-target="#modalgreen">
                                                    <div class="text-center">
                                                        
                                                            <h4>2.00-3.24</h4>
                                                        
                                                    </div>
                                                    <div class="text-center">
                                                        <h1 style="font-weight: bolder; font-size: 70px;">
                                                            <?php echo $countRangeGrade["green"] ?>
                                                        </h1>
                                                    </div>
                                                    <div class="text-right">
                                                        <p>คน</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="t1" style="border: 1px solid black; border-collapse: collapse; ">

                                            <div style="color: rgb(245, 123, 57);">
                                                <a style="text-decoration: none; color: rgb(245, 123, 57);" href="#" data-toggle="modal" data-target="#modalorange">
                                                    <div class="text-center">
                                                        
                                                            <h4>1.75-1.99</h4>
                                                        
                                                    </div>
                                                    <div class="text-center">
                                                        <h1 style="font-weight: bolder; font-size: 70px;">
                                                            <?php echo $countRangeGrade["orange"] ?>
                                                        </h1>
                                                    </div>
                                                    <div class="text-right">
                                                        <p>คน</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </th>
                                        <th class="t1" style="border: 1px solid black; border-collapse: collapse;">
                                            <div style="color: rgb(255, 105, 98);">
                                                <a style=" text-decoration: none; color: rgb(255, 105, 98);" href="#" data-toggle="modal" data-target="#modalred">
                                                    <div class="text-center">
                                                        
                                                            <h4>0.00-1.74</h4>
                                                        
                                                    </div>
                                                    <div class="text-center">
                                                        <h1 style="font-weight: bolder; font-size: 70px;">
                                                            <?php echo $countRangeGrade["red"] ?>
                                                        </h1>
                                                    </div>
                                                    <div class="text-right">
                                                        <p>คน</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-4 mx-auto">
                                <table class="table"
                                    style="margin-top: 30px; border: 1px solid black; border-collapse: collapse;">
                                    <tr style="border: 1px solid black; border-collapse: collapse;">
                                        <th class="t1" style="border: 1px solid black; border-collapse: collapse; width: 50%;">
                                            <?php
                                            $countPlanStatus = getCountStudentPlanStatusByDepartmrntIdAndSemesterYear($teacher["departmentId"], $semester["semesterYear"])

                                                ?>

                                            <div style="color: #5dae8b;">
                                                <a style="text-decoration: none; color: #5dae8b;" href="#" data-toggle="modal" data-target="#modalblue2">
                                                    <div class="text-center">
                                                        
                                                            <h4>ตามแผน</h4>
                                                        
                                                    </div>
                                                    <div class="text-center">
                                                        <h1 style="font-weight: bolder; font-size: 70px; ">
                                                            <?php echo $countPlanStatus["plan"] ?>
                                                        </h1>
                                                    </div>
                                                    <div class="text-right">
                                                        <p>คน</p>
                                                    </div>
                                                </a>
                                            </div>


                                        </th>
                                        
                                    </tr>
                                    <tr>
                                        <th class="t1" style="border: 1px solid black; border-collapse: collapse; ">
                                            <div style="color: #ff7676;">
                                                <a style="text-decoration: none; color: #ff7676;" href="#" data-toggle="modal" data-target="#modalgreen2">
                                                    <div class="text-center">
                                                        
                                                            <h4>ไม่ตามแผน</h4>
                                                        
                                                    </div>
                                                    <div class="text-center">
                                                        <h1 style="font-weight: bolder; font-size: 70px;">
                                                            <?php echo $countPlanStatus["notPlan"] ?>
                                                        </h1>
                                                    </div>
                                                    <div class="text-right">
                                                        <p>คน</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </th>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-sm-4 mx-auto">
                                <table class="table"
                                    style="margin-top: 30px; border: 1px solid black; border-collapse: collapse;">
                                    <tr style="border: 1px solid black; border-collapse: collapse;">
                                        <th class="t1" style="border: 1px solid black; border-collapse: collapse;">
                                            <div style="color: #43658b;">
                                                <a style="text-decoration: none; color:  #43658b;" href="#" data-toggle="modal" data-target="#modalred2">
                                                    <div class="text-center">
                                                        
                                                            <h4>จบการศึกษา</h4>
                                                        
                                                    </div>
                                                    <div class="text-center">
                                                        <h1 style="font-weight: bolder; font-size: 70px;">
                                                            <?php echo $countPlanStatus["grad"] ?>
                                                        </h1>
                                                    </div>
                                                    <div class="text-right">
                                                        <p>คน</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="t1" style="border: 1px solid black; border-collapse: collapse;">

                                            <div style="color: #9b4444;">
                                                <a style="text-decoration: none; color: #9b4444;" href="#" data-toggle="modal" data-target="#modalorange2">
                                                    <div class="text-center">
                                                        
                                                            <h4>พ้นสภาพ</h4>
                                                        
                                                    </div>
                                                    <div class="text-center">
                                                        <h1 style="font-weight: bolder; font-size: 70px;">
                                                            <?php echo $countPlanStatus["retire"] ?>
                                                        </h1>
                                                    </div>
                                                    <div class="text-right">
                                                        <p>คน</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </th>
                                        
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <?php
                            $studentGeneretionGradeRangeOnes = getCountStudentGradeRangeSortByGeneretionByDepartmentIdAndSemesterYearAndStudyYear($teacher["departmentId"], $semester["semesterYear"], 1);
                           
                            $pee1gen = [];
                            $pee1blues = [];
                            $pee1greens = [];
                            $pee1oranges = [];
                            $pee1reds = [];

                            //for($y; $y<$yNow; $y++){
                            
                            foreach ($studentGeneretionGradeRangeOnes as $range) {
                               
                                    $sum=$range["blue"]+$range["green"]+$range["orange"]+$range["red"];
                                    $pee1gen[] = "รุ่น " . (string) $range["studyGeneretion"];
                                    $pee1blues[] = $range["blue"]*100/$sum;
                                    $pee1greens[] = $range["green"]*100/$sum;
                                    $pee1oranges[] = $range["orange"]*100/$sum;
                                    $pee1reds[] = $range["red"]*100/$sum;
                               
                            }

                            //}
                            ?>
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">ช่วงเกรดนิสิตปีที่ 1</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="pee1"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <?php
                            $studentGeneretionGradeRangeTwos = getCountStudentGradeRangeSortByGeneretionByDepartmentIdAndSemesterYearAndStudyYear($teacher["departmentId"], $semester["semesterYear"], 2);
                            
                            $pee2genh = [];
                            $pee2bluesh = [];
                            $pee2greensh = [];
                            $pee2orangesh = [];
                            $pee2redsh = [];
                            //for($y; $y<$yNow; $y++){
                            foreach ($studentGeneretionGradeRangeTwos as $range) {
                                    $sum=$range["blue"]+$range["green"]+$range["orange"]+$range["red"];
                                    
                                    $pee2genh[] = "รุ่น " . (string) $range["studyGeneretion"];
                                    $pee2bluesh[] = $range["blue"]*100/$sum;
                                    $pee2greensh[] = $range["green"]*100/$sum;
                                    $pee2orangesh[] = $range["orange"]*100/$sum;
                                    $pee2redsh[] = $range["red"]*100/$sum;
                               
                            }

                            //}
                            ?>
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">ช่วงเกรดนิสิตปีที่ 2</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="pee2"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <?php
                            $studentGeneretionGradeRangeThrees = getCountStudentGradeRangeSortByGeneretionByDepartmentIdAndSemesterYearAndStudyYear($teacher["departmentId"], $semester["semesterYear"], 3);
                            
                            $pee3gen = [];
                            $pee3blues = [];
                            $pee3greens = [];
                            $pee3oranges = [];
                            $pee3reds = [];
                            //for($y; $y<$yNow; $y++){
                            foreach ($studentGeneretionGradeRangeThrees as $range) {
                                $sum=$range["blue"]+$range["green"]+$range["orange"]+$range["red"];
                                    $pee3gen[] = "รุ่น " . (string) $range["studyGeneretion"];
                                    $pee3blues[] = $range["blue"]*100/$sum;
                                    $pee3greens[] = $range["green"]*100/$sum;
                                    $pee3oranges[] = $range["orange"]*100/$sum;
                                    $pee3reds[] = $range["red"]*100/$sum;
                               
                            }
                            //}
                            ?>
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">ช่วงเกรดนิสิตปีที่ 3</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="pee3"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" style="margin-top: 25px;">
                        <div class="card">
                            <?php
                            $studentGeneretionGradeRangeFours = getCountStudentGradeRangeSortByGeneretionByDepartmentIdAndSemesterYearAndStudyYear($teacher["departmentId"], $semester["semesterYear"], 4);
                            
                            $pee4gen = [];
                            $pee4blues = [];
                            $pee4greens = [];
                            $pee4oranges = [];
                            $pee4reds = [];
                            //for($y; $y<$yNow; $y++){
                            
                            foreach ($studentGeneretionGradeRangeFours as $range) {
                                $sum=$range["blue"]+$range["green"]+$range["orange"]+$range["red"];
                                    $pee4gen[] = "รุ่น " . (string) $range["studyGeneretion"];
                                    $pee4blues[] = $range["blue"]*100/$sum;
                                    $pee4greens[] = $range["green"]*100/$sum;
                                    $pee4oranges[] = $range["orange"]*100/$sum;
                                    $pee4reds[] = $range["red"]*100/$sum;
                                
                            }
                            //}
                            ?>
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">ช่วงเกรดนิสิตปีที่ 4</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="pee4"></canvas>
                            </div>
                        </div>
                    </div>

                    <!--<div class="col-sm-4" style="margin-top: 25px;">
                        <div class="card">
                            <?php
                            $studentGeneretionGradeRangeFours = getCountStudentGradeRangeSortByGeneretionByDepartmentIdAndSemesterYearAndStudyYear($teacher["departmentId"], $semester["semesterYear"], 4);
                            
                            $pee4plusgen = [];
                            $pee4plusblues = [];
                            $pee4plusgreens = [];
                            $pee4plusoranges = [];
                            $pee4plusreds = [];
                            //for($y; $y<$yNow; $y++){
                            
                            foreach ($studentGeneretionGradeRangeFours as $range) {
                               
                                $sum=$range["blue"]+$range["green"]+$range["orange"]+$range["red"];
                                    $pee4plusgen[] = "รุ่น " . (string) $range["studyGeneretion"];
                                    $pee4plusblues[] = $range["blue"];
                                    $pee4plusgreens[] = $range["green"];
                                    $pee4plusoranges[] = $range["orange"];
                                    $pee4plusreds[] = $range["red"];
                                
                            }
                            //}
                            ?>
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">ช่วงเกรดนิสิตปีที่ 4+</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="pee4plus"></canvas>
                            </div>
                        </div>
                    </div>-->
                </div>
                <br><br>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">สถานภาพนิสิต ณ ปัจจุบัน</h6>
                            </div>
                            <?php

                            $countStudentStudyingRangeGradeSortByGeneretions = getCountStudentGradeRangeSortByGeneretionByDepartmentIdAndSemesterYearAndStudyYearAndStatus($teacher["departmentId"], $semester["semesterYear"], "กำลังศึกษา");
                           
                            $nowgen = [];
                            $BNG = [];
                            $GNG = [];
                            $ONG = [];
                            $RNG = [];
                            //for($y; $y<$yNow; $y++){
                            foreach ($countStudentStudyingRangeGradeSortByGeneretions as $grade) {
                                $sum=$grade["blue"]+$grade["green"]+$grade["orange"]+$grade["red"];
                                    $nowgen[] = "รุ่น " . (string) $grade["studyGeneretion"];
                                    $BNG[] = $grade["blue"]*100/$sum;
                                    $GNG[] = $grade["green"]*100/$sum;
                                    $ONG[] = $grade["orange"]*100/$sum;
                                    $RNG[] = $grade["red"]*100/$sum;
                               
                            }
                            //}
                            ?>
                            <div class="card-body">
                                <canvas id="learn"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <?php

                            $countStudentGraduateRangeGradeSortByGeneretions = getCountStudentGradeRangeSortByGeneretionByDepartmentIdAndSemesterYearAndStudyYearAndStatus($teacher["departmentId"], $semester["semesterYear"], "จบการศึกษา");
                            $endgen = [];
                            $BEG = [];
                            $GEG = [];
                            $OEG = [];
                            $REG = [];
                            foreach ($countStudentGraduateRangeGradeSortByGeneretions as $gradeEnd) {
                                $sum=$gradeEnd["blue"]+$gradeEnd["green"]+$gradeEnd["orange"]+$gradeEnd["red"];
                                $endgen[] = "รุ่น " . (string) $gradeEnd["studyGeneretion"];
                                $BEG[] =$gradeEnd["blue"]*100/$sum;
                                $GEG[] =$gradeEnd["green"]*100/$sum;
                                $OEG[] =$gradeEnd["orange"]*100/$sum;
                                $REG[] =$gradeEnd["red"]*100/$sum;
                            }
                            ?>
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">สถานภาพนิสิตจบการศึกษา </h6>
                            </div>
                            <div class="card-body">
                                <canvas id="learn2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">จำนวนนิสิต (คน)</h6>
                            </div>
                            <?php

                            $studentStatusGeneretions = getCountStudentStatusSortByGeneretionByDepartmentIdAndSemesterYearAndStudyYear($teacher["departmentId"], $semester["semesterYear"]);
                            // print_r($studentStatusGeneretions);
                            $studyGeneretion = [];
                            $firstEntry = [];
                            $study = [];
                            $grad = [];
                            foreach ($studentStatusGeneretions as $statusGeneretions) {
                                
                                $studyGeneretion[] = "รุ่น " . (string) $statusGeneretions["studyGeneretion"];
                                $firstEntry[] = $statusGeneretions["firstEntry"];
                                $study[] = $statusGeneretions["study"];
                                $grad[] = $statusGeneretions["grad"];
                            }
                            ?>
                            <div class="card-body ">
                                <div class="row" style="padding: 20px;">
                                    <div class="col-sm-6">

                                        <canvas id="myChart"></canvas>
                                    </div>
                                    <div class="col-sm-6 float-right">
                                        <div class="table-responsive">
                                            <table class="table table-striped" cellspacing="0" style="color: black;">
                                                <thead>
                                                    <tr>
                                                        <th style=" text-align: right; ">รุ่น</th>
                                                        <th style="text-align: right; ">
                                                            <span>แรกเข้า</span>
                                                        </th>
                                                        <th style="text-align: right;"><span>กำลังศึกษา</span></th>
                                                        <th style="text-align: right;">จบการศึกษา</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $sumFisrtEntry = 0;
                                                    $sumStudy = 0;
                                                    $sumGrad = 0;
                                                    foreach($studentStatusGeneretions as $generetionCountStatus){
                                                        $sumFisrtEntry += $generetionCountStatus["firstEntry"];
                                                        $sumStudy += $generetionCountStatus["study"];
                                                        $sumGrad += $generetionCountStatus["grad"];
                                                    ?>
                                                    <tr>
                                                        <td style=" text-align: right;"><?php echo $generetionCountStatus["studyGeneretion"]?></td>
                                                        <td style=" text-align: right;">
                                                        <?php echo $generetionCountStatus["firstEntry"]?> คน
                                                        </td>
                                                        <td style=" text-align: right;">
                                                        <?php echo $generetionCountStatus["study"]?> คน
                                                        </td>
                                                        <td style=" text-align: right;"><?php echo $generetionCountStatus["grad"]?> คน</td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>

                                                    


                                                    <tr>
                                                        <th scope='row' style=" text-align: right;  ">
                                                            ทุกรุ่น</th>
                                                        <td style="font-weight: bold; text-align: right;"><?php echo $sumFisrtEntry ?> คน</td>
                                                        <td style='font-weight: bold; text-align: right;'><?php echo $sumStudy ?> คน</td>
                                                        <td style='font-weight: bold; text-align: right;'><?php echo $sumGrad ?> คน</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">อัตราส่วนนิสิตแยกตามหลักสูตร (คน)</h6>
                            </div>
                            <?php
                                $countPlanStatusSortBySemesterYears = getCountStudentPlanStatusSortBySemesterYearByDepartmentIdAndSemesterYear($teacher["departmentId"], $semester["semesterYear"]);
                                //print_r($countPlanStatusSortBySemesterYears);
                                $semesterLearncos=[];
                                $planLearncos=[];
                                $notPlanLearncos=[];
                                $retireLearncos=[];
                                foreach($countPlanStatusSortBySemesterYears as $planStatus){
                                    $sum=$planStatus["plan"]+$planStatus["notPlan"]+$planStatus["retire"];
                                    $semesterLearncos[] = (string)$planStatus["semesterYear"];
                                    $planLearncos[] = $planStatus["plan"]*100/$sum;
                                    $notPlanLearncos[] = $planStatus["notPlan"]*100/$sum;
                                    $retireLearncos[] = $planStatus["retire"]*100/$sum;
                                }
                            ?>
                            <div class="card-body ">
                                <div class="row" style="padding: 20px;">
                                    <div class="col-sm-6">

                                        <canvas id="learncos"></canvas>
                                    </div>
                                    <div class="col-sm-6 float-right">
                                        <div class="table-responsive">
                                            <table class="table table-striped" cellspacing="0" style="color: black;">
                                                <thead style=" ">
                                                    <tr>
                                                        <th style=" text-align: right; ">ปีการศึกษา</th>
                                                        <th style="text-align: right;">
                                                            <span>ตามหลักสูตร</span>
                                                        </th>
                                                        <th style="text-align: right;">
                                                            <span>ไม่ตามหลักสูตร</span>
                                                        </th>
                                                        <th style="text-align: right; ">พ้นสภาพ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $sumPlan = 0;
                                                    $sumNotPlan = 0;
                                                    $sumRetire = 0;
                                                    foreach($countPlanStatusSortBySemesterYears as $countPlanStatusSortBySemesterYear){
                                                        $sumPlan += $countPlanStatusSortBySemesterYear["plan"];
                                                        $sumNotPlan += $countPlanStatusSortBySemesterYear["notPlan"];
                                                        $sumRetire += $countPlanStatusSortBySemesterYear["retire"];
                                                    ?>
                                                    <tr>
                                                        <td style=" text-align: right;"><?php echo $countPlanStatusSortBySemesterYear["semesterYear"]?></td>
                                                        <td style=" text-align: right;">
                                                        <?php echo $countPlanStatusSortBySemesterYear["plan"]?> คน
                                                        </td>
                                                        <td style=" text-align: right;">
                                                        <?php echo $countPlanStatusSortBySemesterYear["notPlan"]?> คน
                                                        </td>
                                                        <td style=" text-align: right;"><?php echo $countPlanStatusSortBySemesterYear["retire"]?> คน</td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>


                                                    <tr>
                                                        <th scope='row' style=" text-align: right;">ทุกปีการศึกษา</th>
                                                        <td style="font-weight: bold; text-align: right;"><?php echo $sumPlan ?> คน</td>
                                                        <td style='font-weight: bold; text-align: right;'><?php echo $sumNotPlan ?> คน</td>
                                                        <td style='font-weight: bold; text-align: right;'><?php echo $sumRetire ?> คน</td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">อัตราส่วนนิสิตแยกตามรุ่น (คน)</h6>
                            </div>
                            <?php
                                $countPlanStatusSortByGeneretions = getCountStudentPlanStatusSortByStudyGeneretionByDepartmentAndSemesterYear($teacher["departmentId"], $semester["semesterYear"]);
                                //print_r($countPlanStatusSortByGeneretions);
                                $semesterGen=[];
                                $planGen=[];
                                $notPlanGen=[];
                                $retireGen=[];
                                foreach($countPlanStatusSortByGeneretions as $planStatusGen){
                                    $sum=$planStatusGen["plan"]+$planStatusGen["notPlan"]+$planStatusGen["retire"];
                                    $semesterGen[] = "รุ่น ".(string)$planStatusGen["studyGeneretion"];
                                    $planGen[] = $planStatusGen["plan"]*100/$sum;
                                    $notPlanGen[] = $planStatusGen["notPlan"]*100/$sum;
                                    $retireGen[] = $planStatusGen["retire"]*100/$sum;
                                }
                                                    
                            ?>
                            <div class="card-body ">
                                <div class="row" style="padding: 20px;">
                                    <div class="col-sm-6">

                                        <canvas id="learnyear"></canvas>
                                    </div>
                                    <div class="col-sm-6 float-right">
                                        <div class="table-responsive">
                                            <table class="table table-striped" cellspacing="0" style="color: black;">
                                                <thead style=" ">
                                                    <tr>
                                                        <th style=" text-align: right; ">รุ่น</th>
                                                        <th style="text-align: right; "><span>ตามแผน</span>
                                                        </th>
                                                        <th style="text-align: right; "><span>ไม่ตามแผน</span></th>
                                                        <th style="text-align: right; ">พ้นสภาพ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    
                                                    $sumPlanGen = 0;
                                                    $sumNotPlanGen = 0;
                                                    $sumRetireGen = 0;
                                                    foreach($countPlanStatusSortByGeneretions as $countPlanStatusSortByGeneretion){
                                                    $sumPlanGen += $countPlanStatusSortByGeneretion["plan"];
                                                    $sumNotPlanGen += $countPlanStatusSortByGeneretion["notPlan"];
                                                    $sumRetireGen += $countPlanStatusSortByGeneretion["retire"];
                                                    
                                                    ?>
                                                    <tr>
                                                        <td style=" text-align: right;"><?php echo $countPlanStatusSortByGeneretion["studyGeneretion"] ?></td>
                                                        <td style=" text-align: right;">
                                                        <?php echo $countPlanStatusSortByGeneretion["plan"] ?> คน</td> 
                                                        </td>
                                                        <td style=" text-align: right;">
                                                        <?php echo $countPlanStatusSortByGeneretion["notPlan"] ?> คน</td> 
                                                        </td>
                                                        <td style=" text-align: right;"><?php echo $countPlanStatusSortByGeneretion["retire"] ?> คน </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>


                                                    <tr>
                                                        <th scope='row' style=" text-align: right;">ทุกรุ่น</th>
                                                        <td style="font-weight: bold; text-align: right;"><?php echo $sumPlanGen ?> คน</td>
                                                        <td style='font-weight: bold; text-align: right;'><?php echo $sumNotPlanGen ?> คน</td>
                                                        <td style='font-weight: bold; text-align: right;'><?php echo $sumRetireGen ?> คน</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modalblue -->
                <div id="modalblue" class="modal fade" style="color: black;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="height: 90px;">
                                        <h5>รายชื่อนิสิต ช่วงเกรด 3.25-4.00 </h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <br>

                                    </div>
                                    <h5 class="modal-title" style="margin-left: 10px;">จำนวนนิสิต <?php echo sizeof($countRangeGrade["blues"])?> คน</h5>
                                    <?php
                                        if(sizeof($countRangeGrade["blues"]) > 0){
                                        
                                    ?>
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th class="text-center">รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th class="text-center">GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach($countRangeGrade["blues"] as $student){
                                                    ?>
                                                    <tr>
                                                            <th class="text-center"><?php echo $student["studentId"]?></th>
                                                            <th><?php echo $student["fisrtNameTh"]." ".$student["lastNameTh"]?></th>
                                                            <th class="text-center"><?php echo $student["gpaAll"]?></th>
                                                    </tr>
                                                    <?php
                                                    }?>

                                                </tbody>
                                            </table>

                                        </div>
                                    <?php }?>
                                    
                                    <hr>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                            style="font-size: 18px;">ปิดหน้าต่าง</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modalgreen -->
                    <div id="modalgreen" class="modal fade" style="color: black;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="height: 90px;">
                                        <h5>รายชื่อนิสิต ช่วงเกรด 2.00-3.24 </h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <br>

                                    </div>
                                    <h5 class="modal-title" style="margin-left: 10px;">จำนวนนิสิต <?php echo sizeof($countRangeGrade["greens"])?> คน</h5>
                                    <?php
                                        if(sizeof($countRangeGrade["greens"]) > 0){
                                        
                                    ?>
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th class="text-center">รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th class="text-center">GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach($countRangeGrade["greens"] as $student){
                                                    ?>
                                                        <tr>
                                                            <th class="text-center"><?php echo $student["studentId"]?></th>
                                                            <th><?php echo $student["fisrtNameTh"]." ".$student["lastNameTh"]?></th>
                                                            <th class="text-center"><?php echo $student["gpaAll"]?></th>
                                                        </tr>
                                                    <?php }?>

                                                </tbody>
                                            </table>

                                        </div>
                                    <?php }?>
                                    <hr>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                            style="font-size: 18px;">ปิดหน้าต่าง</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modalorange -->
                    <div id="modalorange" class="modal fade" style="color: black;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="height: 90px;">
                                        <h5>รายชื่อนิสิต ช่วงเกรด 1.75-1.99 </h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <br>

                                    </div>
                                    <h5 class="modal-title" style="margin-left: 10px;">จำนวนนิสิต <?php echo sizeof($countRangeGrade["oranges"])?> คน</h5>
                                    <?php
                                        if(sizeof($countRangeGrade["oranges"]) > 0){
                                        
                                    ?>
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th class="text-center">รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th class="text-center">GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach($countRangeGrade["greens"] as $student){
                                                    ?>
                                                        <tr>
                                                            <th class="text-center"><?php echo $student["studentId"]?></th>
                                                            <th><?php echo $student["fisrtNameTh"]." ".$student["lastNameTh"]?></th>
                                                            <th class="text-center"><?php echo $student["gpaAll"]?></th>
                                                        </tr>
                                                    <?php }?>

                                                </tbody>
                                            </table>

                                        </div>
                                    <?php }?>
                                    <hr>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                            style="font-size: 18px;">ปิดหน้าต่าง</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modalred -->
                    <div id="modalred" class="modal fade" style="color: black;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="height: 90px;">
                                        <h5>รายชื่อนิสิต ช่วงเกรด 0.00-1.74 </h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <br>

                                    </div>
                                    <h5 class="modal-title" style="margin-left: 10px;">จำนวนนิสิต <?php echo sizeof($countRangeGrade["reds"])?> คน</h5>
                                    <?php
                                        if(sizeof($countRangeGrade["reds"]) > 0){
                                        
                                    ?>
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th class="text-center">รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th class="text-center">GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach($countRangeGrade["reds"] as $student){
                                                    ?>
                                                        <tr>
                                                            <th class="text-center"><?php echo $student["studentId"]?></th>
                                                            <th><?php echo $student["fisrtNameTh"]." ".$student["lastNameTh"]?></th>
                                                            <th class="text-center"><?php echo $student["gpaAll"]?></th>
                                                        </tr>
                                                    <?php }?>
                                                    

                                                </tbody>
                                            </table>

                                        </div>
                                    <?php }?>
                                    <hr>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                            style="font-size: 18px;">ปิดหน้าต่าง</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modalblue2 -->
                    <div id="modalblue2" class="modal fade" style="color: black;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="height: 90px;">
                                        <h5>รายชื่อนิสิต ตามแผน </h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <br>

                                    </div>
                                    <h5 class="modal-title" style="margin-left: 10px;">จำนวนนิสิต <?php echo sizeof($countPlanStatus["plans"])?> คน</h5>
                                    <?php
                                        if(sizeof($countPlanStatus["plans"]) > 0){
                                        
                                    ?>
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th class="text-center">รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th class="text-center">GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach($countPlanStatus["plans"] as $student){
                                                    ?>
                                                        <tr>
                                                            <th class="text-center"><?php echo $student["studentId"]?></th>
                                                            <th><?php echo $student["fisrtNameTh"]." ".$student["lastNameTh"]?></th>
                                                            <th class="text-center"><?php echo $student["gpaAll"]?></th>
                                                        </tr>
                                                    <?php }?>
                                                    

                                                </tbody>
                                            </table>

                                        </div>
                                    <?php }?>
                                    <hr>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                            style="font-size: 18px;">ปิดหน้าต่าง</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modalgreen2 -->
                    <div id="modalgreen2" class="modal fade" style="color: black;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="height: 90px;">
                                        <h5>รายชื่อนิสิต ไม่ตามแผน </h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <br>

                                    </div>
                                    <h5 class="modal-title" style="margin-left: 10px;">จำนวนนิสิต <?php echo sizeof($countPlanStatus["notPlans"])?> คน</h5>
                                    <?php
                                        if(sizeof($countPlanStatus["notPlans"]) > 0){
                                        
                                    ?>
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th class="text-center">รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th class="text-center">GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach($countPlanStatus["notPlans"] as $student){
                                                    ?>
                                                        <tr>
                                                            <th class="text-center"><?php echo $student["studentId"]?></th>
                                                            <th><?php echo $student["fisrtNameTh"]." ".$student["lastNameTh"]?></th>
                                                            <th class="text-center"><?php echo $student["gpaAll"]?></th>
                                                        </tr>
                                                    <?php }?>

                                                </tbody>
                                            </table>

                                        </div>
                                    <?php }?>
                                    <hr>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                            style="font-size: 18px;">ปิดหน้าต่าง</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modalorange2 -->
                    <div id="modalorange2" class="modal fade" style="color: black;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="height: 90px;">
                                        <h5>รายชื่อนิสิต พ้นสภาพ </h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <br>

                                    </div>
                                    <h5 class="modal-title" style="margin-left: 10px;">จำนวนนิสิต <?php echo sizeof($countPlanStatus["retires"])?> คน</h5>
                                    <?php
                                        if(sizeof($countPlanStatus["retires"]) > 0){
                                        
                                    ?>
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th class="text-center">รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th class="text-center">GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach($countPlanStatus["retires"] as $student){
                                                    ?>
                                                        <tr>
                                                            <th class="text-center"><?php echo $student["studentId"]?></th>
                                                            <th><?php echo $student["fisrtNameTh"]." ".$student["lastNameTh"]?></th>
                                                            <th class="text-center"><?php echo $student["gpaAll"]?></th>
                                                        </tr>
                                                    <?php }?>
                                                    

                                                </tbody>
                                            </table>

                                        </div>
                                    <?php }?>
                                    <hr>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                            style="font-size: 18px;">ปิดหน้าต่าง</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modalred2 -->
                    <div id="modalred2" class="modal fade" style="color: black;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="height: 90px;">
                                        <h5>รายชื่อนิสิต จบการศึกษา </h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <br>

                                    </div>
                                    <h5 class="modal-title" style="margin-left: 10px;">จำนวนนิสิต <?php echo sizeof($countPlanStatus["grads"])?> คน</h5>
                                    <?php
                                        if(sizeof($countPlanStatus["grads"]) > 0){
                                        
                                    ?>
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th class="text-center">รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th class="text-center">GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach($countPlanStatus["grads"] as $student){
                                                    ?>
                                                        <tr>
                                                            <th class="text-center"><?php echo $student["studentId"]?></th>
                                                            <th><?php echo $student["fisrtNameTh"]." ".$student["lastNameTh"]?></th>
                                                            <th class="text-center"><?php echo $student["gpaAll"]?></th>
                                                        </tr>
                                                    <?php }?>
                                                    

                                                </tbody>
                                            </table>

                                        </div>
                                    <?php }?>
                                    <hr>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                            style="font-size: 18px;">ปิดหน้าต่าง</button>
                                    </div>
                                </div>
                            </div>
                        </div>




                <!-- Bootstrap core JavaScript-->
                <script src="../vendor/jquery/jquery.min.js"></script>
                <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="../vendor/jquery/jquery.min.js"></script>
                <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Page level plugins -->
                <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
                <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="../js/demo/datatables-demo.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="../js/sb-admin-2.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>

                <!-- Bootstrap core JavaScript-->
                <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="../js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="../vendor/chart.js/Chart.min.js"></script>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>

                <script>
                    var studyGeneretions = <?php echo json_encode($studyGeneretion); ?>;

                    var firstEntrys = <?php echo json_encode($firstEntry); ?>;
                    var studys = <?php echo json_encode($study); ?>;
                    var grads = <?php echo json_encode($grad); ?>;
                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: studyGeneretions,
                            datasets: [{
                                label: 'นิสิตแรกเข้า',
                                data: firstEntrys,
                                backgroundColor: '#949cdf',
                                borderColor: [
                                    'rgba(150,186,169, 1)', //1
                                    'rgba(108,158,134, 1)',
                                    'rgba(66,130,100, 1)',
                                    'rgba(45,117,83, 1)',
                                    'rgba(27,70,49, 1)', //5
                                    'rgba(0, 51, 18, 1)'
                                ],
                                borderWidth: 0
                            },
                            {
                                label: 'นิสิตกำลังศึกษา',
                                data: studys,
                                backgroundColor: '#4e89ae',
                                borderColor: [
                                    'rgba(150,186,169, 1)', //1
                                    'rgba(108,158,134, 1)',
                                    'rgba(66,130,100, 1)',
                                    'rgba(45,117,83, 1)',
                                    'rgba(27,70,49, 1)', //5
                                    'rgba(0, 51, 18, 1)'
                                ],
                                borderWidth: 0
                            },
                            {
                                label: 'นิสิตจบการศึกษา',
                                data: grads,
                                backgroundColor: '#43658b',
                                borderColor: [
                                    'rgba(150,186,169, 1)', //1
                                    'rgba(108,158,134, 1)',
                                    'rgba(66,130,100, 1)',
                                    'rgba(45,117,83, 1)',
                                    'rgba(27,70,49, 1)', //5
                                    'rgba(0, 51, 18, 1)'
                                ],
                                borderWidth: 0
                            }

                            ]

                        },

                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        min: 0
                                    }
                                }]
                            },
                            responsive: true,

                        }
                    });
                </script>

                <script>
                    var ctx = document.getElementById("myCharts");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: ['2565', '2566'],
                            datasets: [{
                                label: 'นิสิตแรกเข้า',
                                data: [60, 60],
                                backgroundColor: '#949cdf',
                                borderColor: [
                                    'rgba(150,186,169, 1)', //1
                                    'rgba(108,158,134, 1)',
                                    'rgba(66,130,100, 1)',
                                    'rgba(45,117,83, 1)',
                                    'rgba(27,70,49, 1)', //5
                                    'rgba(0, 51, 18, 1)'
                                ],
                                borderWidth: 0
                            },
                            {
                                label: 'นิสิตพ้นสภาพ',
                                data: [0, 10],
                                backgroundColor: '#9b4444',
                                borderColor: [
                                    'rgba(150,186,169, 1)', //1
                                    'rgba(108,158,134, 1)',
                                    'rgba(66,130,100, 1)',
                                    'rgba(45,117,83, 1)',
                                    'rgba(27,70,49, 1)', //5
                                    'rgba(0, 51, 18, 1)'
                                ],
                                borderWidth: 0
                            },
                            {
                                label: 'นิสิตกำลังศึกษา',
                                data: [50, 110],
                                backgroundColor: '#4e89ae',
                                borderColor: [
                                    'rgba(150,186,169, 1)', //1
                                    'rgba(108,158,134, 1)',
                                    'rgba(66,130,100, 1)',
                                    'rgba(45,117,83, 1)',
                                    'rgba(27,70,49, 1)', //5
                                    'rgba(0, 51, 18, 1)'
                                ],
                                borderWidth: 0
                            },
                            {
                                label: 'นิสิตจบการศึกษา',
                                data: [0, 0],
                                backgroundColor: '#43658b',
                                borderColor: [
                                    'rgba(150,186,169, 1)', //1
                                    'rgba(108,158,134, 1)',
                                    'rgba(66,130,100, 1)',
                                    'rgba(45,117,83, 1)',
                                    'rgba(27,70,49, 1)', //5
                                    'rgba(0, 51, 18, 1)'
                                ],
                                borderWidth: 0
                            }

                            ]

                        },

                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        max: 150,
                                        min: 0
                                    }
                                }]
                            },
                            responsive: true,

                        }
                    });
                </script>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>

                <script>
                    var p1gen = <?php echo json_encode($pee1gen); ?>;

                    var p1blue = <?php echo json_encode($pee1blues); ?>;
                    var p1green = <?php echo json_encode($pee1greens); ?>;
                    var p1orange = <?php echo json_encode($pee1oranges); ?>;
                    var p1red = <?php echo json_encode($pee1reds); ?>;

                    var ctx = document.getElementById("pee1");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: p1gen,
                            datasets: [{
                                label: '3.25-4.00',
                                data: p1blue,
                                backgroundColor: "rgba(134, 211, 247,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '2.00-3.24',
                                data: p1green,
                                backgroundColor: "rgba(153, 204, 153,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '1.75-1.99',
                                data: p1orange,
                                backgroundColor: 'rgba(245, 123, 57,0.7)',
                                borderWidth: 0
                            },
                            {
                                label: '0.00-1.74',
                                data: p1red,
                                backgroundColor: 'rgba(255, 105, 98,0.7)',
                                borderWidth: 0
                            }
                            ]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    stacked: true,
                                },
                                y: {
                                    stacked: true,
                                    max: 100
                                }
                            }

                        }
                    });
                </script>

                <script>
                    var p2genh = <?php echo json_encode($pee2genh); ?>;

                    var p2blueh = <?php echo json_encode($pee2bluesh); ?>;
                    var p2greenh = <?php echo json_encode($pee2greensh); ?>;
                    var p2orangeh = <?php echo json_encode($pee2orangesh); ?>;
                    var p2redh = <?php echo json_encode($pee2redsh); ?>;
                    var ctx = document.getElementById("pee2");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: p2genh,
                            datasets: [{
                                label: '3.25-4.00',
                                data: p2blueh,
                                backgroundColor: "rgba(134, 211, 247,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '2.00-3.24',
                                data: p2greenh,
                                backgroundColor: "rgba(153, 204, 153,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '1.75-1.99',
                                data: p2orangeh,
                                backgroundColor: 'rgba(245, 123, 57,0.7)',
                                borderWidth: 0
                            },
                            {
                                label: '0.00-1.74',
                                data: p2redh,
                                backgroundColor: 'rgba(255, 105, 98,0.7)',
                                borderWidth: 0
                            }
                            ]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    stacked: true,
                                },
                                y: {
                                    max:100,
                                    stacked: true
                                }
                            }

                        }
                    });
                </script>
                <script>
                    var p3gen = <?php echo json_encode($pee3gen); ?>;

                    var p3blue = <?php echo json_encode($pee3blues); ?>;
                    var p3green = <?php echo json_encode($pee3greens); ?>;
                    var p3orange = <?php echo json_encode($pee3oranges); ?>;
                    var p3red = <?php echo json_encode($pee3reds); ?>;
                    var ctx = document.getElementById("pee3");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: p3gen,
                            datasets: [{
                                label: '3.25-4.00',
                                data: p3blue,
                                backgroundColor: "rgba(134, 211, 247,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '2.00-3.24',
                                data: p3green,
                                backgroundColor: "rgba(153, 204, 153,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '1.75-1.99',
                                data: p3orange,
                                backgroundColor: 'rgba(245, 123, 57,0.7)',
                                borderWidth: 0
                            },
                            {
                                label: '0.00-1.74',
                                data: p3red,
                                backgroundColor: 'rgba(255, 105, 98,0.7)',
                                borderWidth: 0
                            }
                            ]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    stacked: true,
                                },
                                y: {
                                    stacked: true
                                }
                            }

                        }
                    });
                </script>
                <script>
                    var p4gen = <?php echo json_encode($pee4gen); ?>;

                    var p4blue = <?php echo json_encode($pee4blues); ?>;
                    var p4green = <?php echo json_encode($pee4greens); ?>;
                    var p4orange = <?php echo json_encode($pee4oranges); ?>;
                    var p4red = <?php echo json_encode($pee4reds); ?>;
                    var ctx = document.getElementById("pee4");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: p4gen,
                            datasets: [{
                                label: '3.25-4.00',
                                data: p4blue,
                                backgroundColor: "rgba(134, 211, 247,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '2.00-3.24',
                                data: p4green,
                                backgroundColor: "rgba(153, 204, 153,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '1.75-1.99',
                                data: p4orange,
                                backgroundColor: 'rgba(245, 123, 57,0.7)',
                                borderWidth: 0
                            },
                            {
                                label: '0.00-1.74',
                                data: p4red,
                                backgroundColor: 'rgba(255, 105, 98,0.7)',
                                borderWidth: 0
                            }
                            ]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    stacked: true,
                                },
                                y: {
                                    max:100,
                                    stacked: true
                                }
                            }

                        }
                    });
                </script>

                <script>
                    var p4plusgen = <?php echo json_encode($pee4plusgen); ?>;

                    var p4plusblue = <?php echo json_encode($pee4plusblues); ?>;
                    var p4plusgreen = <?php echo json_encode($pee4plusgreens); ?>;
                    var p4plusorange = <?php echo json_encode($pee4plusoranges); ?>;
                    var p4plusred = <?php echo json_encode($pee4plusreds); ?>;
                    var ctx = document.getElementById("pee4plus");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: p4plusgen,
                            datasets: [{
                                label: '3.25-4.00',
                                data: p4plusblue,
                                backgroundColor: "rgba(134, 211, 247,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '2.00-3.24',
                                data: p4plusgreen,
                                backgroundColor: "rgba(153, 204, 153,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '1.75-1.99',
                                data: p4plusorange,
                                backgroundColor: 'rgba(245, 123, 57,0.7)',
                                borderWidth: 0
                            },
                            {
                                label: '0.00-1.74',
                                data: p4plusred,
                                backgroundColor: 'rgba(255, 105, 98,0.7)',
                                borderWidth: 0
                            }
                            ]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    stacked: true,
                                },
                                y: {
                                    stacked: true
                                }
                            }

                        }
                    });
                </script>
                <script>
                    var gennow = <?php echo json_encode($nowgen); ?>;

                    var bluegen = <?php echo json_encode($BNG); ?>;
                    var greengen = <?php echo json_encode($GNG); ?>;
                    var orangegen = <?php echo json_encode($ONG); ?>;
                    var redgen = <?php echo json_encode($RNG); ?>;


                    var ctx = document.getElementById("learn");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: gennow,
                            datasets: [{
                                label: '3.25-4.00',
                                data: bluegen,
                                backgroundColor: "rgba(134, 211, 247,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '2.00-3.24',
                                data: greengen,
                                backgroundColor: "rgba(153, 204, 153,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '1.75-1.99',
                                data: orangegen,
                                backgroundColor: 'rgba(245, 123, 57,0.7)',
                                borderWidth: 0
                            },
                            {
                                label: '0.00-1.74',
                                data: redgen,
                                backgroundColor: 'rgba(255, 105, 98,0.7)',
                                borderWidth: 0
                            }
                            ]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    stacked: true,
                                },
                                y: {
                                    max:100,
                                    stacked: true
                                }
                            }

                        }
                    });
                </script>

                <script>
                    var genend = <?php echo json_encode($endgen); ?>;

                    var bluegenend = <?php echo json_encode($BEG); ?>;
                    var greengenend = <?php echo json_encode($GEG); ?>;
                    var orangegenend = <?php echo json_encode($OEG); ?>;
                    var redgenend = <?php echo json_encode($REG); ?>;


                    var ctx = document.getElementById("learn2");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: genend,
                            datasets: [{
                                label: '3.25-4.00',
                                data: bluegenend,
                                backgroundColor: "rgba(134, 211, 247,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '2.00-3.24',
                                data: greengenend,
                                backgroundColor: "rgba(153, 204, 153,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '1.75-1.99',
                                data: orangegenend,
                                backgroundColor: 'rgba(245, 123, 57,0.7)',
                                borderWidth: 0
                            },
                            {
                                label: '0.00-1.74',
                                data: redgenend,
                                backgroundColor: 'rgba(255, 105, 98,0.7)',
                                borderWidth: 0
                            }
                            ]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    stacked: true,
                                },
                                y: {
                                    stacked: true
                                }
                            }

                        }
                    });
                </script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js">
                </script>
                <script>
                    
                    var semesterLearncos = <?php echo json_encode($semesterLearncos); ?>;

                    var planLearncos = <?php echo json_encode($planLearncos); ?>;
                    var notPlanLearncos = <?php echo json_encode($notPlanLearncos); ?>;
                    var retireLearncos = <?php echo json_encode($retireLearncos); ?>;

                    var ctx = document.getElementById("learncos");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: semesterLearncos,
                            datasets: [{
                                label: 'ตามหลักสูตร',
                                data: planLearncos,
                                backgroundColor: "#5dae8b",
                                borderWidth: 0
                            },
                            {
                                label: ['ไม่ตามหลักสุตร'],
                                data: notPlanLearncos,
                                backgroundColor: "#ff7676",
                                borderWidth: 0
                            },
                            {
                                label: ['พ้นสภาพ'],
                                data: retireLearncos,
                                backgroundColor: '#9b4444',
                                borderWidth: 0
                            }
                            ]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    stacked: true,
                                },
                                y: {
                                    stacked: true
                                }
                            }

                        }
                    });
                </script>

                <!-- ปิด script กราฟด้านบน -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js">
                </script>

                <script>
                    var semesterGen = <?php echo json_encode($semesterGen); ?>;

                    var planGen = <?php echo json_encode($planGen); ?>;
                    var notPlanGen = <?php echo json_encode($notPlanGen); ?>;
                    var retireGen = <?php echo json_encode($retireGen); ?>;

                    var ctx = document.getElementById("learnyear");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: semesterGen,
                            datasets: [
                                {
                                    label: 'ตามหลักสูตร',
                                    data: planGen,
                                    backgroundColor: "#5dae8b",
                                    borderWidth: 0
                                },
                                {
                                    label: ['ไม่ตามหลักสุตร'],
                                    data: notPlanGen,
                                    backgroundColor: "#ff7676",
                                    borderWidth: 0
                                },
                                {
                                    label: ['พ้นสภาพ'],
                                    data: retireGen,
                                    backgroundColor: '#9b4444',
                                    borderWidth: 0
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    stacked: true,
                                },
                                y: {
                                    stacked: true
                                }
                            }

                        }
                    });
                </script>


</body>

</html>