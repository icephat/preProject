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

            <?php include('../layout/dean/report.php'); ?>

                    <div>
                        <form>
                            <div class="row mx-auto">

                                <div class="column col-sm-3">

                                    <div class="text-center">
                                        <h5>ปีการศึกษา<span style="color: red;">*</span></th>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <select class="form-control" data-live-search="true">
                                                <option value="default">--กรุณาเลือกปีการศึกษา--</option>

                                                <option value="2561">2560
                                                </option>
                                                <option value="2561">2561
                                                </option>
                                                <option value="2561">2562
                                                </option>
                                                <option value="2561">2563
                                                </option>
                                                <option value="2561">2564
                                                </option>

                                                <option value="2562">2565</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="column col-sm-3">
                                    <div class="text-center">
                                        <h5>ภาคการศึกษา<span style="color: red;">*</span></th>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <select class="form-control" data-live-search="true">
                                                <option value="default">--กรุณาเลือกภาคการศึกษา--</option>
                                                <option value="2561">ทุกภาค
                                                </option>
                                                <option value="2561">ต้น
                                                </option>
                                                <option value="2562">ปลาย</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="column col-sm-3">
                                    <div class="text-center">
                                        <h5>รุ่นที่สืบค้น<span style="color: red;">*</span></th>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <select class="form-control" data-live-search="true">
                                                <option value="default">--กรุณาเลือกรุ่นสืบค้น--</option>
                                                <option value="2561">ทุกรุ่น
                                                </option>
                                                <option value="2561">61
                                                </option>
                                                <option value="2562">62</option>
                                                <option value="2561">63
                                                </option>
                                                <option value="2562">64</option>
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

                        <h5>ทั้งหมด 250 คน 5 รุ่น (รุ่นที่ 60 61 62 63 64)</h5>
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

                    <br><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card shadow mb-4">
                                <!--<div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">จำนวนนิสิต (คน)</h6>
                                </div>-->
                                <div class="card-body ">
                                    <div class="row" style="padding: 20px;">
                                        <div class="col-sm-6">

                                            <canvas id="learn"></canvas>
                                        </div>
                                        <div class="col-sm-6 float-right">
                                            <div class="table-responsive">
                                                <table class="table table-striped" cellspacing="0"
                                                    style="color: black;">
                                                    <thead>
                                                        <tr>
                                                            <th style=" text-align: left; ">ชื่ออาจารย์</th>
                                                            <th style="text-align: right; ">3.25-4.00
                                                            </th>
                                                            <th style="text-align: right;">2.00-3.24</th>
                                                            <th style="text-align: right;">1.75-1.99</th>
                                                            <th style="text-align: right;">0.00-1.74</th>

                                                            <th style="text-align: right;">รายละเอียด</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" text-align: left;">ฐิติพงษ์ สถิรเมธีกุล</td>
                                                            <td style=" text-align: right;">
                                                                2 คน
                                                            </td>
                                                            <td style=" text-align: right;">
                                                                5 คน
                                                            </td>
                                                            <td style=" text-align: right;">0 คน</td>

                                                            <td style=" text-align: right;">1 คน</td>
                                                            <td class="text-center">
                                                                <a data-toggle="modal" data-target="#dataModal">
                                                                    <i class="fas fa-search fa-sm"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style=" text-align: left;">วรัญญา อรรถเสนา</td>
                                                            <td style=" text-align: right;">
                                                                3 คน
                                                            </td>
                                                            <td style=" text-align: right;">
                                                                8 คน
                                                            </td>
                                                            <td style=" text-align: right;">2 คน</td>
                                                            <td style=" text-align: right;">0 คน</td>
                                                            <td class="text-center">
                                                                <a data-toggle="modal" data-target="#dataModal">
                                                                    <i class="fas fa-search fa-sm"></i>
                                                                </a>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <th scope='row' style=" text-align: left;  ">
                                                                รวม (คน)</th>
                                                            <td style="font-weight: bold; text-align: right;">5 </td>
                                                            <td style='font-weight: bold; text-align: right;'>13</td>
                                                            <td style='font-weight: bold; text-align: right;'>2</td>
                                                            <td style='font-weight: bold; text-align: right;'>1</td>
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
                    <br><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card shadow mb-4">
                                <!--<div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">จำนวนนิสิต (คน)</h6>
                                </div>-->
                                <div class="card-body ">
                                    <div class="row" style="padding: 20px;">
                                        <div class="col-sm-6">

                                            <canvas id="learn2"></canvas>
                                        </div>
                                        <div class="col-sm-6 float-right">
                                            <div class="table-responsive">
                                                <table class="table table-striped" cellspacing="0"
                                                    style="color: black;">
                                                    <thead style=" ">
                                                        <tr>
                                                            <th style=" text-align: left; ">ชื่ออาจารย์</th>
                                                            <th style="text-align: right; ">ตามแผน
                                                            </th>
                                                            <th style="text-align: right;">ไม่ตามแผน</th>
                                                            <th style="text-align: right;">พ้นสภาพ</th>
                                                            <th style="text-align: right;">จบการศึกษา</th>

                                                            <th style="text-align: right;">รายละเอียด</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" text-align: left;">ฐิติพงษ์ สถิรเมธีกุล</td>
                                                            <td style=" text-align: right;">
                                                                2 คน
                                                            </td>
                                                            <td style=" text-align: right;">
                                                                5 คน
                                                            </td>
                                                            <td style=" text-align: right;">0 คน</td>

                                                            <td style=" text-align: right;">1 คน</td>
                                                            <td class="text-center">
                                                                <a data-toggle="modal" data-target="#dataModal2">
                                                                    <i class="fas fa-search fa-sm"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style=" text-align: left;">วรัญญา อรรถเสนา</td>
                                                            <td style=" text-align: right;">
                                                                3 คน
                                                            </td>
                                                            <td style=" text-align: right;">
                                                                8 คน
                                                            </td>
                                                            <td style=" text-align: right;">2 คน</td>
                                                            <td style=" text-align: right;">0 คน</td>
                                                            <td class="text-center">
                                                                <a data-toggle="modal" data-target="#dataModal2">
                                                                    <i class="fas fa-search fa-sm"></i>
                                                                </a>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <th scope='row' style=" text-align: left;  ">
                                                                รวม (คน)</th>
                                                            <td style="font-weight: bold; text-align: right;">5 </td>
                                                            <td style='font-weight: bold; text-align: right;'>13</td>
                                                            <td style='font-weight: bold; text-align: right;'>2</td>
                                                            <td style='font-weight: bold; text-align: right;'>1</td>
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
                    <br><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card shadow mb-4">
                                <!--<div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">ผลการเรียนนิสิต</h6>
                                </div>-->
                                <div class="card-body ">
                                    <div class="row" style="padding: 20px;">
                                        <div class="col-sm-6">

                                            <div id="grade"></div>
                                        </div>
                                        <div class="col-sm-6 mx-auto">
                                            <div class="table-responsive">
                                                <table class="table table-striped" cellspacing="0"
                                                    style="color: black;">
                                                    <thead style=" ">
                                                        <tr>
                                                            <th style=" text-align: left; "><span>อาจารย์</span></th>
                                                            <th style="text-align: center; "><span>ค่าสูงสุด</span>
                                                            </th>
                                                            <th style="text-align: center;"><span>ค่าต่ำสุด</span></th>
                                                            <th style="text-align: center;"><span>ค่าเฉลี่ย</span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr style="font-weight: normal;">
                                                            <td style=" text-align: left;">ฐิติพงษ์ สถิรเมธีกุล</td>
                                                            <td style=" text-align: center;">
                                                                3.40
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                2.00
                                                            </td>
                                                            <td style=" text-align: center;">2.70 </td>
                                                        </tr>

                                                        <tr style="font-weight: normal;">
                                                            <td style=" text-align: left;">วรัญญา อรรถเสนา</td>
                                                            <td style=" text-align: center;">
                                                                3.50
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                1.50
                                                            </td>
                                                            <td style=" text-align: center;">2.50</td>
                                                        </tr>
                                                        <tr style="font-weight: normal;">
                                                            <td style=" text-align: left;  ">ทุกท่าน</td>
                                                            <td style=" text-align: center;">
                                                                3.45
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                1.75
                                                            </td>
                                                            <td style=" text-align: center;">2.60</td>
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
                    <br>
                    <div class="row">
                        <h5 style="color: black;">นิสิตตกค้าง</h5>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card shadow mb-4">
                                <!--<div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">จำนวนนิสิต (คน)</h6>
                                </div>-->
                                <div class="card-body ">
                                    <div class="row" style="padding: 20px;">
                                        <div class="col-sm-6">

                                            <canvas id="learn21"></canvas>
                                        </div>
                                        <div class="col-sm-6 float-right">
                                            <div class="table-responsive">
                                                <table class="table table-striped" cellspacing="0"
                                                    style="color: black;">
                                                    <thead>
                                                        <tr>
                                                            <th style=" text-align: left; ">ชื่ออาจารย์</th>
                                                            <th style="text-align: right; ">3.25-4.00
                                                            </th>
                                                            <th style="text-align: right;">2.00-3.24</th>
                                                            <th style="text-align: right;">1.75-1.99</th>
                                                            <th style="text-align: right;">0.00-1.74</th>

                                                            <th style="text-align: right;">รายละเอียด</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" text-align: left;">ฐิติพงษ์ สถิรเมธีกุล</td>
                                                            <td style=" text-align: right;">
                                                                0 คน
                                                            </td>
                                                            <td style=" text-align: right;">
                                                                1 คน
                                                            </td>
                                                            <td style=" text-align: right;">1 คน</td>

                                                            <td style=" text-align: right;">0 คน</td>
                                                            <td class="text-center">
                                                                <a data-toggle="modal" data-target="#dataModal3">
                                                                    <i class="fas fa-search fa-sm"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style=" text-align: left;">วรัญญา อรรถเสนา</td>
                                                            <td style=" text-align: right;">
                                                                0 คน
                                                            </td>
                                                            <td style=" text-align: right;">
                                                                0 คน
                                                            </td>
                                                            <td style=" text-align: right;">2 คน</td>
                                                            <td style=" text-align: right;">0 คน</td>
                                                            <td class="text-center">
                                                                <a data-toggle="modal" data-target="#dataModal3">
                                                                    <i class="fas fa-search fa-sm"></i>
                                                                </a>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <th scope='row' style=" text-align: left;  ">
                                                                รวม (คน)</th>
                                                            <td style="font-weight: bold; text-align: right;">0 </td>
                                                            <td style='font-weight: bold; text-align: right;'>1</td>
                                                            <td style='font-weight: bold; text-align: right;'>2</td>
                                                            <td style='font-weight: bold; text-align: right;'>0</td>
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

                    <br><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card shadow mb-4">
                                <!--<div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">จำนวนนิสิต (คน)</h6>
                                </div>-->
                                <div class="card-body ">
                                    <div class="row" style="padding: 20px;">
                                        <div class="col-sm-6">

                                            <canvas id="learn22"></canvas>
                                        </div>
                                        <div class="col-sm-6 float-right">
                                            <div class="table-responsive">
                                                <table class="table table-striped" cellspacing="0"
                                                    style="color: black;">
                                                    <thead>
                                                        <tr>
                                                            <th style=" text-align: left; ">ชื่ออาจารย์</th>
                                                            <th style="text-align: right; ">ตามแผน
                                                            </th>
                                                            <th style="text-align: right;">ไม่ตามแผน</th>
                                                            <th style="text-align: right;">พ้นสภาพ</th>
                                                            <th style="text-align: right;">จบการศึกษา</th>

                                                            <th style="text-align: right;">รายละเอียด</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" text-align: left;">ฐิติพงษ์ สถิรเมธีกุล</td>
                                                            <td style=" text-align: right;">
                                                                0 คน
                                                            </td>
                                                            <td style=" text-align: right;">
                                                                3 คน
                                                            </td>
                                                            <td style=" text-align: right;">0 คน</td>

                                                            <td style=" text-align: right;">0 คน</td>
                                                            <td class="text-center">
                                                                <a data-toggle="modal" data-target="#dataModal4">
                                                                    <i class="fas fa-search fa-sm"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style=" text-align: left;">วรัญญา อรรถเสนา</td>
                                                            <td style=" text-align: right;">
                                                                0 คน
                                                            </td>
                                                            <td style=" text-align: right;">
                                                                2 คน
                                                            </td>
                                                            <td style=" text-align: right;">2 คน</td>
                                                            <td style=" text-align: right;">0 คน</td>
                                                            <td class="text-center">
                                                                <a data-toggle="modal" data-target="#dataModal4">
                                                                    <i class="fas fa-search fa-sm"></i>
                                                                </a>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <th scope='row' style=" text-align: left;  ">
                                                                รวม (คน)</th>
                                                            <td style="font-weight: bold; text-align: right;">0 </td>
                                                            <td style='font-weight: bold; text-align: right;'>5</td>
                                                            <td style='font-weight: bold; text-align: right;'>2</td>
                                                            <td style='font-weight: bold; text-align: right;'>0</td>
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
                    <br><br>
                    <!--<div class="row">
                        <div class="col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="dataTable" cellspacing="0"
                                        style="color: black;  ">
                                        <thead>
                                            <tr>
                                                <th style=" text-align: left;">อาจารย์ที่ปรึกษา</th>
                                                <th style=" text-align: center;">รหัสนิสิต</th>
                                                <th style=" text-align: left;">ชื่อนิสิต</th>
                                                <th style=" text-align: right;">ทั้งหมด</th>
                                                <th style="text-align: right;">เรียน</th>
                                                <th style="text-align: right;">คงเหลือ</th>
                                                <th style="text-align: center;">GPA</th>
                                                <th style="text-align: center;">รายละเอียด</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style=" text-align: left;">ฐิติพงษ์ สถิรเมธีกุล</td>
                                                <td style=" text-align: center;">632xxxxxxx</td>
                                                <td style=" text-align: left;">นางสาวxxxxx xxxxx</td>
                                                <td style=" text-align: right;">140</td>
                                                <td style=" text-align: right;">128</td>
                                                <td style=" text-align: right;">12</td>
                                                <td style=" text-align: center;">3.38</td>
                                                <td class="text-center">
                                                    <a data-toggle="modal" data-target="#dataModal5">
                                                        <i class="fas fa-search fa-sm"></i>
                                                    </a>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td style=" text-align: left;">วรัญญา อรรถเสนา</td>
                                                <td style=" text-align: center;">642xxxxxxx</td>
                                                <td style=" text-align: left;">นางสาวxxxxx xxxxx</td>
                                                <td style=" text-align: right;">138</td>
                                                <td style=" text-align: right;">93</td>
                                                <td style=" text-align: right;">45</td>
                                                <td style=" text-align: center;">3.02</td>
                                                <td class="text-center">
                                                    <a data-toggle="modal" data-target="#dataModal5">
                                                        <i class="fas fa-search fa-sm"></i>
                                                    </a>
                                                </td>
                                            </tr>



                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>-->
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




                        <!-- Page level plugins -->
                        <script src="../vendor/chart.js/Chart.min.js"></script>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js">
                        </script>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js">
                        </script>



                        <script>

                            var ctx = document.getElementById("learn");
                            var myChart = new Chart(ctx, {
                                //type: 'bar',
                                //type: 'line',
                                type: 'bar',
                                data: {
                                    labels: ['อ.ฐิติพงษ์', 'อ.วรัญญา'],
                                    datasets: [{
                                        label: '3.25-4.00',
                                        data: [2, 3],
                                        backgroundColor: "rgba(0, 9, 188,0.7)",
                                        borderWidth: 0
                                    },
                                    {
                                        label: '2.00-3.24',
                                        data: [5, 8],
                                        backgroundColor: "rgba(0, 110, 22,0.7)",
                                        borderWidth: 0
                                    },
                                    {
                                        label: '1.75-1.99',
                                        data: [0, 2],
                                        backgroundColor: 'rgba(255,128,0,0.7)',
                                        borderWidth: 0
                                    },
                                    {
                                        label: '0.00-1.74',
                                        data: [1, 0],
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
                                    labels: ['อ.ฐิติพงษ์', 'อ.วรัญญา'],
                                    datasets: [{
                                        label: 'ตามแผน',
                                        data: [2, 3],
                                        backgroundColor: "rgba(0, 9, 188,0.7)",
                                        borderWidth: 0
                                    },
                                    {
                                        label: 'ไม่ตามแผน',
                                        data: [5, 8],
                                        backgroundColor: "rgba(0, 110, 22,0.7)",
                                        borderWidth: 0
                                    },
                                    {
                                        label: 'พ้นสภาพ',
                                        data: [0, 2],
                                        backgroundColor: 'rgba(255,128,0,0.7)',
                                        borderWidth: 0
                                    },
                                    {
                                        label: 'จบการศึกษา',
                                        data: [1, 0],
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

                            var ctx = document.getElementById("learn21");
                            var myChart = new Chart(ctx, {
                                //type: 'bar',
                                //type: 'line',
                                type: 'bar',
                                data: {
                                    labels: ['อ.ฐิติพงษ์', 'อ.วรัญญา'],
                                    datasets: [{
                                        label: '3.25-4.00',
                                        data: [0, 0],
                                        backgroundColor: "rgba(0, 9, 188,0.7)",
                                        borderWidth: 0
                                    },
                                    {
                                        label: '2.00-3.24',
                                        data: [1, 0],
                                        backgroundColor: "rgba(0, 110, 22,0.7)",
                                        borderWidth: 0
                                    },
                                    {
                                        label: '1.75-1.99',
                                        data: [1, 2],
                                        backgroundColor: 'rgba(255,128,0,0.7)',
                                        borderWidth: 0
                                    },
                                    {
                                        label: '0.00-1.74',
                                        data: [0, 0],
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

                            var ctx = document.getElementById("learn22");
                            var myChart = new Chart(ctx, {
                                //type: 'bar',
                                //type: 'line',
                                type: 'bar',
                                data: {
                                    labels: ['อ.ฐิติพงษ์', 'อ.วรัญญา'],
                                    datasets: [{
                                        label: 'ตามแผน',
                                        data: [0, 0],
                                        backgroundColor: "rgba(0, 9, 188,0.7)",
                                        borderWidth: 0
                                    },
                                    {
                                        label: 'ไม่ตามแผน',
                                        data: [3, 2],
                                        backgroundColor: "rgba(0, 110, 22,0.7)",
                                        borderWidth: 0
                                    },
                                    {
                                        label: 'พ้นสภาพ',
                                        data: [0, 2],
                                        backgroundColor: 'rgba(255,128,0,0.7)',
                                        borderWidth: 0
                                    },
                                    {
                                        label: 'จบการศึกษา',
                                        data: [0, 0],
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

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
                        <script src='https://cdn.plot.ly/plotly-2.27.0.min.js'></script>
                        <script>
                            var ctx = document.getElementById("grade");
                            var y1 = [3.40, 2.70, 2.00];
                            var y2 = [3.50, 2.50, 1.50];
                            var y3 = [3.43, 2.43, 1.43];
                            var y4 = [3.53, 2.53, 1.53];
                            var y5 = [3.44, 2.44, 1.44];

                            var t1 = {
                                y: y1,
                                type: 'box',
                                name: 'อ.ฐิติพงษ์'
                            };
                            var t2 = {
                                y: y2,
                                type: 'box',
                                name: 'อ.วรัญญา'
                            };


                            var data = [t1, t2];
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
                        <!-- Bootstrap core JavaScript-->
                        <script src="../vendor/jquery/jquery.min.js"></script>
                        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                        <!-- Core plugin JavaScript-->
                        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

                        <!-- Custom scripts for all pages-->
                        <script src="../js/sb-admin-2.min.js"></script>

                        <!-- Page level plugins -->
                        <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
                        <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

                        <!-- Page level custom scripts -->
                        <script src="../js/demo/datatables-demoModal.js"></script>



</body>
</html>

<div id="dataModal" class="modal fade" style="color: black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="height: 90px;">
                <h5>ฐิติพงษ์ สถิรเมธีกุล </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <br>



            </div>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิต3.25-4.00 5 คน</h5>
            <div class="modal-body" id="std_detail">
                <table class="table table-striped">

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
                            <th>3.38</th>
                        </tr>
                        <tr>
                            <th>632xxxxxxx</th>
                            <th>นายxxxxxx xxxxxx</th>
                            <th>3.45</th>
                        </tr>


                    </tbody>
                </table>

            </div>
            <hr>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิต2.00-3.24 5 คน</h5>
            <div class="modal-body" id="std_detail">
                <table class="table table-striped">

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
                            <th>2.85</th>
                        </tr>
                        <tr>
                            <th>632xxxxxxx</th>
                            <th>นายxxxxxx xxxxxx</th>
                            <th>2.59</th>
                        </tr>
                        <tr>
                            <th>632xxxxxxx</th>
                            <th>นายxxxxxx xxxxxx</th>
                            <th>3.01</th>
                        </tr>
                        <tr>
                            <th>632xxxxxxx</th>
                            <th>นายxxxxxx xxxxxx</th>
                            <th>3.05</th>
                        </tr>
                        <tr>
                            <th>632xxxxxxx</th>
                            <th>นายxxxxxx xxxxxx</th>
                            <th>3.10</th>
                        </tr>


                    </tbody>
                </table>

            </div>
            <hr>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิต1.75-1.99 0 คน</h5>
            <hr>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิต0.00-1.74 1 คน</h5>
            <div class="modal-body" id="std_detail">
                <table class="table table-striped">

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
                            <th>1.45</th>
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

<div id="dataModal2" class="modal fade" style="color: black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="height: 90px;">
                <h5>ฐิติพงษ์ สถิรเมธีกุล </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <br>



            </div>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิตตามแผน 5 คน</h5>
            <div class="modal-body" id="std_detail">
                <table class="table table-striped">

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
                            <th>3.38</th>
                        </tr>
                        <tr>
                            <th>632xxxxxxx</th>
                            <th>นายxxxxxx xxxxxx</th>
                            <th>3.45</th>
                        </tr>


                    </tbody>
                </table>

            </div>
            <hr>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิตไม่ตามแผน 5 คน</h5>
            <div class="modal-body" id="std_detail">
                <table class="table table-striped">

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
                            <th>2.85</th>
                        </tr>
                        <tr>
                            <th>632xxxxxxx</th>
                            <th>นายxxxxxx xxxxxx</th>
                            <th>2.59</th>
                        </tr>
                        <tr>
                            <th>632xxxxxxx</th>
                            <th>นายxxxxxx xxxxxx</th>
                            <th>3.01</th>
                        </tr>
                        <tr>
                            <th>632xxxxxxx</th>
                            <th>นายxxxxxx xxxxxx</th>
                            <th>3.05</th>
                        </tr>
                        <tr>
                            <th>632xxxxxxx</th>
                            <th>นายxxxxxx xxxxxx</th>
                            <th>3.10</th>
                        </tr>


                    </tbody>
                </table>

            </div>
            <hr>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิตพ้นสภาพ 0 คน</h5>
            <hr>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิตจบการศึกษา 1 คน</h5>
            <div class="modal-body" id="std_detail">
                <table class="table table-striped">

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
                            <th>1.45</th>
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
<div id="dataModal3" class="modal fade" style="color: black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="height: 90px;">
                <h5>ฐิติพงษ์ สถิรเมธีกุล </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <br>



            </div>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิต3.25-4.00 0 คน</h5>
            <hr>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิต2.00-3.24 1 คน</h5>
            <div class="modal-body" id="std_detail">
                <table class="table table-striped">

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
                            <th>2.85</th>
                        </tr>

                    </tbody>
                </table>

            </div>
            <hr>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิต1.75-1.99 1 คน</h5>
            <div class="modal-body" id="std_detail">
                <table class="table table-striped">

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
                            <th>2.85</th>
                        </tr>

                    </tbody>
                </table>

            </div>
            <hr>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิต0.00-1.74 0 คน</h5>

            <hr>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"
                    style="font-size: 18px;">ปิดหน้าต่าง</button>
            </div>
        </div>
    </div>
</div>

<div id="dataModal4" class="modal fade" style="color: black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="height: 90px;">
                <h5>ฐิติพงษ์ สถิรเมธีกุล </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <br>



            </div>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิตตามแผน 0 คน</h5>
            <hr>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิตไม่ตามแผน 3 คน</h5>
            <div class="modal-body" id="std_detail">
                <table class="table table-striped">

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
                            <th>2.85</th>
                        </tr>
                        <tr>
                            <th>632xxxxxxx</th>
                            <th>นายxxxxxx xxxxxx</th>
                            <th>2.59</th>
                        </tr>
                        <tr>
                            <th>632xxxxxxx</th>
                            <th>นายxxxxxx xxxxxx</th>
                            <th>3.01</th>
                        </tr>



                    </tbody>
                </table>

            </div>
            <hr>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิตพ้นสภาพ 0 คน</h5>
            <hr>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิตจบการศึกษา 0 คน</h5>

            <hr>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"
                    style="font-size: 18px;">ปิดหน้าต่าง</button>
            </div>
        </div>
    </div>
</div>

<div id="dataModal5" class="modal fade" style="color: black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="height: 90px;">
                <h5>ฐิติพงษ์ สถิรเมธีกุล </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <br>



            </div>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิตตามแผน 0 คน</h5>
            <hr>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิตไม่ตามแผน 3 คน</h5>
            <div class="modal-body" id="std_detail">
                <table class="table table-striped">

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
                            <th>2.85</th>
                        </tr>
                        <tr>
                            <th>632xxxxxxx</th>
                            <th>นายxxxxxx xxxxxx</th>
                            <th>2.59</th>
                        </tr>
                        <tr>
                            <th>632xxxxxxx</th>
                            <th>นายxxxxxx xxxxxx</th>
                            <th>3.01</th>
                        </tr>



                    </tbody>
                </table>

            </div>
            <hr>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิตพ้นสภาพ 0 คน</h5>
            <hr>
            <h5 class="modal-title" style="margin-left: 10px;">นิสิตจบการศึกษา 0 คน</h5>

            <hr>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"
                    style="font-size: 18px;">ปิดหน้าต่าง</button>
            </div>
        </div>
    </div>
</div>