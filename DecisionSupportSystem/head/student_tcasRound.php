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
                $department  = getDepartmentById($teacher["departmentId"]);

                $generetions =getGeneretionInCourseByDepartmentId($department["departmentId"]);

                

                ?>

                <?php include('../layout/head/report.php'); ?>

                <div>
                    <form class="form-valide" action="../controller/headSearchDepartmentTcasRound.php" method="post" enctype="multipart/form-data">
                        <div class="row mx-auto">
                            <div class="column col-sm-4">

                                <div class="text-center">
                                    <h5>ภาควิชา<span style="color: red;">*</span></th>
                                </div>
                                <div class="text-center">
                                    <div>
                                    <select class="form-control" data-live-search="true" name="departmentId">

                                                <?php
                                                foreach ($departments as $dept) {
                                                    ?>

                                                    <option value="<?php echo $dept["departmentId"] ?>">
                                                        <?php echo $dept["departmentName"] ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="column col-sm-4">

                                <div class="text-center">
                                    <h5>รุ่น<span style="color: red;">*</span></th>
                                </div>
                                <div class="text-center">
                                    <div>
                                        <select class="form-control" data-live-search="true" name = "generetion">
                                            
                                            <option value="0">ทุกรุ่น
                                            </option>
                                            <?php
                                                foreach ($generetions as $gen) {
                                                    ?>

                                                    <option value="<?php echo $gen["studyGeneretion"] ?>">รุ่นที่
                                                        <?php echo $gen["studyGeneretion"] ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="column col-sm-4">
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
                <h5 style="color:black;">ภาควิชา<?php echo $department["departmentName"] ?></h5>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">จำนวนนิสิตตาม Tcas (คน)</h6>
                                <?php
                                $countStudentSortByGeneretions = getCountStudentTcasSortByTcasRoundByDepartmentId($department["departmentId"]);
                                // print_r($countStudentSortByGeneretions);
                                
                                ?>
                            </div>
                            <div class="card-body ">
                                <div class="row" style="padding: 20px;">
                                    <div class="col-sm-6">

                                        <canvas id="myChart"></canvas>
                                    </div>
                                    <div class="col-sm-6 float-right">
                                        <div class="table-responsive">
                                            <table class="table table-striped" cellspacing="0" style="color: black;">
                                                <thead style=" ">
                                                    <tr>
                                                        <th style=" text-align: center; ">รอบ</th>
                                                        <?php
                                                        $semesterYear= getSemesterPresent()["semesterYear"];
                                                        $labels=[];
                                                        for($i=$semesterYear-4-2500;$i<$semesterYear+1-2500;$i++){
                                                            $labels[]="รุ่น ".$i;
                                                        
                                                        ?>
                                                        <th style="text-align: center; "><span><?php echo $i ?></span>
                                                        </th>
                                                        <?php
                                                        }
                                                        ?>
                                                        <!-- <th style="text-align: center;"><span>รุ่น 64</span></th>
                                                        <th style="text-align: center;">รุ่น 65</th>
                                                        <th style="text-align: center;">รุ่น 66</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $studyGeneretion = [];
                                                    $TCAS1=[];
                                                    $TCAS2=[];
                                                    $TCAS3=[];
                                                    $TCAS4=[];
                                                    $TCAS5=[];
                                                    $sumTcas1 = 0;
                                                    $sumTcas2 = 0;
                                                    $sumTcas3 = 0;
                                                    $sumTcas4 = 0;
                                                    $sumTcas5 = 0;

                                                    foreach ($countStudentSortByGeneretions as $countStudentSortByGeneretion) {
                                                        $studyGeneretion[] = "รอบ " . (string) $countStudentSortByGeneretion["tcasRound"];
                                                        $TCAS1[] = (int) $countStudentSortByGeneretion["generetion1"];
                                                        $TCAS2[] = (int) $countStudentSortByGeneretion["generetion2"];
                                                        $TCAS3[] = (int) $countStudentSortByGeneretion["generetion3"];
                                                        $TCAS4[] = (int) $countStudentSortByGeneretion["generetion4"];
                                                        $TCAS5[] = (int) $countStudentSortByGeneretion["generetion5"];
                                                        $sumTcas1 += $countStudentSortByGeneretion["generetion1"];
                                                        $sumTcas2 += $countStudentSortByGeneretion["generetion2"];
                                                        $sumTcas3 += $countStudentSortByGeneretion["generetion3"];
                                                        $sumTcas4 += $countStudentSortByGeneretion["generetion4"];
                                                        $sumTcas5 += $countStudentSortByGeneretion["generetion5"];
                                                        ?>
                                                        <tr>
                                                            <td style=" text-align: center;">
                                                                <?php echo $countStudentSortByGeneretion["tcasRound"] ?>
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                <?php echo $countStudentSortByGeneretion["generetion1"] ?> คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                <?php echo $countStudentSortByGeneretion["generetion2"] ?> คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                <?php echo $countStudentSortByGeneretion["generetion3"] ?> คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                <?php echo $countStudentSortByGeneretion["generetion4"] ?> คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                <?php echo $countStudentSortByGeneretion["generetion5"] ?> คน
                                                            </td>
                                                        </tr>

                                                        <?php
                                                    }
                                                    ?>
                                                    <tr>
                                                        <th scope='row' style=" text-align: center; ">ทุกรอบ</th>
                                                        <td style="font-weight: bold; text-align: center;">
                                                            <?php echo $sumTcas1 ?> คน
                                                        </td>
                                                        <td style='font-weight: bold; text-align: center;'>
                                                            <?php echo $sumTcas2 ?> คน
                                                        </td>
                                                        <td style='font-weight: bold; text-align: center;'>
                                                            <?php echo $sumTcas3 ?> คน
                                                        </td>
                                                        <td style='font-weight: bold; text-align: center;'>
                                                            <?php echo $sumTcas4 ?> คน
                                                        </td>
                                                        <td style='font-weight: bold; text-align: center;'>
                                                            <?php echo $sumTcas5 ?> คน
                                                        </td>
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
                                <h6 class="m-0 font-weight-bold text-primary">ผลการเรียนนิสิต</h6>
                            </div>
                            <?php
                            $gpaMMAs = getMaxMinAvgGPAXSortByRoundByDepartmentId($department["departmentId"]);
                            //print_r($gpaMMAs);
                            ?>
                            <div class="card-body ">
                                <div class="row" style="padding: 20px;">
                                    <div class="col-sm-6">

                                        <div id="grade"></div>
                                    </div>
                                    <div class="col-sm-6 mx-auto">
                                        <div class="table-responsive">
                                            <table class="table table-striped" cellspacing="0" style="color: black;">
                                                <thead style=" ">
                                                    <tr>
                                                        <th style=" text-align: center; "><span>รอบ</span></th>
                                                        <th style="text-align: center; "><span>ค่าสูงสุด</span>
                                                        </th>
                                                        <th style="text-align: center;"><span>ค่าต่ำสุด</span></th>
                                                        <th style="text-align: center;"><span>ค่าเฉลี่ย</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $studyGeneretionGrade = [];
                                                    $maxGPAX = [];
                                                    $minGPAX = [];
                                                    $avgGPAX = [];
                                                    $gpax = [];


                                                    foreach ($gpaMMAs as $gpaMMA) {

                                                        $studyGeneretionGrade[] = "รอบ " . (string) $gpaMMA["tcasRound"];
                                                        $maxGPAX[] = (float) $gpaMMA["maxGPAX"];
                                                        $minGPAX[] = (float) $gpaMMA["minGPAX"];
                                                        $avgGPAX[] = (float) $gpaMMA["avgGPAX"];
                                                        $gpax[] = (float) $gpaMMA["maxGPAX"];
                                                        $gpax[] = (float) $gpaMMA["minGPAX"];
                                                        $gpax[] = (float) $gpaMMA["avgGPAX"];
                                                        ?>
                                                        <tr style="font-weight: normal;">
                                                            <td style=" text-align: center;">
                                                                <?php echo $gpaMMA["tcasRound"] ?>
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                <?php echo $gpaMMA["maxGPAX"] ?>
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                <?php echo $gpaMMA["minGPAX"] ?>
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                <?php echo $gpaMMA["avgGPAX"] ?>
                                                            </td>
                                                        </tr>

                                                        <?php
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
                <br><br>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">อัตราคงอยู่ </h6>
                            </div>
                            <?php
                                $percentageGeneretions = getPercentageStudySortByTcasRoundByDepartmentId($department["departmentId"]);
                                //print_r($percentageGeneretions);
                            ?>
                            <div class="card-body ">
                                <div class="row" style="padding: 20px;">
                                    <div class="col-sm-6">

                                        <canvas id="percent"></canvas>
                                    </div>
                                    <div class="col-sm-6 float-right">
                                        <div class="table-responsive">
                                            <table class="table table-striped" cellspacing="0" style="color: black;">
                                                <thead style=" ">
                                                    <tr>
                                                        <th style=" text-align: center; ">รอบ</th>
                                                        <th style="text-align: center; "><span>จำนวนรับเข้า</span>
                                                        </th>
                                                        <th style="text-align: center;"><span>จำนวนคงอยู่</span></th>
                                                        <th style="text-align: center;">ร้อยละ</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $studyGeneretionPercent=[];
                                                    $entry=[];
                                                    $study=[];
                                                    foreach($percentageGeneretions as $percentageGeneretion){

                                                        $studyGeneretionPercent[]= "รอบ ".(string)$percentageGeneretion["tcasRound"];
                                                        $study[]=(int)$percentageGeneretion["study"];
                                                        $entry[]=(int)$percentageGeneretion["entry"];
                                                    ?>
                                                    <tr>
                                                        <th style=" text-align: center;  "><?php echo $percentageGeneretion["tcasRound"]  ?></th>
                                                        <td style=" text-align: center;">
                                                        <?php echo $percentageGeneretion["entry"]  ?> คน
                                                        </td>
                                                        <td style=" text-align: center;">
                                                        <?php echo $percentageGeneretion["study"]  ?> คน
                                                        </td>
                                                        <td style=" text-align: center;"><?php echo $percentageGeneretion["percentage"]  ?></td>

                                                    </tr>
                                                    <?php
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
                <br><br>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">อัตราพ้นสภาพ </h6>
                            </div>
                            <?php
                            $percentageRetireGeneretions = getPercentageStudyAndRetireSortByRoundByDepartmentId($department["departmentId"]);
                            //print_r( $percentageRetireGeneretions);
                            ?>
                            <div class="card-body ">
                                <div class="row" style="padding: 20px;">
                                    <div class="col-sm-6">

                                        <canvas id="percent2"></canvas>
                                    </div>
                                    <div class="col-sm-6 float-right">
                                        <div class="table-responsive">
                                            <table class="table table-striped" cellspacing="0" style="color: black;">
                                                <thead style=" ">
                                                    <tr>
                                                        <th style=" text-align: center; ">รอบ</th>
                                                        <th style="text-align: center; "><span>จำนวนคงเหลือ</span></th>
                                                        <th style="text-align: center;"><span>จำนวนพ้นสภาพ</span></th>
                                                        <th style="text-align: center;">ร้อยละ</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $studyGeneretionPercent2=[];
                                                    $study2=[];
                                                    $retire2=[];
                                                    $percentage2=[];
                                                    foreach($percentageRetireGeneretions as $percentageRetireGeneretion){
                                                        $studyGeneretionPercent2[]="รอบ ".(string)$percentageRetireGeneretion["tcasRound"];
                                                        $study2[]=(int)$percentageRetireGeneretion["study"];
                                                        $retire2[]=(int)$percentageRetireGeneretion["retire"];
                                                        $percentage2[]=(int)$percentageRetireGeneretion["percentage"];
                                                    ?>
                                                    <tr>
                                                        
                                                        <td style=" text-align: center;">
                                                            <?php echo $percentageRetireGeneretion["tcasRound"] ?>
                                                        </td>
                                                        <td style=" text-align: center;"><?php echo $percentageRetireGeneretion["study"] ?> คน</td>
                                                        <td style=" text-align: center;"><?php echo $percentageRetireGeneretion["retire"] ?> คน</td>
                                                        <?php if((string)$percentageRetireGeneretion["tcasRound"] !=null){?>
                                                            <td style=" text-align: center;"><?php echo ((int)$percentageRetireGeneretion["retire"]/(int)$percentageRetireGeneretion["study"])*100 ?></td>
                                                        <?php }else{?>
                                                            <td style=" text-align: center;"></td>
                                                        <?php }?>
                                                    </tr>
                                                    <?php
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
                    
                    var gen1 = <?php echo json_encode($TCAS1); ?>;
                    var gen2 = <?php echo json_encode($TCAS2); ?>;
                    var gen3 = <?php echo json_encode($TCAS3); ?>;
                    var gen4 = <?php echo json_encode($TCAS4); ?>; 
                    var gen5 = <?php echo json_encode($TCAS5); ?>;  

                    var labels = <?php echo json_encode($labels); ?>;
                  

                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: studyGeneretions,
                            datasets: [{
                                label: labels[0],
                                data: gen1,
                                backgroundColor: '#bfd575',
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
                                label: labels[1],
                                data: gen2,
                                backgroundColor: '#a4ebf3',
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
                                label: labels[2],
                                data: gen3,
                                backgroundColor: '#abbdee',
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
                                label: labels[3],
                                data: gen4,
                                backgroundColor: '#f8c769',
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
                                label: labels[4],
                                data: gen5,
                                backgroundColor: '#ffa778',
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
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
                <script src="https://cdn.plot.ly/plotly-2.27.0.min.js"></script>
                <script>
                    var studyGeneretionGrade = <?php echo json_encode($studyGeneretionGrade); ?>;
                        
                    var maxGPAX = <?php echo json_encode($maxGPAX); ?>;
                    var minGPAX = <?php echo json_encode($minGPAX); ?>;
                    var avgGPAX = <?php echo json_encode($avgGPAX); ?>;
                        

                    var ctx = document.getElementById("grade");
                    var data = [];
    
                    for (var i = 0; i < studyGeneretionGrade.length; i++) {
                        var generationData = {
                            y: [maxGPAX[i], avgGPAX[i], minGPAX[i]],
                            type: 'box',
                            name: studyGeneretionGrade[i]
                        };
                        data.push(generationData);
                    }
    
                    Plotly.newPlot('grade', data);
                    /*var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        
                        type: 'bar',
                        data: {
                            labels: ['รุ่น 60', 'รุ่น 61', 'รุ่น 62', 'รุ่น 63', 'รุ่น 64'],
                            datasets: [{
                                label: 'max',
                                data: [3.40, 3.50, 3.43, 3.53, 3.44],
                                backgroundColor: '#bfd575',
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
                                label: 'min',
                                data: [2.00, 1.50, 1.43, 1.53, 1.44],
                                backgroundColor: '#a4ebf3',
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
                                label: 'avg',
                                data: [2.70, 2.50, 2.43, 2.53, 2.44],
                                backgroundColor: '#abbdee',
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
        
                            responsive: true,
        
                        }
                    });*/
                </script>

                <script>
                    var studyGeneretionPercent = <?php echo json_encode($studyGeneretionPercent); ?>;
                    var entry = <?php echo json_encode($entry); ?>;
                    var study = <?php echo json_encode($study); ?>;

                    var ctx = document.getElementById("percent");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: studyGeneretionPercent,
                            datasets: [{
                                label: 'จำนวนรับเข้า',
                                data: entry,
                                backgroundColor: '#bfd575',
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
                                label: 'จำนวนคงเหลือ',
                                data: study,
                                backgroundColor: '#a4ebf3',
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

                            ]

                        },

                        options: {

                            responsive: true,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                    }]
                            }

                        }
                    });
                </script>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js">
                </script>
                <script>
                    var studyGeneretionPercent2 = <?php echo json_encode($studyGeneretionPercent2); ?>;
                    var study2 = <?php echo json_encode($study2); ?>;
                    var retire2 = <?php echo json_encode($retire2); ?>;
                    var percentage2 = <?php echo json_encode($percentage2); ?>;
                    var ctx = document.getElementById("percent2");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: studyGeneretionPercent2,
                            datasets: [{
                                label: 'จำนวนคงอยู่',
                                data: study2,
                                backgroundColor: '#bfd575',
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
                                label: 'จำนวนพ้นสภาพ',
                                data: retire2,
                                backgroundColor: '#a4ebf3',
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
                            },
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    
                                    min: 0
                                }
                            }]

                        }
                    });
                </script>



</body>

</html>