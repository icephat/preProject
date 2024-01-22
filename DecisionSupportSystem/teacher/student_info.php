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

<?php

session_start();

require_once '../function/teacherFunction.php';



$teacher = getTeacherByUsernameTeacher($_SESSION["access-user"]);


$studentId = $_POST["studentId"];
$student = getStudentByStudentId($studentId);



?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php include('../layout/teacher/nisit.php'); ?>

                    <hr>


                    <!-- Content Row -------------------------------------------------------BOX----------------------->
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 style="color: black;"><?php echo $student["studentId"] ?> <span style="color: blue;"><?php echo $student["fisrtNameTh"]." ".$student["lastNameTh"] ?></span>
                            </h5>
                        </div>
                        <div class="col-sm-6 text-right">
                            <?php
                            
                                
                            
                            ?>
                            <a href="./calGPAHis.php" type="button" class="btn btn-primary">ดูประวัติการคาดการณ์</a>
                        </div>
                    </div>
                    <hr>
                    <!-- Content Row -------------------------------------------------------BOX----------------------->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: blue;">ชื่อ-นามสกุล (ภาษาอังกฤษ) : </p>
                                </div>
                                <div class="col-sm-6">
                                    <p style="color: gray;"><?php echo $student["fisrtNameEng"]." ".$student["lastNameEng"] ?></p>
                                </div>

                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: blue;">เบอร์โทรศัพท์ : </p>
                                </div>
                                <div class="col-sm-6">
                                    <p style="color: gray;"><?php echo $student["tell"]?></p>
                                </div>

                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: blue;">e-Mail :</p>
                                </div>
                                <div class="col-sm-6">
                                    <p style="color: gray;"><?php echo $student["email"]?></p>
                                </div>

                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: blue;">สาขาวิชา :</p>
                                </div>
                                <div class="col-sm-6">
                                    <p style="color: gray;"><?php echo $student["department"]["departmentName"] ?></p>
                                </div>

                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: blue;">การศึกษาระดับมัธยม :</p>
                                </div>
                                <div class="col-sm-6">
                                    <p style="color: gray;"><?php echo $student["school"]["schoolName"] ?></p>
                                </div>

                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: blue;">ช่องทางรับเข้า :</p>
                                </div>
                                <div class="col-sm-6">
                                    <p style="color: gray;">TCAS<?php echo $student["tcasId"]?></p>
                                </div>

                            </div>
                            <!-- <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: blue;">สิทธิ์ฝึกงาน :</p>
                                </div>
                                <div class="col-sm-6">
                                    <p style="color: gray;">มีสิทธิ์/ <span style="color: green;">ผ่าน</span></p>
                                </div>
                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: blue;">สิทธิ์โครงงาน :</p>
                                </div>
                                <div class="col-sm-6">
                                    <p style="color: gray;">มีสิทธิ์/ <span style="color: red;">ไม่ผ่าน</span></p>
                                </div>
                            </div> -->

                        </div>

                        <div class="col-sm-6">
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: blue;">รหัสประจำตัวประชาชน : </p>
                                </div>
                                <div class="col-sm-6">
                                    <p style="color: gray;"><?php echo $student["personId"]?></p>
                                </div>

                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: blue;">เบอร์โทรศัพท์ผู้ปกครอง : </p>
                                </div>
                                <div class="col-sm-6">
                                    <p style="color: gray;"><?php echo $student["parentTell"]?></p>
                                </div>

                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: blue;">อาจารย์ที่ปรึกษา :</p>
                                </div>
                                <div class="col-sm-6">
                                    <p style="color: gray;"><?php echo $student["teacher"]["titleTecherTh"].$student["teacher"]["fisrtNameTh"]." ".$student["teacher"]["lastNameTh"] ; ?></p>
                                </div>

                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: blue;">ประเภทหลักสูตร :</p>
                                </div>
                                <div class="col-sm-6">
                                    <p style="color: gray;"><?php echo $student["course"]["nameCourseUse"]." (".$student["course"]["planCourse"].")"?></p>
                                </div>

                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: blue;">ที่อยู่โรงเรียน :</p>
                                </div>
                                <div class="col-sm-6">
                                    <p style="color: gray;">จังหวัด<?php echo $student["school"]["provinceName"] ?></p>
                                </div>

                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: blue;">สถานะ :</p>
                                </div>
                                <div class="col-sm-6">
                                    <p style="color: gray;"><?php echo $student["status"]?></p>
                                </div>

                            </div>
                            <!-- <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: blue;">สิทธิ์สหกิจ :</p>
                                </div>
                                <div class="col-sm-6">
                                    <p style="color: red;">ไม่มีสิทธิ์</p>
                                </div>
                            </div> -->
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: blue;">note :</p>
                                </div>
                                <div class="col-sm-6">
                                    <p style="color: gray;">โรคภูมิแพ้ </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-sm-12 mx-auto" style="margin-left: 20px;">
                            <form action="/action_page.php">
                                <p><label for="note" style="color:#0552d8;">เพิ่ม note:</label></p>
                                <textarea style=" width: 100%;" id="w3review" name="w3review"></textarea>
                                <br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success center-block">บันทึก</button>
                                </div>

                            </form>

                        </div>
                    </div>
                    <br>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">รายงานผลการเรียนแต่ละภาคการศึกษา</h6>
                                </div>
                                <div class="card-body ">
                                    <div class="row" style="padding: 20px;">
                                        <div class="col-sm-6">
                                            <p style="font-weight: bold; font-size: 12px;"><span style="color: red;">
                                                    <svg style="color: #ff6962;" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                        <circle cx="8" cy="8" r="8" />
                                                    </svg> เกรด(0-1.74)</span>
                                                <span style="color: orange;">&nbsp;&nbsp;&nbsp; <svg
                                                        style="color: #f57b39;" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                        <circle cx="8" cy="8" r="8" />
                                                    </svg> เกรด(1.75-1.99)</span>
                                                <span style="color: green;">&nbsp;&nbsp;&nbsp;<svg
                                                        style="color: #99cc99;" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                        <circle cx="8" cy="8" r="8" />
                                                    </svg> เกรด(2.0-3.24)</span>
                                                <span style="color: blue;">&nbsp;&nbsp;&nbsp;<svg
                                                        style="color: #86d3f7;" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                        <circle cx="8" cy="8" r="8" />
                                                    </svg> เกรด(3.25-4.00)</span>
                                            </p>
                                            <canvas id="myChart"></canvas>
                                        </div>
                                        <div class="col-sm-6 float-right">
                                            <div class="table-responsive">
                                                <table class="table table-striped" cellspacing="0"
                                                    style="color: black; font-size: small;">
                                                    <thead>
                                                        <tr>
                                                            <th>ปีการศึกษา</th>
                                                            <th>ภาคการศึกษา</th>
                                                            <th>หน่วยกิต</th>
                                                            <th>ผลการเรียน</th>
                                                            <th>GPA</th>
                                                            <th class="text-center">#</th>
                                                            <th>รายละเอียด</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $i = 0;
                                                    $gpa = 0;
                                                    $gpaNew = 0.00;
                                                    $idterm = 0;
                                                    $check = 0;
                                                    foreach ($student["terms"] as $term) {

                                                        if ($i == 0) {
                                                            $gpa = round($term["gpaAll"], 2);
                                                            $i++;
                                                        } else {
                                                            $gpaNew = round($term["gpaAll"], 2) - $gpa;
                                                            $gpa = round($term["gpaAll"], 2);
                                                        }

                                                        $ch = " ";

                                                        echo "
                                                            <tr>
                                                                <th scope=\"row\">" . $term["semesterYear"] . "</th>
                                                                <td class=\"text-center\">" . $term["semesterPart"] . "</td>
                                                                <td class=\"text-center\">" . $term["creditTerm"] . "</td>
                                                                <td>" . round($term["gpaTerm"], 2) . "</td>
                                                                <td>" . round($term["gpaAll"], 2) . "</td>";

                                                        if (number_format($gpaNew, 2) > 0.00) {
                                                            $color = "color:green";
                                                            $ch = "+";
                                                        } elseif (number_format($gpaNew, 2) < 0.00) {
                                                            $color = "color:red";
                                                            $ch = "";
                                                        } else {
                                                            $color = "color:green";
                                                            $ch = "";
                                                        }

                                                        // $idterms[] = $idterm;
                                                        echo "<td><span style=\"" . $color . "\">[ " . $ch . number_format($gpaNew, 2)." ]</span></td>
                                                                <td class=\"text-center\">
                                                                    <a data-toggle=\"modal\" data-target=\"#modal" . $idterm . "\" >
                                                                        <i class=\"fas fa-search fa-sm\"></i>
                                                                    </a>

                                                                </td>
                                                                
                                                            </tr>";
                                                        $idterm++;
                                                    }

                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">ผลการเรียนในแต่ละหมวดวิชา</h6>
                                </div>
                                <?php

                                    $academics = getAcademicInSubjectCategoryByStudentId($student["studentId"]);

                                    ?>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p style="font-weight: bold; font-size: 12px;"><span style="color: red;">
                                                    <svg style="color: #ff6962;" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                        <circle cx="8" cy="8" r="8" />
                                                    </svg> เกรด(0-1.74)</span>
                                                <span style="color: orange;">&nbsp;&nbsp;&nbsp; <svg
                                                        style="color: #f57b39;" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                        <circle cx="8" cy="8" r="8" />
                                                    </svg> เกรด(1.75-1.99)</span>
                                                <span style="color: green;">&nbsp;&nbsp;&nbsp;<svg
                                                        style="color: #99cc99;" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                        <circle cx="8" cy="8" r="8" />
                                                    </svg> เกรด(2.0-3.24)</span>
                                                <span style="color: blue;">&nbsp;&nbsp;&nbsp;<svg
                                                        style="color: #86d3f7;" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                        <circle cx="8" cy="8" r="8" />
                                                    </svg> เกรด(3.25-4.00)</span>
                                            </p>
                                            <canvas id="myChartSub"></canvas>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="table-responsive">
                                                <table class="table table-striped" width="100%" cellspacing="0"
                                                    style="color: black; font-size: small;">
                                                    <thead>
                                                        <tr>
                                                            <th>หมวดวิชา</th>
                                                            <th style="text-align: right;">
                                                                จำนวนหน่วยกิตที่<span
                                                                    style="color:#428f3e;">เรียนไปแล้ว</span>
                                                            </th>
                                                            <th style="text-align: right; ">
                                                                จำนวนหน่วยกิตที่<span
                                                                    style="color:red;">ยังไม่เรียน</span></th>
                                                            <th style="text-align: right; ">หน่วยกิตทั้งหมด
                                                            </th>
                                                            <th style="text-align: right;">เกรด</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    foreach ($academics as $academic) {
                                                        echo "
                                                            
                                                    <tr>
                                                        <td>".$academic["name"]."</td>
                                                        <td style=\"font-weight: bold; color: green; text-align: right;\">
                                                        ".$academic["credit"]."
                                                        </td>
                                                        <td style=\"font-weight: bold; color: red; text-align: right;\">
                                                        ".$academic["creditYet"]."
                                                        </td>
                                                        <td style=\"font-weight: bold; text-align: right;\">".$academic["creditAll"]."</td>
                                                        <td style=\"font-weight: bold; text-align: right;\">".$academic["grade"]."</td>
                                                        
                                                    </tr>";
                                                    }
                                                    ?>
                                                        <!-- <tr>
                                                            <td>หมวดวิชาศึกษาทั่วไป</td>
                                                            <td
                                                                style="font-weight: bold; color: green; text-align: right;">
                                                                30
                                                            </td>
                                                            <td
                                                                style="font-weight: bold; color: red; text-align: right;">
                                                                0
                                                            </td>
                                                            <td style="font-weight: bold; text-align: right;">30</td>
                                                            <td style="font-weight: bold; text-align: right;">3.13</td>
                                                        </tr>
                                                        <tr>
                                                            <td>หมวดวิชาเสรี</td>
                                                            <td
                                                                style="font-weight: bold; color: green; text-align: right;">
                                                                6
                                                            </td>
                                                            <td
                                                                style="font-weight: bold; color: red; text-align: right;">
                                                                0
                                                            </td>
                                                            <td style="font-weight: bold; text-align: right;">6</td>
                                                            <td style="font-weight: bold; text-align: right;">3.23</td>
                                                        </tr>
                                                        <tr>
                                                            <td>หมวดวิชาเฉพาะบังคับ</td>
                                                            <td
                                                                style="font-weight: bold; color: green; text-align: right;">
                                                                98
                                                            </td>
                                                            <td
                                                                style="font-weight: bold; color: red; text-align: right;">
                                                                6
                                                            </td>
                                                            <td style="font-weight: bold; text-align: right;">
                                                                104
                                                            </td>
                                                            <td style="font-weight: bold; text-align: right;">3.33</td>
                                                        </tr>
                                                        <tr>
                                                            <td>หมวดวิชาเฉพาะเลือก</td>
                                                            <td
                                                                style="font-weight: bold; color: green; text-align: right;">
                                                                98
                                                            </td>
                                                            <td
                                                                style="font-weight: bold; color: red; text-align: right;">
                                                                6
                                                            </td>
                                                            <td style="font-weight: bold; text-align: right;">
                                                                104
                                                            </td>
                                                            <td style="font-weight: bold; text-align: right;">3.38</td>
                                                        </tr>
                                                        <tr>
                                                            <td>หมวดวิชาเสรี</td>
                                                            <td
                                                                style="font-weight: bold; color: green; text-align: right;">
                                                                36
                                                            </td>
                                                            <td
                                                                style="font-weight: bold; color: red; text-align: right;">
                                                                0
                                                            </td>
                                                            <td style="font-weight: bold; text-align: right;">
                                                                36
                                                            </td>
                                                            <td style="font-weight: bold; text-align: right;">3.40</td>
                                                        </tr> -->
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
                    <div style="justify-content: center; align-items: center;">

                        <div class="col-sm-12 mx-auto">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">ผลการเรียนวิชาที่ไม่ผ่านตามแผน</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" cellspacing="0" style="color: black;  ">
                                            <thead style="background-color: #86d3f7;">
                                                <tr>
                                                    <th style=" text-align: center;">ชั้นปี</th>
                                                    <th style=" text-align: center;">ภาคการเรียน</th>
                                                    <th style=" text-align: center;">หมวดวิชา</th>
                                                    <th style=" text-align: center;">รหัสวิชา</th>
                                                    <th style="text-align: left;">ชื่อรายวิชา<span>ยังไม่ผ่าน</span>
                                                    </th>
                                                    <th style="text-align: center;">หน่วยกิต</th>
                                                    <th style="text-align: center;">สถานะ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style=" text-align: center;">2</td>
                                                    <td style=" text-align: center;">ภาคปลาย</td>
                                                    <td style=" text-align: center;">หมวดวิชาเฉพาะบังคับ</td>
                                                    <td style=" text-align: center;">02204172</td>
                                                    <td style=" text-align: left;">
                                                        Practicum in Programming and Problem Solving Skills
                                                    </td>
                                                    <td style=" text-align: center;">1</td>
                                                    <td style=" text-align: center;">W,F</td>

                                                </tr>

                                                <tr>
                                                    <td style=" text-align: center;">2</td>
                                                    <td style=" text-align: center;">ภาคปลาย</td>
                                                    <td style=" text-align: center;">หมวดวิชาเฉพาะบังคับ</td>
                                                    <td style=" text-align: center;">01417168</td>
                                                    <td style=" text-align: left;">
                                                        Engineering Mathematics II
                                                    </td>
                                                    <td style="text-align: center;">
                                                        3
                                                    </td>
                                                    <td style=" text-align: center;">W</td>

                                                </tr>

                                                <tr>
                                                    <td style="background-color: #86d3f7; font-weight: bold; color: black; text-align: center;"
                                                        colspan="4">
                                                        รวม</td>
                                                    <td style=" text-align: center;">2</td>
                                                    <td style="text-align: center;">4</td>
                                                    <td style=" text-align: center;"></td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>

                        </div>
                        <br><br>

                        <div class="col-sm-12 mx-auto">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">ผลการเรียนวิชาที่วิชาตกค้างที่ผ่านแล้ว
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" cellspacing="0" style="color: black;  ">
                                            <thead style="background-color: #86d3f7;">
                                                <tr>
                                                    <th style=" text-align: center;">ชั้นปี</th>
                                                    <th style=" text-align: center;">ภาคการเรียน</th>
                                                    <th style=" text-align: center;">หมวดวิชา</th>
                                                    <th style=" text-align: center;">รหัสวิชา</th>
                                                    <th style="text-align: left;">ชื่อรายวิชา<span>ผ่านแล้ว </span></th>
                                                    <th style="text-align: center;">หน่วยกิต</th>
                                                    <th style="text-align: center;">สถานะ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style=" text-align: center;">2</td>
                                                    <td style=" text-align: center;">ภาคปลาย</td>
                                                    <td style=" text-align: center;">หมวดวิชาเฉพาะบังคับ</td>
                                                    <td style=" text-align: center;">02204172</td>
                                                    <td style=" text-align: left;">
                                                        Practicum in Programming and Problem Solving Skills
                                                    </td>
                                                    <td style=" text-align: center;">1</td>
                                                    <td style=" text-align: center;">W,F,A</td>

                                                </tr>

                                                <tr>
                                                    <td style="background-color: #86d3f7; font-weight: bold; color: black; text-align: center;"
                                                        colspan="4">
                                                        รวม</td>
                                                    <td style=" text-align: center;">1</td>
                                                    <td style="text-align: center;">1</td>
                                                    <td style=" text-align: center;"></td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>

                        </div>
                        <br><br>

                    </div>
                    <!-- /.container-fluid --------------------------------------------------------------------------------------------->

                </div>
                <!-- End of Main Content -->


            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!--modal-->
        <!--modal-->
        <?php
        $i = 0;
        foreach ($student["terms"] as $term) {

            echo "
                            <div id=modal" . $i . " class=\"modal\" style=\"color: black;\">
                                <div class=\"modal-dialog modal-lg\">
                                    <div class=\"modal-content\">";

            echo "<div class=\"modal-header\" style=\"height: 90px;\">
                            <table class=\"modal-dialog modal-lg\" style=\"border:none; width: 85%;\">
                                <th style=\" text-align: left; \">
                                            <h5 style=\"font-weight: bold;\">เกรด" . round($term["gpaTerm"], 2) . "</h5>
                                </th>
                                <th style=\" text-align: right;\">
                                    <h5 style=\"font-weight: bold;\">GPA " . round($term["gpaAll"], 2) . "</h5>
                                </th>
                            </table>
                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                            <br>



                            </div>
                            <h4 class=\"modal-title\" style=\"margin-left: 10px;\">ผลการเรียนของนิสิตในปีการศึกษา " . $term["semesterYear"] . " " . $term["semesterPart"] . "</h4>
                            <div class=\"modal-body\" id=\"std_detail\">
                                <table class=\"table\">

                                    <thead>
                                        <tr>
                                            <th>รายชื่อวิชา</th>
                                            <th>เกรดที่ได้</th>
                                            <th>จำนวนหน่วยกิต</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
            foreach ($term["regisList"] as $regis) {
                echo " 
                                            <tr>
                                                <th>" . $regis["nameSubjectEng"] . "</th>
                                                <th>" . $regis["gradeCharacter"] . "</th>
                                                <th>" . $regis["credit"] . "</th>
                                            </tr>
                                        ";
            }


            echo "</tbody>
                                </table>

                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\"
                                            style=\"font-size: 18px;\">ปิดหน้าต่าง</button>
                                    </div>
                                </div>
                            </div>
                        </div>";


            $i++;
        }
        ?>

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
        <script>

        <?php
        $gp = [];
        $gpAll = [];
        $label = [];
        foreach ($student["terms"] as $term) {

            $floatvar = (float) round($term["gpaTerm"], 2);
            $gp[] = $floatvar;

            $floatvarAll = (float) round($term["gpaAll"], 2);
            $gpAll[] = $floatvarAll;

            $label[] = $term["semesterPart"] . " " . $term["semesterYear"];
        }
        ?>
        var gs = <?php echo json_encode($gp); ?>;
        console.log(gs);

        var gsAll = <?php echo json_encode($gpAll); ?>;
        console.log(gsAll);

        const GPA2563 = gs;
        const GPAAll = gsAll;
        const labeljs = <?php echo json_encode($label); ?>;

        const GPAcolorbar = [];
        let GPAsize = GPA2563.length;
        let GPAcolorLoop;

        for (let i = 0; i < GPAsize; i++) {
            if (GPA2563[i] >= 0.0000 && GPA2563[i] <= 1.7499) {
                GPAcolorLoop = '#ff6962';
            }
            else if (GPA2563[i] >= 1.7500 && GPA2563[i] <= 1.9999) {
                GPAcolorLoop = '#f57b39';
            }
            else if (GPA2563[i] >= 2.0000 && GPA2563[i] <= 3.2499) {
                GPAcolorLoop = '#99cc99';
            }
            else if (GPA2563[i] >= 3.2500) {
                GPAcolorLoop = '#86d3f7';
            }
            GPAcolorbar[i] = GPAcolorLoop;
        }
        console.log(GPAcolorbar);


        var ctx = document.getElementById("myChart");

        var myChart = new Chart(ctx, {
            //type: 'bar',
            //type: 'line',
            type: 'bar',
            data: {
                labels: labeljs,
                datasets: [{
                    type: 'line',
                    data: GPAAll,
                    borderColor: 'rgb(0, 107, 201)',
                    lineTension: 0,
                    fill: false
                },
                {
                    data: GPA2563,
                    backgroundColor: GPAcolorbar,
                    borderWidth: 0
                },

                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            max: 4,
                            min: 0
                        }
                    }]
                },
                legend: {
                    display: false
                },
                responsive: true,

            }
        });
        </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
            <script>

            <?php
                $academicGrades=[];
                $academicLabel=[];
                foreach ($academics as $academic) {
                    $academicGrades[] = (float)$academic["grade"];
                    $academicLabel[] = $academic["name"];

                }
            
            ?>
            
            var grades = <?php echo json_encode($academicGrades)?>;
            console.log(grades);
            var academicLabels = <?php echo json_encode($academicLabel)?>;
            console.log(academicLabels);

            var ctx = document.getElementById("myChartSub");
            const GPASub = grades;
            const GPASubcolorbar = [];
            let GPASubsize = GPASub.length;
            let GPASubcolorLoop;
            for (let i = 0; i < GPASubsize; i++) {
                if (GPASub[i] >= 0.0000 && GPASub[i] <= 1.7499) {
                    GPASubcolorLoop = 'rgba(255, 105, 98,0.8)';
                }
                else if (GPASub[i] >= 1.7500 && GPASub[i] <= 1.9999) {
                    GPASubcolorLoop = 'rgba(245, 123, 57,0.8)';
                }
                else if (GPASub[i] >= 2.0000 && GPASub[i] <= 3.2499) {
                    GPASubcolorLoop = 'rgba(153, 204, 153,0.8)';
                }
                else if (GPASub[i] >= 3.2500) {
                    GPASubcolorLoop = 'rgba(134, 188, 247,0.8)';
                }
                GPASubcolorbar[i] = GPASubcolorLoop;
            }
            var myChart = new Chart(ctx, {
                //type: 'bar',
                //type: 'line',

                type: 'bar',
                data: {
                    labels: academicLabels,
                    datasets: [{
                        data: GPASub,
                        backgroundColor: GPASubcolorbar,
                        borderWidth: 0,

                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                max: 4,
                                min: 0
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
                    responsive: true,

                }


            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const GPAC = 3.13;
            let GPACcolorbar = '';
            let GPACcolor = 'rgba(211,211,211,0.8)';
            if (GPAC >= 0.0000 && GPAC <= 1.7499) {
                GPACcolorbar = 'rgba(255, 105, 98,0.8)';
            }
            else if (GPAC >= 1.7500 && GPAC <= 1.9999) {
                GPACcolorbar = 'rgba(245, 123, 57,0.8)';
            }
            else if (GPAC >= 2.0000 && GPAC <= 3.2499) {
                GPACcolorbar = 'rgba(153, 204, 153,0.8)';

            }
            else if (GPAC >= 3.2500) {
                GPACcolorbar = 'rgba(134, 188, 247,0.8)';
            }

            // ข้อมูลสำหรับ Donut Chart
            var data = {
                datasets: [{
                    data: [100, 100 - 100],
                    backgroundColor: [GPACcolorbar, GPACcolor]
                }]
            };
            var data2 = {
                datasets: [{
                    data: [80, 100 - 80],
                    backgroundColor: [GPACcolorbar, GPACcolor]
                }]
            };
            var data3 = {
                datasets: [{
                    data: [90, 100 - 90],
                    backgroundColor: [GPACcolorbar, GPACcolor]
                }]
            };
            var data4 = {
                datasets: [{
                    data: [90, 100 - 90],
                    backgroundColor: [GPACcolorbar, GPACcolor]
                }]
            };
            var data5 = {
                datasets: [{
                    data: [100, 100 - 100],
                    backgroundColor: [GPACcolorbar, GPACcolor]
                }]
            };

            // สร้าง Donut Chart
            var ctx = document.getElementById("donutChart");
            var donutChart = new Chart(ctx, {
                type: "doughnut",
                data: data,
                options: {
                    cutoutPercentage: 70,  // กำหนดค่านี้เพื่อสร้าง Donut Chart
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
            var ctx = document.getElementById("donutChart2");
            var donutChart2 = new Chart(ctx, {
                type: "doughnut",
                data: data2,
                options: {
                    cutoutPercentage: 70,  // กำหนดค่านี้เพื่อสร้าง Donut Chart
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
            var ctx = document.getElementById("donutChart3");
            var donutChart3 = new Chart(ctx, {
                type: "doughnut",
                data: data3,
                options: {
                    cutoutPercentage: 70,  // กำหนดค่านี้เพื่อสร้าง Donut Chart
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
            var ctx = document.getElementById("donutChart4");
            var donutChart4 = new Chart(ctx, {
                type: "doughnut",
                data: data4,
                options: {
                    cutoutPercentage: 70,  // กำหนดค่านี้เพื่อสร้าง Donut Chart
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
            var ctx = document.getElementById("donutChart5");
            var donutChart5 = new Chart(ctx, {
                type: "doughnut",
                data: data5,
                options: {
                    cutoutPercentage: 70,  // กำหนดค่านี้เพื่อสร้าง Donut Chart
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

        </script>

</body>

</html>

