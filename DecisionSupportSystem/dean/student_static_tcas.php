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

            <?php include('../layout/dean/report.php'); ?>

                    <div>
                        <form>
                            <div class="row mx-auto">

                                <div class="column col-sm-4">
                                    <div class="text-center">
                                        <h5>หลักสูตร<span style="color: red;">*</span></th>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <select class="form-control" data-live-search="true">
                                                <option value="default">--กรุณาเลือกหลักสูตร--</option>

                                                <option value="2561">หลักสูตรวิศวกรรมศาสตร์บัณฑิต สาขาวิศวกรรมคอมพิวเตอร์ (หลักสูตรปรับปรุง พ.ศ.2560)
                                                </option>
                                                <option value="2562">หลักสูตรวิศวกรรมศาสตร์บัณฑิต สาขาวิศวกรรมคอมพิวเตอร์ (หลักสูตรปรับปรุง พ.ศ.2565)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="column col-sm-4">
                                    <div class="text-center">
                                        <h5>รอบ<span style="color: red;">*</span></th>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <select class="form-control" data-live-search="true">
                                                <option value="0">ทุกรอบ
                                                </option>
                                                <option value="1">รอบ 1
                                                </option>
                                                <option value="2">รอบ 2</option>
                                                <option value="3">รอบ 3
                                                </option>
                                                <option value="4">รอบ 4</option>
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
                         <h5 style="color:black;">หลักสูตร วศ.คอม 60</h5>
                        <div class="col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">จำนวนนิสิตตาม Tcas (คน)</h6>
                                </div>
                                <div class="card-body ">
                                    <div class="row" style="padding: 20px;">
                                        <div class="col-sm-6">

                                            <canvas id="myChart"></canvas>
                                        </div>
                                        <div class="col-sm-6 float-right">
                                            <div class="table-responsive">
                                                <table class="table table-striped" cellspacing="0"
                                                    style="color: black;">
                                                    <thead style=" ">
                                                        <tr>
                                                            <th style=" text-align: center; ">รุ่น</th>
                                                            <th style="text-align: center; "><span>รอบที่ 1</span>
                                                            </th>
                                                            <th style="text-align: center;"><span>รอบที่ 2</span></th>
                                                            <th style="text-align: center;">รอบที่ 3</th>
                                                            <th style="text-align: center;">รอบที่ 4</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" text-align: center;">2560</td>
                                                            <td style=" text-align: center;">
                                                                20 คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                64 คน
                                                            </td>
                                                            <td style=" text-align: center;">40 คน</td>
                                                            <td style=" text-align: center;">20 คน</td>
                                                        </tr>

                                                        <tr>
                                                            <td style=" text-align: center;">2561</td>
                                                            <td style=" text-align: center;">
                                                                15 คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                40 คน
                                                            </td>
                                                            <td style=" text-align: center;">55 คน</td>
                                                            <td style=" text-align: center;">30 คน</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2562</td>
                                                            <td style=" text-align: center;">
                                                                47 คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                25 คน
                                                            </td>
                                                            <td style="text-align: center;">30 คน</td>
                                                            <td style="text-align: center;">49 คน</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2563</td>
                                                            <td style=" text-align: center;">
                                                                53 คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                20 คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                40 คน
                                                            </td>
                                                            <td style=" text-align: center;">57 คน</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=" text-align: center;">2564</td>
                                                            <td style=" text-align: center;">
                                                                44 คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                55 คน
                                                            </td>
                                                            <td style=" text-align: center;">55 คน</td>
                                                            <td style=" text-align: center;">66 คน</td>
                                                        </tr>

                                                        <tr>
                                                            <th scope='row' style=" text-align: center; ">รวม (คน)</th>
                                                            <td style="font-weight: bold; text-align: center;">179 </td>
                                                            <td style='font-weight: bold; text-align: center;'>204</td>
                                                            <td style='font-weight: bold; text-align: center;'>220</td>
                                                            <td style='font-weight: bold; text-align: center;'>222</td>
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
                                                            <th style=" text-align: center; "><span>รุ่น</span></th>
                                                            <th style="text-align: center; "><span>ค่าสูงสุด</span>
                                                            </th>
                                                            <th style="text-align: center;"><span>ค่าต่ำสุด</span></th>
                                                            <th style="text-align: center;"><span>ค่าเฉลี่ย</span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr style="font-weight: normal;">
                                                            <td style=" text-align: center;">2560</td>
                                                            <td style=" text-align: center;">
                                                                3.40
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                2.00
                                                            </td>
                                                            <td style=" text-align: center;">2.70 </td>
                                                        </tr>

                                                        <tr style="font-weight: normal;">
                                                            <td style=" text-align: center;">2561</td>
                                                            <td style=" text-align: center;">
                                                                3.50
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                1.50
                                                            </td>
                                                            <td style=" text-align: center;">2.50</td>
                                                        </tr>
                                                        <tr style="font-weight: normal;">
                                                            <td style=" text-align: center;">2562</td>
                                                            <td style=" text-align: center;">
                                                                3.43
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                1.43
                                                            </td>
                                                            <td style=" text-align: center;">2.43</td>
                                                        </tr>
                                                        <tr style="font-weight: normal;">
                                                            <td style=" text-align: center;">2563</td>
                                                            <td style=" text-align: center;">
                                                                3.53
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                1.53
                                                            </td>
                                                            <td style=" text-align: center;">2.53</td>
                                                        </tr>
                                                        <tr style="font-weight: normal;">
                                                            <td style=" text-align: center;">2564</td>
                                                            <td style=" text-align: center;">
                                                                3.44
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                1.44
                                                            </td>
                                                            <td style=" text-align: center;">2.44</td>
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
                                    <h6 class="m-0 font-weight-bold text-primary">อัตราคงอยู่ </h6>
                                </div>
                                <div class="card-body ">
                                    <div class="row" style="padding: 20px;">
                                        <div class="col-sm-6">

                                            <canvas id="percent"></canvas>
                                        </div>
                                        <div class="col-sm-6 float-right">
                                            <div class="table-responsive">
                                                <table class="table table-striped" cellspacing="0"
                                                    style="color: black;">
                                                    <thead style=" ">
                                                        <tr>
                                                            <th style=" text-align: center; ">รุ่นการศึกษา</th>
                                                            <th style="text-align: center; "><span>รับเข้า</span>
                                                            </th>
                                                            <th style="text-align: center;"><span>คงอยู่</span></th>
                                                            <th style="text-align: center;">คิดเป็นร้อยละ</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th style=" text-align: center;  ">63</th>
                                                            <td style=" text-align: center;">20 คน
                                                            </td>
                                                            <td style=" text-align: center;">10 คน
                                                            </td>
                                                            <td style=" text-align: center;">50.00</td>

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
                                    <h6 class="m-0 font-weight-bold text-primary">อัตราพ้นสภาพ </h6>
                                </div>
                                <div class="card-body ">
                                    <div class="row" style="padding: 20px;">
                                        <div class="col-sm-6">

                                            <canvas id="percent2"></canvas>
                                        </div>
                                        <div class="col-sm-6 float-right">
                                            <div class="table-responsive">
                                                <table class="table table-striped" cellspacing="0"
                                                    style="color: black;">
                                                    <thead style=" ">
                                                        <tr>
                                                            <th style=" text-align: center; ">รุ่นการศึกษา</th>
                                                            <th style="text-align: center; "><span>รับเข้า</span></th>
                                                            <th style="text-align: center;"><span>พ้นสภาพ</span></th>
                                                            <th style="text-align: center;">คิดเป็นร้อยละ</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        
                                                        <td style=" text-align: center;">63</td>
                                                            <td style=" text-align: center;">20 คน</td>
                                                            <td style=" text-align: center;">10 คน</td>
                                                            <td style=" text-align: center;">50</td>
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

                    <script>
                        var ctx = document.getElementById("myChart");
                        var myChart = new Chart(ctx, {
                            //type: 'bar',
                            //type: 'line',
                            type: 'bar',
                            data: {
                                labels: ['รุ่น 60', 'รุ่น 61', 'รุ่น 62', 'รุ่น 63', 'รุ่น 64'],
                                datasets: [{
                                    label: 'รอบที่ 1',
                                    data: [20, 15, 47, 53, 44],
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
                                    label: 'รอบที่ 2',
                                    data: [64, 40, 25, 40, 55],
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
                                    label: 'รอบที่ 3',
                                    data: [40, 55, 30, 40, 55],
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
                                    label: 'รอบที่ 4',
                                    data: [20, 30, 49, 57, 66],
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


                                ]

                            },

                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true,
                                            max: 100,
                                            min: 0
                                        }
                                    }]
                                },
                                responsive: true,

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

                        var รุ่น60 = {
                            y: y1,
                            type: 'box',
                            name: 'รุ่น 60'
                        };
                        var รุ่น61 = {
                            y: y2,
                            type: 'box',
                            name: 'รุ่น 61'
                        };
                        var รุ่น62 = {
                            y: y3,
                            type: 'box',
                            name: 'รุ่น 62'
                        };
                        var รุ่น63 = {
                            y: y4,
                            type: 'box',
                            name: 'รุ่น 63'
                        };
                        var รุ่น64 = {
                            y: y5,
                            type: 'box',
                            name: 'รุ่น 64'
                        };

                        var data = [รุ่น60, รุ่น61, รุ่น62, รุ่น63, รุ่น64];
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
                        var ctx = document.getElementById("percent");
                        var myChart = new Chart(ctx, {
                            //type: 'bar',
                            //type: 'line',
                            type: 'bar',
                            data: {
                                labels: ['รุ่น 60', 'รุ่น 61', 'รุ่น 62', 'รุ่น 63', 'รุ่น 64'],
                                datasets: [{
                                    label: 'จำนวนรับเข้า',
                                    data: [50, 45, 46, 55, 50],
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
                                    data: [43, 42, 45, 52, 48],
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

                            }
                        });
                    </script>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js">
                    </script>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js">
                    </script>
                    <script>
                        var ctx = document.getElementById("percent2");
                        var myChart = new Chart(ctx, {
                            //type: 'bar',
                            //type: 'line',
                            type: 'bar',
                            data: {
                                labels: ['รุ่น 60', 'รุ่น 61', 'รุ่น 62', 'รุ่น 63', 'รุ่น 64'],
                                datasets: [{
                                    label: 'จำนวนคงอยู่',
                                    data: [86, 93.33, 97.83, 94.55, 96],
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
                                    data: [14, 6.67, 2.17, 5.45, 4],
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
                                        max: 100,
                                        min: 0
                                    }
                                }]
            
                            }
                        });
                    </script>



</body>

</html>