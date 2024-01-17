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

                <?php include('../layout/head/home.php'); ?>

                    <div>
                        <form>
                            <div class="row mx-auto">
                                <div class="column col-sm-3">
                                    <div class="text-center">
                                        <h5>หลักสูตร<span style="color: red;">*</span></h5>
                                    </div>
                                    
                                    <div>
                                        <select class="form-control" data-live-search="true">
                                            <option value="default">--กรุณาเลือกหลักสูตร--</option>

                                            <option value="2561">หลักสูตรวิศวกรรมศาสตร์บัณฑิต สาขาวิศวกรรมคอมพิวเตอร์ (หลักสูตรปรับปรุง พ.ศ.2560)
                                            </option>
                                            <option value="2562">หลักสูตรวิศวกรรมศาสตร์บัณฑิต สาขาวิศวกรรมคอมพิวเตอร์ (หลักสูตรปรับปรุง พ.ศ.2565)</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="column col-sm-3">

                                    <div class="text-center">
                                        <h5>ปีการศึกษา<span style="color: red;">*</span></h5>
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

                                <div class="column col-sm-3">

                                    <div class="text-center">
                                        <h5>ภาคการศึกษา<span style="color: red;">*</span></h5>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <select class="form-control" data-live-search="true">
                                                <option value="default">--ภาคการศึกษา--</option>

                                                <option value="2561">ภาคต้น
                                                </option>
                                                <option value="2562">ภาคปลาย</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="column col-sm-3">
                                    
                                    <div class=" text-center text-left">
                                        <div>
                                            <br>
                                        </div>
                                        <div>
                                            <button type="submit" name="submit" id="data"
                                            class="btn btn-success btn-m active">ดูผล</button>
                                        </div>
                                        
                                    </div>

                                </div>

                            </div>
                            
                        </form>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-10 " style="color: black;">
                            <h5>หลักสูตร: 2560 &nbsp; ปีการศึกษา: 2566 &nbsp; ภาคการศึกษา: ภาคต้น </h5>

                        </div>

                    </div>
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
                                                        <a style="color: rgb(0, 9, 188);"
                                                            href="../report_head/grade/honor.php">
                                                            <h4>เกียรตินิยม</h4>
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
                                                        <a style="color: rgb(0, 110, 22);"
                                                            href="../report_head/grade/normal.php">
                                                            <h4>ปกติ</h4>
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
                                                        <a style="color: #ff8c00;"
                                                            href="../report_head/grade/prohigh.php">
                                                            <h4>รอพินิจ</h4>
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
                                                        <a style="color: rgb(255, 0, 0);"
                                                            href="../report_head/grade/prodown.php">
                                                            <h4>โปรต่ำ</h4>
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

                                                <div style="color: rgb(0, 9, 188);">
                                                    <div class="text-center">
                                                        <a style="color: rgb(0, 9, 188);"
                                                            href="../report_head/status/plan.php">
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
                                                <div style="color: rgb(0, 110, 22);">
                                                    <div class="text-center">
                                                        <a style="color: rgb(0, 110, 22);"
                                                            href="../report_head/status/noplan.php">
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

                                                <div style="color: #ff8c00;">
                                                    <div class="text-center">
                                                        <a style="color: #ff8c00;"
                                                            href="../report_head/status/retry.php">
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
                                                <div style="color: rgb(255, 0, 0);">
                                                    <div class="text-center">
                                                        <a style="color: rgb(255, 0, 0);"
                                                            href="../report_head/status/finish.php">
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

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">จำนวนนักศึกษาแยกตามรุ่น (คน)</h6>
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
                                                    </tr>

                                                    <tr>
                                                        <th scope='row' style=" text-align: right;">รวม (คน)</th>
                                                        <td style="font-weight: bold; text-align: right;">19 </td>
                                                        <td style='font-weight: bold; text-align: right;'>1</td>
                                                        <td style='font-weight: bold; text-align: right;'>0</td>
                                                        <td style='font-weight: bold; text-align: right;'>0</td>
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
                                <h6 class="m-0 font-weight-bold text-primary">จำนวนนักศึกษาแยกตามปีการศึกษา (คน)
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
                                                        <th style="text-align: right; ">ลาออก</th>
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

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">รายชื่อนิสิต
                                </h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable" cellspacing="0"
                                    style="color: black;  ">
                                    <thead>
                                        <tr>

                                            <th>รหัสนิสิต</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>GPA</th>
                                            <th>สถานะ</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>6320500603</td>
                                            <td>ภัทรพร ปัญญาอุดมพร</td>
                                            <td>3.38</td>
                                            <td style="color: rgb(0, 110, 22); font-weight: bold;">ปกติ</td>
                                        </tr>
                                        <tr>
                                            <td>6320500611</td>
                                            <td>ภานุวัฒน์ จั่นจินดา</td>
                                            <td>3.65</td>
                                            <td style="color: rgb(0, 9, 188); font-weight: bold;">เกียรตินิยม</td>
                                        </tr>
                                    </tbody>

                                </table>
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
                                    backgroundColor: "#89cfef",
                                    borderWidth: 0
                                },
                                {
                                    label: ['ไม่ตามหลักสุตร'],
                                    data: [1, 2, 1, 5, 1, 0],
                                    backgroundColor: "#ffab76",
                                    borderWidth: 0
                                },
                                {
                                    label: ['ลาออก'],
                                    data: [0, 0, 0, 0, 0, 0],
                                    backgroundColor: '#ff6962',
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
                                backgroundColor: "#89cfef",
                                borderWidth: 0
                            },
                            {
                                label: ['ไม่ตามหลักสุตร'],
                                data: [1, 2, 1, 5, 1, 0],
                                backgroundColor: "#ffab76",
                                borderWidth: 0
                            },
                            {
                                label: ['ลาออก'],
                                data: [0, 0, 0, 0, 0, 0],
                                backgroundColor: '#ff6962',
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
                                label: 'เกียรตินิยม',
                                data: [0, 0, 6, 4, 4, 0],
                                backgroundColor: "rgba(0, 9, 188,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: 'ปกติ',
                                data: [1, 2, 7, 6, 6, 0],
                                backgroundColor: "rgba(0, 110, 22,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: 'โปรสูง',
                                data: [0, 0, 0, 0, 0, 0],
                                backgroundColor: 'rgba(255,128,0,0.7)',
                                borderWidth: 0
                            },
                            {
                                label: 'โปรต่ำ',
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
                                label: 'เกียรตินิยม',
                                data: [1, 2, 0, 0, 0, 0],
                                backgroundColor: "rgba(0, 9, 188,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: 'ปกติ',
                                data: [8, 5, 0, 0, 0, 0],
                                backgroundColor: "rgba(0, 110, 22,0.7)",
                                borderWidth: 0
                            },
                            {
                                label: 'โปรสูง',
                                data: [0, 1, 0, 0, 0, 0],
                                backgroundColor: 'rgba(255,128,0,0.7)',
                                borderWidth: 0
                            },
                            {
                                label: 'โปรต่ำ',
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
            <h5 class="modal-title" style="margin-left: 10px;">นิสิตตามหลักสูตร 1 คน</h5>
            <div class="modal-body" id="std_detail">
                <table class="table">

                    <thead>
                        <tr>
                            <th>รหัสนิสิต</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>เกรดเฉลี่ย</th>
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
            <h5 class="modal-title" style="margin-left: 10px;">นิสิตตามหลักสูตร 0 คน</h5>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"
                    style="font-size: 18px;">ปิดหน้าต่าง</button>
            </div>
        </div>
    </div>
</div>