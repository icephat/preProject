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
                $courses = getCourseNameByDepartmentId($teacher["departmentId"]) ;

                $course = getCourseByCourseName($_POST["courseName"]);
                $generetion = $_POST["generetion"];
                $generetions = getGeneretionInCourseByCouseName($course["nameCourseUse"]);

                ?>

                <?php include('../layout/head/report.php'); ?>

                <div>
                    <form class="form-valide" action="../controller/headSearchCourseTcasGeneretion.php" method="post" enctype="multipart/form-data">
                        <div class="row mx-auto">
                            <div class="column col-sm-4">
                                <div class="text-center">
                                    <h5>ภาควิชา<span style="color: red;">*</span></th>
                                </div>
                                <div class="text-center">
                                    <div>
                                    <select class="form-control" data-live-search="true" name = "courseName">
                                            
                                        <?php
                                            foreach($courses as $cou){
                                            ?>
                                             <option value="<?php echo  $cou["nameCourseUse"]?>"><?php echo  $cou["nameCourseUse"]?>
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
                                    <h5>รุ่น<span style="color: red;">*</span></th>
                                </div>
                                <div class="text-center">
                                    <div>
                                    <select class="form-control" data-live-search="true" name = "generetion">
                                        <option value="0">ทุกรุ่น</option>
                                        <?php
                                            foreach($generetions as $gen){
                                            ?>
                                             <option value="<?php echo  $gen["studyGeneretion"]?>"><?php echo  $gen["studyGeneretion"]?>
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
                <div class="row">
                <h5 style="color: black;">หลักสูตร <?php echo $course["nameCourseUse"]?> รุ่น <?php echo $generetion ?></h5>
                    <div class="col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">จำนวนนิสิตตาม Tcas (คน)</h6>
                            </div>
                            <?php
                                $countStudentSortByGeneretions = getCountStudentTcasSortByTcasRoundByCourseNameAndGeneretion($course["nameCourseUse"],$generetion);
                               // print_r($countStudentSortByGeneretions);
                                
                            ?>
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
                                                        <th style=" text-align: center; ">รอบที่</th>
                                                        <th style="text-align: center; "><span>รุ่น <?php echo $generetion ?></span>
                                                        </th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $studyGeneretion=[];
                                                    $TCAS1=[];
                                                    $TCAS2=[];
                                                    $TCAS3=[];
                                                    $TCAS4=[];
                                                    $sumTcas1 = 0;
                                                    $label=$generetion;

                                                    foreach ($countStudentSortByGeneretions as $countStudentSortByGeneretion) {
                                                        $studyGeneretion[]="รอบ ".(string)$countStudentSortByGeneretion["tcasRound"];
                                                        $TCAS1[]=(int)$countStudentSortByGeneretion["generetion1"];
                                                        
                                                        $sumTcas1 += $countStudentSortByGeneretion["generetion1"];
                                                       
                                                        ?>
                                                        <tr>
                                                            <td style=" text-align: center;">
                                                                <?php echo $countStudentSortByGeneretion["tcasRound"] ?>
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                <?php echo $countStudentSortByGeneretion["generetion1"] ?> คน
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
                                $gpaMMAs = getMaxMinAvgGPAXByCourseNameAndGeneretion($course["nameCourseUse"],$generetion);
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
                                                    $studyGeneretionGrade=[];
                                                    $maxGPAX=[];
                                                    $minGPAX=[];
                                                    $avgGPAX=[];
                                                    $gpax=[];


                                                    foreach($gpaMMAs as $gpaMMA){

                                                        $studyGeneretionGrade[]="รอบ ".(string)$gpaMMA["tcasRound"];
                                                        $maxGPAX[]=(float)$gpaMMA["maxGPAX"];
                                                        $minGPAX[]=(float)$gpaMMA["minGPAX"];
                                                        $avgGPAX[]=(float)$gpaMMA["avgGPAX"];
                                                        $gpax[]=(float)$gpaMMA["maxGPAX"];
                                                        $gpax[]=(float)$gpaMMA["minGPAX"];
                                                        $gpax[]=(float)$gpaMMA["avgGPAX"];
                                                    ?>
                                                    <tr style="font-weight: normal;">
                                                        <td style=" text-align: center;"><?php echo $gpaMMA["tcasRound"]?></td>
                                                        <td style=" text-align: center;">
                                                        <?php echo $gpaMMA["maxGPAX"]?>
                                                        </td>
                                                        <td style=" text-align: center;">
                                                        <?php echo $gpaMMA["minGPAX"]?>
                                                        </td>
                                                        <td style=" text-align: center;"><?php echo $gpaMMA["avgGPAX"]?> </td>
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
                                $percentageGeneretions = getPercentageStudySortByTcasRoundByCourseNameAnGeereiond($course["nameCourseUse"],$generetion);
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
                                                        <th style="text-align: center; "><span>จำนวรับเข้า</span>
                                                        </th>
                                                        <th style="text-align: center;"><span>จำนวคงอยู่</span></th>
                                                        <th style="text-align: center;">ร้อยละ</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $studyGeneretionPercent=[];
                                                    $entry=[];
                                                    $study=[];
                                                    foreach($percentageGeneretions as $percentageGeneretion){
                                                        if((string)$percentageGeneretion["tcasRound"]!=null){
                                                            $studyGeneretionPercent[]= "รอบ ".(string)$percentageGeneretion["tcasRound"];
                                                        
                                                        }
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
                            $percentageRetireGeneretions = getPercentageStudyAndRetireSortByTcasRoundByCourseNameAndGeneretion($course["nameCourseUse"],$generetion);
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
                                                        <th style="text-align: center;"><span>จำนวพ้นสภาพ</span></th>
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
                                                        if((string)$percentageRetireGeneretion["tcasRound"]){
                                                            $studyGeneretionPercent2[]="รอบ ".(string)$percentageRetireGeneretion["tcasRound"];
                                                        
                                                        }
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
                                                            <td style=" text-align: center;"><?php echo $percentageRetireGeneretion["percentage"] ?></td>
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
                    
                    var tcas1 = <?php echo json_encode($TCAS1); ?>;
                    var label = <?php echo json_encode($label); ?>;

                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: studyGeneretions,
                            datasets: [{
                                label: 'รุ่น '+label,
                                data: tcas1,
                                backgroundColor: 'rgb(98,87,87)',
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
                                label: 'จำนวนคงเหลือ',
                                data: study,
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
                                label: 'จำนวนพ้นสภาพ',
                                data: retire2,
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
                                    max: 100,
                                    min: 0
                                }
                            }]

                        }
                    });
                </script>



</body>

</html>