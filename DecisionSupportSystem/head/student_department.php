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

                <?php include('../layout/head/report.php'); ?>

                    <div>
                        <form>
                            <div class="row mx-auto">
                            <div class="column col-sm-4">
                                    <div class="text-center">
                                        <h5>ภาควิชา<span style="color: red;">*</span></th>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <select class="form-control" data-live-search="true">
                                                <option value="default">--กรุณาเลือกภาควิชา--</option>

                                                <option value="2561">วิศวกรรมคอมพิวเตอร์
                                                </option>
                                                <option value="2562">วิศวกรรมเครื่องกล</option>
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
                                            <select class="form-control" data-live-search="true">
                                                <option value="default">--กรุณาเลือกปีการศึกษา--</option>

                                                <option value="2561">2561
                                                </option>
                                                <option value="2562">2562</option>
                                                <option value="2561">2563
                                                </option>
                                                <option value="2562">2564</option>
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
                        <div class="col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card-body ">
                                    <div class="row" style="padding: 20px;">
                                        <div class="col-sm-6">

                                            <canvas id="myChart"></canvas>
                                        </div>
                                        <div class="col-sm-6 float-right">
                                            <div class="table-responsive">
                                                <table class="table table-striped" cellspacing="0"
                                                    style="color: black; ">
                                                    <thead >
                                                        <tr>
                                                            <th style=" text-align: right; ">รุ่น</th>
                                                            <th style="text-align: right; width: 150px;">
                                                                <span>แรกเข้า</span>
                                                            </th>
                                                            <th style="text-align: right;"><span>พ้นการศึกษา</span></th>
                                                            <th style="text-align: right;"><span>กำลังศึกษา</span></th>
                                                            <th style="text-align: right;">จบการศึกษา</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" text-align: right;">65</td>
                                                            <td style=" text-align: right;">
                                                                60 คน
                                                            </td>
                                                            <td style=" text-align: right;">
                                                                10 คน
                                                            </td>
                                                            <td style=" text-align: right;">
                                                                50 คน
                                                            </td>
                                                            <td style=" text-align: right;">0 คน</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: right;">66</td>
                                                            <td style=" text-align: right;">
                                                                60 คน
                                                            </td>
                                                            <td style=" text-align: right;">
                                                                0 คน
                                                            </td>
                                                            <td style=" text-align: right;">
                                                                60 คน
                                                            </td>
                                                            <td style=" text-align: right;">0 คน</td>
                                                        </tr>

                                                        <tr>
                                                            <th scope='row'
                                                                style=" text-align: right; ">
                                                                ทุกรุ่น</th>
                                                            <td style="font-weight: bold; text-align: right;">120 คน</td>
                                                            <td style="font-weight: bold; text-align: right;">10 คน</td>
                                                            <td style='font-weight: bold; text-align: right;'>110 คน</td>
                                                            <td style='font-weight: bold; text-align: right;'>0 คน</td>
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

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card-body ">
                                    <div class="row" style="padding: 20px;">
                                        <div class="col-sm-6">

                                            <canvas id="myCharts"></canvas>
                                        </div>
                                        <div class="col-sm-6 float-right">
                                            <div class="table-responsive">
                                                <table class="table table-striped" cellspacing="0"
                                                    style="color: black;">
                                                    <thead style=" ">
                                                        <tr>
                                                            <th style=" text-align: center; ">ปีการศึกษา</th>
                                                            <th style="text-align: center; width: 150px;">
                                                                <span>รวมแรกเข้า</span>
                                                            </th>
                                                            <th style="text-align: center;"><span>พ้นการศึกษา</span>
                                                            </th>
                                                            <th style="text-align: center;"><span>กำลังศึกษา</span></th>
                                                            <th style="text-align: center;">จบการศึกษา</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" text-align: center;">2565</td>
                                                            <td style=" text-align: center;">
                                                                60 คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                0 คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                50 คน
                                                            </td>
                                                            <td style=" text-align: center;">0 คน</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2566</td>
                                                            <td style=" text-align: center;">
                                                                60 คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                10 คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                110 คน
                                                            </td>
                                                            <td style=" text-align: center;">0 คน</td>
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">นิสิตคงเหลือ (กำลังศึกษา)</h6>
                                </div>
                                <div class="card-body ">
                                    <div class="row" style="padding: 20px;">
                                        <div class="col-sm-12 mx-auto float-right">
                                            <div class="table-responsive">
                                                <table class="table table-striped" cellspacing="0"
                                                    style="color: black;">
                                                    <thead style=" ">
                                                        <tr>
                                                            <th rowspan="2" style=" text-align: center; width: 100px;">
                                                                รุ่น</th>
                                                            <th colspan="8" style=" text-align: center; width: 100px;">
                                                                ปีการศึกษา</th>
                                                            <th rowspan="2" style=" text-align: center;">คงเหลือ(คน)
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;">2565</td>
                                                            <td style=" text-align: center;">2566</td>
                                                            <td style=" text-align: center;">2567</td>
                                                            <td style=" text-align: center;">2568</td>
                                                            <td style=" text-align: center;">2569</td>
                                                            <td style=" text-align: center;">2570</td>
                                                            <td style=" text-align: center;">2571</td>
                                                            <td style=" text-align: center;">2572</td>

                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2565</td>
                                                            <td style=" text-align: center;">
                                                                60 คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                50 คน
                                                            </td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center; font-weight: bold;">50</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2566</td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;">
                                                                60 คน
                                                            </td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center; font-weight: bold;">60 </td>
                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2567</td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style="text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style="text-align: center; font-weight: bold;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2568</td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center; font-weight: bold;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2569</td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center; font-weight: bold;"></td>
                                                        </tr>

                                                        <tr>
                                                            <th scope='row'
                                                                style=" text-align: center;  ">
                                                                ทุกรุ่น</th>
                                                            <td style="font-weight: bold; text-align: center;">60 คน</td>
                                                            <td style="font-weight: bold; text-align: center;">110 คน</td>
                                                            <td style='font-weight: bold; text-align: center;'></td>
                                                            <td style='font-weight: bold; text-align: center;'></td>
                                                            <td style='font-weight: bold; text-align: center;'></td>
                                                            <td style=" font-weight: bold; text-align: center;"></td>
                                                            <td style=" font-weight: bold; text-align: center;"></td>
                                                            <td style=" font-weight: bold; text-align: center;"></td>
                                                            <td style='font-weight: bold; text-align: center;'></td>
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">นิสิตพ้นสภาพ</h6>
                                </div>
                                <div class="card-body ">
                                    <div class="row" style="padding: 20px;">
                                        <div class="col-sm-12 mx-auto float-right">
                                            <div class="table-responsive">
                                                <table class="table table-striped" cellspacing="0"
                                                    style="color: black;">
                                                    <thead style=" ">
                                                        <tr>
                                                            <th rowspan="2" style=" text-align: center; width: 100px;">
                                                                รุ่น</th>
                                                            <th colspan="8" style=" text-align: center; width: 100px;">
                                                                ปีการศึกษา</th>
                                                            <th rowspan="2" style=" text-align: center;">รวม(คน)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;">2565</td>
                                                            <td style=" text-align: center;">2566</td>
                                                            <td style=" text-align: center;">2567</td>
                                                            <td style=" text-align: center;">2568</td>
                                                            <td style=" text-align: center;">2569</td>
                                                            <td style=" text-align: center;">2570</td>
                                                            <td style=" text-align: center;">2571</td>
                                                            <td style=" text-align: center;">2572</td>

                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2565</td>
                                                            <td style=" text-align: center;">0 คน</td>
                                                            <td style=" text-align: center;">
                                                                10 คน
                                                            </td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center; font-weight: bold;">10</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2566</td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;">
                                                                0 คน
                                                            </td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center; font-weight: bold;">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2567</td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style="text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style="text-align: center; font-weight: bold;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2568</td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center; font-weight: bold;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2569</td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center; font-weight: bold;"></td>
                                                        </tr>

                                                        <tr>
                                                            <th scope='row'
                                                                style=" text-align: center;  ">
                                                                ทุกรุ่น</th>
                                                            <td style="font-weight: bold; text-align: center;">0 คน</td>
                                                            <td style="font-weight: bold; text-align: center;">10 คน</td>
                                                            <td style='font-weight: bold; text-align: center;'></td>
                                                            <td style='font-weight: bold; text-align: center;'></td>
                                                            <td style='font-weight: bold; text-align: center;'></td>
                                                            <td style=" font-weight: bold; text-align: center;"></td>
                                                            <td style=" font-weight: bold; text-align: center;"></td>
                                                            <td style=" font-weight: bold; text-align: center;"></td>
                                                            <td style='font-weight: bold; text-align: center;'></td>
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">นิสิตจบการศึกษา</h6>
                                </div>
                                <div class="card-body ">
                                    <div class="row" style="padding: 20px;">
                                        <div class="col-sm-12 mx-auto float-right">
                                            <div class="table-responsive">
                                                <table class="table table-striped" cellspacing="0"
                                                    style="color: black;">
                                                    <thead style=" ">
                                                        <tr>
                                                            <th rowspan="2" style=" text-align: center; width: 100px;">
                                                                รุ่น</th>
                                                            <th colspan="8" style=" text-align: center; width: 100px;">
                                                                ปีการศึกษา</th>
                                                            <th rowspan="2" style=" text-align: center;">รวม(คน)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;">2565</td>
                                                            <td style=" text-align: center;">2566</td>
                                                            <td style=" text-align: center;">2567</td>
                                                            <td style=" text-align: center;">2568</td>
                                                            <td style=" text-align: center;">2569</td>
                                                            <td style=" text-align: center;">2570</td>
                                                            <td style=" text-align: center;">2571</td>
                                                            <td style=" text-align: center;">2572</td>

                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2565</td>
                                                            <td style=" text-align: center;">
                                                                0 คน
                                                            </td>
                                                            <td style=" text-align: center;">0 คน</td>
                                                            <td style=" text-align: center;"> </td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center; font-weight: bold;">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2566</td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;">0 คน</td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center; font-weight: bold;">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2567</td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"> </td>
                                                            <td style="text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style="text-align: center; font-weight: bold;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2568</td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center; font-weight: bold;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2569</td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center;"></td>
                                                            <td style=" text-align: center; font-weight: bold;"></td>
                                                        </tr>

                                                        <tr>
                                                            <th scope='row'
                                                                style=" text-align: center;  ">
                                                                ทุกรุ่น</th>
                                                            <td style="font-weight: bold; text-align: center;">0 คน</td>
                                                            <td style="font-weight: bold; text-align: center;">0 คน</td>
                                                            <td style='font-weight: bold; text-align: center;'></td>
                                                            <td style='font-weight: bold; text-align: center;'></td>
                                                            <td style='font-weight: bold; text-align: center;'></td>
                                                            <td style=" font-weight: bold; text-align: center;"></td>
                                                            <td style=" font-weight: bold; text-align: center;"></td>
                                                            <td style=" font-weight: bold; text-align: center;"></td>
                                                            <td style='font-weight: bold; text-align: center;'></td>
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
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js">
                    </script>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js">
                    </script>
                    <script>
                        var ctx = document.getElementById("myChart").getContext('2d');
                        var myChart = new Chart(ctx, {
                            //type: 'bar',
                            //type: 'line',
                            type: 'bar',
                            data: {
                                labels: ['รุ่น 65', 'รุ่น 66'],
                                datasets: [{
                                    
                                    type: 'line',
                                    label: 'นักศึกษาแรกเข้า',
                                    backgroundColor: 'rgb(0, 107, 201)',
                                    data: [60, 60],
                                    borderColor: 'rgba(0, 107, 201,1)',
                                    lineTension: 0,
                                    fill: false
                                },
                                {
                                    label: 'นักศึกษาพ้นสภาพ',
                                    data: [10, 0],
                                    backgroundColor: '#ff6962',
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
                                    label: 'นักศึกษากำลังศึกษา',
                                    data: [50, 60],
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
                                    label: 'นักศึกษาจบการศึกษา',
                                    data: [0, 0],
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


                                ]

                            },

                            options: {
                                scales: {
                                    
                                    x: {
                                        stacked: true,
                                    },
                                    y: {
                                        stacked: true
                                    }
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
                                   
                                    type: 'line',
                                    backgroundColor: 'rgb(0, 107, 201)',
                                    label: 'นักศึกษาแรกเข้า',
                                    data: [60, 120],
                                    borderColor: 'rgba(0, 107, 201,1)',
                                    lineTension: 0,
                                    fill: false
                                },
                                {
                                    label: 'นักศึกษาพ้นสภาพ',
                                    data: [10, 10],
                                    backgroundColor: '#ff6962',
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
                                    label: 'นักศึกษากำลังศึกษา',
                                    data: [50, 110],
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
                                    label: 'นักศึกษาจบการศึกษา',
                                    data: [0, 0],
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
                                scales: {
                                    
                                    x: {
                                        stacked: true,
                                    },
                                    y: {
                                        stacked: true
                                    }
                                },

                                responsive: true,

                            }
                        });
                    </script>


</body>

</html>