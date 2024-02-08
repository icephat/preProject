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
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include('../layout/dean/home.php'); ?>


                    <div class="row">
                        <div class="col-sm-12 ">
                            <div class="row">
                                <div class="col-sm-5 mx-auto">
                                    <table class="table table-hover"
                                        style="margin-top: 30px; border: 1px solid black; border-collapse: collapse; ">
                                        <tr style="border: 1px solid black; border-collapse: collapse; ">
                                            <th
                                                style="border: 1px solid black; border-collapse: collapse; width: 50%; ">

                                                <div style="color: rgb(0, 9, 188);">
                                                    <div class="text-center">
                                                        <a style="color: rgb(0, 9, 188);"  href="#" data-toggle="modal" data-target="#modalblue">
                                                            <h4>3.25-4.00</h4>
                                                        </a>
                                                    </div>
                                                    <div class="text-center">
                                                        <h1 style="font-weight: bolder; font-size: 70px; ">10</h1>
                                                    </div>
                                                    <div class="text-right">
                                                        <p>คน</p>
                                                    </div>
                                                </div>


                                            </th>
                                            <th style="border: 1px solid black; border-collapse: collapse; ">
                                                <div style="color: rgb(0, 110, 22);">
                                                    <div class="text-center">
                                                        <a style="color: rgb(0, 110, 22);"  href="#" data-toggle="modal" data-target="#modalgreen">
                                                            <h4>2.00-3.24</h4>
                                                        </a>
                                                    </div>
                                                    <div class="text-center">
                                                        <h1 style="font-weight: bolder; font-size: 70px;">22</h1>
                                                    </div>
                                                    <div class="text-right">
                                                        <p>คน</p>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black; border-collapse: collapse; ">

                                                <div style="color: #ff8c00;">
                                                    <div class="text-center">
                                                        <a style="color: #ff8c00;"  href="#" data-toggle="modal" data-target="#modalorange">
                                                            <h4>1.75-1.99</h4>
                                                        </a>
                                                    </div>
                                                    <div class="text-center">
                                                        <h1 style="font-weight: bolder; font-size: 70px;">0</h1>
                                                    </div>
                                                    <div class="text-right">
                                                        <p>คน</p>
                                                    </div>
                                                </div>
                                            </th>
                                            <th style="border: 1px solid black; border-collapse: collapse;">
                                                <div style="color: rgb(255, 0, 0);">
                                                    <div class="text-center">
                                                        <a style="color: rgb(255, 0, 0);"  href="#" data-toggle="modal" data-target="#modalred">
                                                            <h4>0.00-1.74</h4>
                                                        </a>
                                                    </div>
                                                    <div class="text-center">
                                                        <h1 style="font-weight: bolder; font-size: 70px;">0</h1>
                                                    </div>
                                                    <div class="text-right">
                                                        <p>คน</p>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-5 mx-auto">
                                    <table class="table table-hover"
                                        style="margin-top: 30px; border: 1px solid black; border-collapse: collapse;">
                                        <tr style="border: 1px solid black; border-collapse: collapse;">
                                            <th style="border: 1px solid black; border-collapse: collapse; width: 50%;">

                                                <div style="color: rgb(100, 197, 215);">
                                                    <div class="text-center">
                                                        <a style="color: rgb(100, 197, 215);"  href="#" data-toggle="modal" data-target="#modalblue2">
                                                            <h4>ตามแผน</h4>
                                                        </a>
                                                    </div>
                                                    <div class="text-center">
                                                        <h1 style="font-weight: bolder; font-size: 70px; ">10</h1>
                                                    </div>
                                                    <div class="text-right">
                                                        <p>คน</p>
                                                    </div>
                                                </div>


                                            </th>
                                            <th style="border: 1px solid black; border-collapse: collapse; ">
                                                <div style="color: rgb(	118, 188, 22);">
                                                    <div class="text-center">
                                                        <a style="color: rgb(118, 188, 22);" href="#" data-toggle="modal" data-target="#modalgreen2">
                                                            <h4>ไม่ตามแผน</h4>
                                                        </a>
                                                    </div>
                                                    <div class="text-center">
                                                        <h1 style="font-weight: bolder; font-size: 70px;">22</h1>
                                                    </div>
                                                    <div class="text-right">
                                                        <p>คน</p>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid black; border-collapse: collapse;">

                                                <div style="color: rgb(	245, 123, 57);">
                                                    <div class="text-center">
                                                        <a style="color: rgb(245, 123, 57);" href="#" data-toggle="modal" data-target="#modalorange2">
                                                            <h4>พ้นสภาพ</h4>
                                                        </a>
                                                    </div>
                                                    <div class="text-center">
                                                        <h1 style="font-weight: bolder; font-size: 70px;">0</h1>
                                                    </div>
                                                    <div class="text-right">
                                                        <p>คน</p>
                                                    </div>
                                                </div>
                                            </th>
                                            <th style="border: 1px solid black; border-collapse: collapse;">
                                                <div style="color: rgb(255, 105, 98);">
                                                    <div class="text-center">
                                                        <a style="color: rgb(255, 105, 98);" href="#" data-toggle="modal" data-target="#modalred2">
                                                            <h4>จบการศึกษา</h4>
                                                        </a>
                                                    </div>
                                                    <div class="text-center">
                                                        <h1 style="font-weight: bolder; font-size: 70px;">0</h1>
                                                    </div>
                                                    <div class="text-right">
                                                        <p>คน</p>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">จำนวนนิสิตแยกตามรุ่น (คน)</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">

                                        <canvas id="learnyear"></canvas>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="table-responsive">
                                            <table class="table table-striped" width="100%" cellspacing="0"
                                                style="color: black;">
                                                <thead>
                                                    <tr>
                                                        <th style=" text-align: right; ">รุ่น</th>
                                                        <th style="text-align: right; ">
                                                            <span>ตามแผน</span>
                                                        </th>
                                                        <th style="text-align: right; ">
                                                            <span>ไม่ตามแผน</span>
                                                        </th>
                                                        <th style="text-align: right; ">พ้นสภาพ</th>
                                                        <th style="text-align: right; ">จบการศึกษา</th>
                                                        <th style="text-align: right; ">รายละเอียด</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style=" text-align: right;">61</td>
                                                        <td style=" text-align: right;">
                                                            0 คน
                                                        </td>
                                                        <td style=" text-align: right;">
                                                            1 คน
                                                        </td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td class="text-center">
                                                                <a data-toggle="modal" data-target="#modalPlan" >
                                                                    <i class="fas fa-search fa-sm"></i>
                                                                </a>
                                                            </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" text-align: right;">62</td>
                                                        <td style=" text-align: right;">
                                                            0 คน
                                                        </td>
                                                        <td style=" text-align: right;">
                                                            2 คน
                                                        </td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td class="text-center">
                                                                <a data-toggle="modal" data-target="#modalPlan" >
                                                                    <i class="fas fa-search fa-sm"></i>
                                                                </a>
                                                            </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" text-align: right;">63</td>
                                                        <td style=" text-align: right;">
                                                            9 คน
                                                        </td>
                                                        <td style=" text-align: right;">
                                                            1 คน
                                                        </td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td class="text-center">
                                                                <a data-toggle="modal" data-target="#modalPlan" >
                                                                    <i class="fas fa-search fa-sm"></i>
                                                                </a>
                                                            </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" text-align: right;">64</td>
                                                        <td style=" text-align: right;">
                                                            5 คน
                                                        </td>
                                                        <td style=" text-align: right;">
                                                            5 คน
                                                        </td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td class="text-center">
                                                                <a data-toggle="modal" data-target="#modalPlan" >
                                                                    <i class="fas fa-search fa-sm"></i>
                                                                </a>
                                                            </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" text-align: right;">65</td>
                                                        <td style=" text-align: right;">
                                                            9 คน
                                                        </td>
                                                        <td style=" text-align: right;">
                                                            1 คน
                                                        </td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td class="text-center">
                                                                <a data-toggle="modal" data-target="#modalPlan" >
                                                                    <i class="fas fa-search fa-sm"></i>
                                                                </a>
                                                            </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" text-align: right;">66</td>
                                                        <td style=" text-align: right;">
                                                            10 คน
                                                        </td>
                                                        <td style=" text-align: right;">
                                                            0 คน
                                                        </td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td class="text-center">
                                                                <a data-toggle="modal" data-target="#modalPlan" >
                                                                    <i class="fas fa-search fa-sm"></i>
                                                                </a>
                                                            </td>
                                                    </tr>

                                                    <tr>
                                                        <th scope='row' style=" text-align: right;">รวม </th>
                                                        <td style="font-weight: bold; text-align: right;">19 คน</td>
                                                        <td style='font-weight: bold; text-align: right;'>1 คน</td>
                                                        <td style='font-weight: bold; text-align: right;'>0 คน</td>
                                                        <td style='font-weight: bold; text-align: right;'>0 คน</td>
                                                        <td></td>
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
                    <div class="col-sm-4">
                        <div class="card">
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
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">ช่วงเกรดนิสิตปีที่ 4</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="pee4"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
                <br><br>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">จำนวนนิสิตแยกตามปีการศึกษา (คน)
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">

                                        <canvas id="learnnew"></canvas>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="table-responsive">
                                            <table class="table table-striped" width="100%" cellspacing="0"
                                                style="color: black;">
                                                <thead>
                                                    <tr>
                                                        <th style=" text-align: right; ">ปีการศึกษา</th>
                                                        <th style="text-align: right; ">
                                                            <span>ตามหลักสูตร</span>
                                                        </th>
                                                        <th style="text-align: right; ">
                                                            <span>ไม่ตามหลักสูตร</span>
                                                        </th>
                                                        <th style="text-align: right; ">พ้นสภาพ</th>
                                                        <th style="text-align: center; ">รายละเอียด</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style=" text-align: right;">2561</td>
                                                        <td style=" text-align: right;">
                                                            0 คน
                                                        </td>
                                                        <td style=" text-align: right;">
                                                            1 คน
                                                        </td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td class="text-center">
                                                            <a data-toggle="modal" data-target="#dataModal">
                                                                <i class="fas fa-search fa-sm"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" text-align: right;">2562</td>
                                                        <td style=" text-align: right;">
                                                            0 คน
                                                        </td>
                                                        <td style=" text-align: right;">
                                                            2 คน
                                                        </td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td class="text-center">
                                                            <a data-toggle="modal" data-target="#dataModal">
                                                                <i class="fas fa-search fa-sm"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" text-align: right;">2563</td>
                                                        <td style=" text-align: right;">
                                                            9 คน
                                                        </td>
                                                        <td style=" text-align: right;">
                                                            1 คน
                                                        </td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td class="text-center">
                                                            <a data-toggle="modal" data-target="#dataModal">
                                                                <i class="fas fa-search fa-sm"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" text-align: right;">2564</td>
                                                        <td style=" text-align: right;">
                                                            5 คน
                                                        </td>
                                                        <td style=" text-align: right;">
                                                            5 คน
                                                        </td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td class="text-center">
                                                            <a data-toggle="modal" data-target="#dataModal">
                                                                <i class="fas fa-search fa-sm"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" text-align: right;">2565</td>
                                                        <td style=" text-align: right;">
                                                            9 คน
                                                        </td>
                                                        <td style=" text-align: right;">
                                                            1 คน
                                                        </td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td class="text-center">
                                                            <a data-toggle="modal" data-target="#nisitModal">
                                                                <i class="fas fa-search fa-sm"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" text-align: right;">2566</td>
                                                        <td style=" text-align: right;">
                                                            10 คน
                                                        </td>
                                                        <td style=" text-align: right;">
                                                            0 คน
                                                        </td>
                                                        <td style=" text-align: right;">0 คน</td>
                                                        <td class="text-center">
                                                            <a data-toggle="modal" data-target="#dataModal">
                                                                <i class="fas fa-search fa-sm"></i>
                                                            </a>
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
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">สถานภาพนิสิต ณ ปัจจุบัน</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="learn"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
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

                

                <!-- modalblue -->
                <div id="modalblue" class="modal fade" style="color: black;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="height: 90px;">
                                        <h5>รายชื่อนิสิต ช่วงเกรด 3.25-4.00 </h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <br>

                                    </div>
                                    <h5 class="modal-title" style="margin-left: 10px;">จำนวนนิสิต 0 คน</h5>
                                    
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th>รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th>GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                        <tr>
                                                            <th>63202651</th>
                                                            <th>xxx xxxx</th>
                                                            <th>3.33</th>
                                                        </tr>

                                                </tbody>
                                            </table>

                                        </div>
                                    
                                    
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
                                    <h5 class="modal-title" style="margin-left: 10px;">จำนวนนิสิต 0 คน</h5>
                                    
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th>รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th>GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                        <tr>
                                                            <th>63202651</th>
                                                            <th>xxx xxxx</th>
                                                            <th>3.33</th>
                                                        </tr>

                                                </tbody>
                                            </table>

                                        </div>
                                    
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
                                    <h5 class="modal-title" style="margin-left: 10px;">จำนวนนิสิต 0 คน</h5>
                                    <
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th>รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th>GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                        <tr>
                                                            <th>63202651</th>
                                                            <th>xxx xxxx</th>
                                                            <th>3.33</th>
                                                        </tr>

                                                </tbody>
                                            </table>

                                        </div>
                                    
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
                                    <h5 class="modal-title" style="margin-left: 10px;">จำนวนนิสิต 0 คน</h5>
                                    
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th>รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th>GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                        <tr>
                                                            <th>63202651</th>
                                                            <th>xxx xxxx</th>
                                                            <th>3.33</th>
                                                        </tr>
                                                    

                                                </tbody>
                                            </table>

                                        </div>
                                    
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
                                    <h5 class="modal-title" style="margin-left: 10px;">จำนวนนิสิต 0 คน</h5>
                                   
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th>รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th>GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        
                                                        <tr>
                                                            <th>63202651</th>
                                                            <th>xxx xxxx</th>
                                                            <th>3.33</th>
                                                        </tr>
                                                    

                                                </tbody>
                                            </table>

                                        </div>
                                    
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
                                    <h5 class="modal-title" style="margin-left: 10px;">จำนวนนิสิต 0 คน</h5>
                                    
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th>รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th>GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                        <tr>
                                                            <th>63202651</th>
                                                            <th>xxx xxxx</th>
                                                            <th>3.33</th>
                                                        </tr>

                                                </tbody>
                                            </table>

                                        </div>
                                    
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
                                    <h5 class="modal-title" style="margin-left: 10px;">จำนวนนิสิต 0 คน</h5>
                                    
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th>รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th>GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        
                                                        <tr>
                                                            <th>63202651</th>
                                                            <th>xxx xxxx</th>
                                                            <th>3.33</th>
                                                        </tr>
                                                    

                                                </tbody>
                                            </table>

                                        </div>
                                    
                                        
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
                                    <h5 class="modal-title" style="margin-left: 10px;">จำนวนนิสิต 0 คน</h5>
                                    
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th>รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th>GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                        <tr>
                                                            <th>63202651</th>
                                                            <th>xxx xxxx</th>
                                                            <th>3.33</th>
                                                        </tr>
                                                    
                                                    

                                                </tbody>
                                            </table>

                                        </div>
                                    
                                    <hr>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                            style="font-size: 18px;">ปิดหน้าต่าง</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- modalPlan -->

                <div id="modalPlan" class="modal fade" style="color: black;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="height: 90px;">
                                        <h5>ปีการศึกษา 2566 ภาคการศึกษา ต้น</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <br>

                                    </div>
                                    <h5 class="modal-title" style="margin-left: 10px;">นิสิตตามแผน 1 คน</h5>
                                    
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th>รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th>GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                            <th>xxxxxxx</th>
                                                            <th>นายxxxxxx xxxxxx</th>
                                                            <th>xxxx</th>
                                                        </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    
                                    <hr>
                                    <h5 class="modal-title" style="margin-left: 10px;">นิสิตไม่ตามแผน 1 คน</h5>
                                
                                    <div class="modal-body" id="std_detail">
                                        <table class="table">

                                            <thead>
                                                <tr>
                                                    <th>รหัสนิสิต</th>
                                                    <th>ชื่อ-นามสกุล</th>
                                                    <th>GPAX</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                            <th>xxxxxxx</th>
                                                            <th>นายxxxxxx xxxxxx</th>
                                                            <th>xxxx</th>
                                                        </tr>


                                            </tbody>
                                        </table>

                                    </div>
                                    <hr>
                                    <h5 class="modal-title" style="margin-left: 10px;">นิสิตพ้นสภาพ 1 คน</h5>
                                   
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th>รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th>GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    
                                                <tr>
                                                            <th>xxxxxxx</th>
                                                            <th>นายxxxxxx xxxxxx</th>
                                                            <th>xxxx</th>
                                                        </tr>
                                                 


                                                </tbody>
                                            </table>

                                        </div>
                                   
                                    <h5 class="modal-title" style="margin-left: 10px;">นิสิตจบการศึกษา 1 คน</h5>
                                    
                                   
                                        <div class="modal-body" id="std_detail">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th>รหัสนิสิต</th>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th>GPAX</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                        <tr>
                                                            <th>xxxxxxx</th>
                                                            <th>นายxxxxxx xxxxxx</th>
                                                            <th>xxxx</th>
                                                        </tr>
                                                  

                                                </tbody>
                                            </table>

                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                            style="font-size: 18px;">ปิดหน้าต่าง</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                <!-- dataModal -->
                <div id="dataModal" class="modal fade" style="color: black;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="height: 90px;">
                                <h5>ปีการศึกษา 2565 หลักสูตร 2565 </h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <br>



                            </div>
                            <h5 class="modal-title" style="margin-left: 10px;">นิสิตตามหลักสูตร 0 คน</h5>
                            <hr>
                            <h5 class="modal-title" style="margin-left: 10px;">นิสิตไม่ตามหลักสูตร 1 คน</h5>
                            <div class="modal-body" id="std_detail">
                                <table class="table">

                                    <thead>
                                        <tr>
                                            <th>รหัสนิสิต</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>GPAX</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>632xxxxxxx</th>
                                            <th>นายxxxxxx xxxxxx</th>
                                            <th>2.20</th>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                            <hr>
                            <h5 class="modal-title" style="margin-left: 10px;">นิสิตพ้นสภาพ 0 คน</h5>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"
                                    style="font-size: 18px;">ปิดหน้าต่าง</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Content Row -------------------------------------------------------BOX----------------------->
                <!--script-->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js">
                </script>

                <script>

                    var ctx = document.getElementById("learnyear");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: ['รุ่น 61', 'รุ่น 62', 'รุ่น 63', 'รุ่น 64', 'รุ่น 65', 'รุ่น 66'],
                            datasets: [
                                {
                                    label: 'ตามหลักสูตร',
                                    data: [0, 0, 9, 5, 9, 10],
                                    backgroundColor: "rgba(100, 197, 215,0.7)",
                                    borderWidth: 0
                                },
                                {
                                    label: ['ไม่ตามหลักสุตร'],
                                    data: [1, 2, 1, 5, 1, 0],
                                    backgroundColor: "rgba(118, 188, 22,0.7)",
                                    borderWidth: 0
                                },
                                {
                                    label: ['พ้นสภาพ'],
                                    data: [0, 0, 0, 0, 0, 0],
                                    backgroundColor: 'rgba(245, 123, 57,0.7)',
                                    borderWidth: 0
                                },
                                {
                                    label: ['จบการศึกษา'],
                                    data: [0, 0, 0, 0, 0, 0],
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
                    var ctx = document.getElementById("pee1");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: ['รุ่น 63', 'รุ่น 64', 'รุ่น 65', 'รุ่น 66'],
                            datasets: [{
                                label: '3.25-4.00',
                                data: [3, 2, 2, 1],
                                backgroundColor: "rgba(0, 9, 188,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '2.00-3.24',
                                data: [6, 5, 8, 9],
                                backgroundColor: "rgba(0, 110, 22,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '1.75-1.99',
                                data: [1, 1, 0, 0],
                                backgroundColor: 'rgba(255,128,0,0.7)',
                                borderWidth: 0
                            },
                            {
                                label: '0.00-1.74',
                                data: [0, 0, 0, 0],
                                backgroundColor: 'rgba(255, 0, 0,0.7)',
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
                    var ctx = document.getElementById("pee2");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: ['รุ่น 63', 'รุ่น 64', 'รุ่น 65', 'รุ่น 66'],
                            datasets: [{
                                label: '3.25-4.00',
                                data: [3, 1, 3, 0],
                                backgroundColor: "rgba(0, 9, 188,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '2.00-3.24',
                                data: [6, 9, 7, 0],
                                backgroundColor: "rgba(0, 110, 22,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '1.75-1.99',
                                data: [1, 0, 0, 0],
                                backgroundColor: 'rgba(255,128,0,0.7)',
                                borderWidth: 0
                            },
                            {
                                label: '0.00-1.74',
                                data: [0, 0, 0, 0],
                                backgroundColor: 'rgba(255, 0, 0,0.7)',
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
                    var ctx = document.getElementById("pee3");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: ['รุ่น 63', 'รุ่น 64', 'รุ่น 65', 'รุ่น 66'],
                            datasets: [{
                                label: '3.25-4.00',
                                data: [3, 2, 0, 0],
                                backgroundColor: "rgba(0, 9, 188,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '2.00-3.24',
                                data: [6, 8, 0, 0],
                                backgroundColor: "rgba(0, 110, 22,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '1.75-1.99',
                                data: [1, 0, 0, 0],
                                backgroundColor: 'rgba(255,128,0,0.7)',
                                borderWidth: 0
                            },
                            {
                                label: '0.00-1.74',
                                data: [0, 0, 0, 0],
                                backgroundColor: 'rgba(255, 0, 0,0.7)',
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
                    var ctx = document.getElementById("pee4");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: ['รุ่น 63', 'รุ่น 64', 'รุ่น 65', 'รุ่น 66'],
                            datasets: [{
                                label: '3.25-4.00',
                                data: [3, 0, 0, 0],
                                backgroundColor: "rgba(0, 9, 188,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '2.00-3.24',
                                data: [6, 0, 0, 0],
                                backgroundColor: "rgba(0, 110, 22,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '1.75-1.99',
                                data: [1, 0, 0, 0],
                                backgroundColor: 'rgba(255,128,0,0.7)',
                                borderWidth: 0
                            },
                            {
                                label: '0.00-1.74',
                                data: [0, 0, 0, 0],
                                backgroundColor: 'rgba(255, 0, 0,0.7)',
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


                    var ctx = document.getElementById("learnnew");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: ['2561', '2562', '2563', '2564', '2565', '2566'],
                            datasets: [{
                                label: 'ตามหลักสูตร',
                                data: [0, 0, 9, 5, 9, 10],
                                backgroundColor: "rgba(100, 197, 215,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: ['ไม่ตามหลักสุตร'],
                                data: [1, 2, 1, 5, 1, 0],
                                backgroundColor: "rgba(118, 188, 22,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: ['พ้นสภาพ'],
                                data: [0, 0, 0, 0, 0, 0],
                                backgroundColor: 'rgba(245, 123, 57,0.7)',
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

                    var ctx = document.getElementById("learn");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: ['รหัส 61', 'รหัส 62', 'รหัส 63', 'รหัส 64', 'รหัส 65', 'รหัส 66'],
                            datasets: [{
                                label: '3.25-4.00',
                                data: [0, 0, 6, 4, 4, 0],
                                backgroundColor: "rgba(0, 9, 188,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '2.00-3.24',
                                data: [1, 2, 7, 6, 6, 0],
                                backgroundColor: "rgba(0, 110, 22,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '1.75-1.99',
                                data: [0, 0, 0, 0, 0, 0],
                                backgroundColor: 'rgba(255,128,0,0.7)',
                                borderWidth: 0
                            },
                            {
                                label: '0.00-1.74',
                                data: [0, 0, 0, 0, 0, 0],
                                backgroundColor: 'rgba(255, 0, 0,0.7)',
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

                    var ctx = document.getElementById("learn2");
                    var myChart = new Chart(ctx, {
                        //type: 'bar',
                        //type: 'line',
                        type: 'bar',
                        data: {
                            labels: ['รหัส 61', 'รหัส 62', 'รหัส 63', 'รหัส 64', 'รหัส 65', 'รหัส 66'],
                            datasets: [{
                                label: '3.25-4.00',
                                data: [1, 2, 0, 0, 0, 0],
                                backgroundColor: "rgba(0, 9, 188,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '2.00-3.24',
                                data: [8, 5, 0, 0, 0, 0],
                                backgroundColor: "rgba(0, 110, 22,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: '1.75-1.99',
                                data: [0, 1, 0, 0, 0, 0],
                                backgroundColor: 'rgba(255,128,0,0.7)',
                                borderWidth: 0
                            },
                            {
                                label: '0.00-1.74',
                                data: [0, 0, 0, 0, 0, 0],
                                backgroundColor: 'rgba(255, 0, 0,0.7)',
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

                <!-- Page level plugins -->
                <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
                <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="../js/demo/datatables-demo.js"></script>



</body>

</html>

