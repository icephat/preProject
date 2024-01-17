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
                                <div class="column mx-auto col-sm-2">
                                    <div class="text-center">
                                        <h5>ภาควิชา<span style="color: red;">*</span></th>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <select class="form-control" data-live-search="true">
                                                <option value="default">--กรุณาเลือกภาควิชา--</option>

                                                <option value="2561">วศ.คอมพิวเตอร์
                                                </option>
                                                <option value="2562">วศ.เครื่องกล</option>
                                                <option value="2561">วศ.โยธา
                                                </option>
                                                <option value="2562">วศ.อาหาร</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="column mx-auto col-sm-2">
                                    <div class="text-center">
                                        <h5>รอบ TCAS<span style="color: red;">*</span></th>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <select class="form-control" data-live-search="true">
                                                <option value="default">--รอบ TCAS--</option>

                                                <option value="2561">Tcas 1
                                                </option>
                                                <option value="2562">Tcas 2</option>
                                                <option value="2561">Tcas 3
                                                </option>
                                                <option value="2562">Tcas 4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="column mx-auto col-sm-2">
                                    <div class="text-center">
                                        <h5>รุ่น<span style="color: red;">*</span></th>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <select class="form-control" data-live-search="true">
                                                <option value="default">--รุ่น--</option>

                                                <option value="2561">61
                                                </option>
                                                <option value="2562">62</option>
                                                <option value="2561">63
                                                </option>
                                                <option value="2562">64</option>
                                                <option value="2562">65</option>
                                                <option value="2562">66</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="column mx-auto col-sm-2">
                                    <div class="text-center">
                                        <h5>จำนวนปีย้อนหลัง<span style="color: red;">*</span></th>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <select class="form-control" data-live-search="true">
                                                <option value="default">--ปีย้อนหลัง--</option>

                                                <option value="2561">1
                                                </option>
                                                <option value="2562">2</option>
                                                <option value="2561">3
                                                </option>
                                                <option value="2562">4</option>
                                                <option value="2562">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="column mx-auto col-sm-2">
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
                                                            <th >ภาควิชา</th>
                                                            <th style="text-align: center; "><span>Tcas 1</span>
                                                            </th>
                                                            <th style="text-align: center;"><span>Tcas 2</span></th>
                                                            <th style="text-align: center;">Tcas 3</th>
                                                            <th style="text-align: center;">Tcas 4</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>วศ.คอมพิวเตอร์</td>
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
                                                            <td >วศ.เครื่องกล</td>
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
                                                            <td >วศ.โยธา</td>
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
                                                            <td >วศ.อาหาร</td>
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
                                                            <th scope='row' style=" ">ทุกภาค</th>
                                                            <td style="font-weight: bold; text-align: center;">179 คน</td>
                                                            <td style='font-weight: bold; text-align: center;'>204 คน</td>
                                                            <td style='font-weight: bold; text-align: center;'>220 คน</td>
                                                            <td style='font-weight: bold; text-align: center;'>222 คน</td>
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
                                                            <th ><span>ภาควิชา</span></th>
                                                            <th style="text-align: center; "><span>ค่าสูงสุด</span>
                                                            </th>
                                                            <th style="text-align: center;"><span>ค่าต่ำสุด</span></th>
                                                            <th style="text-align: center;"><span>ค่าเฉลี่ย</span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr style="font-weight: normal;">
                                                            <td >วศ.คอมพิวเตอร์</td>
                                                            <td style=" text-align: center;">
                                                                3.40
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                2.00
                                                            </td>
                                                            <td style=" text-align: center;">2.70 </td>
                                                        </tr>

                                                        <tr style="font-weight: normal;">
                                                            <td >วศ.เครื่องกล</td>
                                                            <td style=" text-align: center;">
                                                                3.50
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                1.50
                                                            </td>
                                                            <td style=" text-align: center;">2.50</td>
                                                        </tr>
                                                        <tr style="font-weight: normal;">
                                                            <td >วศ.โยธา</td>
                                                            <td style=" text-align: center;">
                                                                3.43
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                1.43
                                                            </td>
                                                            <td style=" text-align: center;">2.43</td>
                                                        </tr>
                                                        <tr style="font-weight: normal;">
                                                            <td >วศ.อาหาร</td>
                                                            <td style=" text-align: center;">
                                                                3.53
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                1.53
                                                            </td>
                                                            <td style=" text-align: center;">2.53</td>
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
                                    <h6 class="m-0 font-weight-bold text-primary">จำนวนอัตราการคงอยู่ </h6>
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
                                                            <th style=" text-align: center; "></th>
                                                            <th style="text-align: center; "><span>วศ.คอมพิวเตอร์</span>
                                                            </th>
                                                            <th style="text-align: center;"><span>วศ.เครื่องกล</span></th>
                                                            <th style="text-align: center;">วศ.โยธา</th>
                                                            <th style="text-align: center;">วศ.อาหาร</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th style=" text-align: center;  ">จำนวนรับเข้า</th>
                                                            <td style=" text-align: center;">
                                                                50 คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                45 คน
                                                            </td>
                                                            <td style=" text-align: center;">46 คน</td>
                                                            <td style=" text-align: center;">55 คน</td>
                                                        </tr>

                                                        <tr>
                                                            <th style=" text-align: center;  ">จำนวนคงอยู่</th>
                                                            <td style=" text-align: center;">
                                                                43 คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                42 คน
                                                            </td>
                                                            <td style=" text-align: center;">45 คน</td>
                                                            <td style=" text-align: center;">52 คน</td>
                                                        </tr>

                                                        <tr>
                                                            <th scope='row' style=" text-align: center;  ">คิดเป็นร้อยละ
                                                            </th>
                                                            <td style="font-weight: bold; text-align: center;">100 </td>
                                                            <td style='font-weight: bold; text-align: center;'>93.75
                                                            </td>
                                                            <td style='font-weight: bold; text-align: center;'>93.30
                                                            </td>
                                                            <td style='font-weight: bold; text-align: center;'>100</td>
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
                                    <h6 class="m-0 font-weight-bold text-primary">สัดส่วนอัตราการคงอยู่ </h6>
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
                                                            <th style=" text-align: center; "></th>
                                                            <th style="text-align: center; "><span>วศ.คอมพิวเตอร์</span>
                                                            </th>
                                                            <th style="text-align: center;"><span>วศ.เครื่องกล</span></th>
                                                            <th style="text-align: center;">วศ.โยธา</th>
                                                            <th style="text-align: center;">วศ.อาหาร</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th style=" text-align: center;  ">จำนวนคงเหลือ</th>
                                                            <td style=" text-align: center;">
                                                                43 คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                42 คน
                                                            </td>
                                                            <td style=" text-align: center;">45 คน</td>
                                                            <td style=" text-align: center;">52 คน</td>
                                                        </tr>

                                                        <tr>
                                                            <th style=" text-align: center;  ">จำนวนพ้นสภาพ</th>
                                                            <td style=" text-align: center;">
                                                                7 คน
                                                            </td>
                                                            <td style=" text-align: center;">
                                                                3 คน
                                                            </td>
                                                            <td style=" text-align: center;">1 คน</td>
                                                            <td style=" text-align: center;">3 คน</td>
                                                        </tr>

                                                        <tr>
                                                            <th scope='row' style=" text-align: center;  ">คิดเป็นร้อยละ
                                                            </th>
                                                            <td style="font-weight: bold; text-align: center;">86.00
                                                            </td>
                                                            <td style='font-weight: bold; text-align: center;'>93.33
                                                            </td>
                                                            <td style='font-weight: bold; text-align: center;'>97.83
                                                            </td>
                                                            <td style='font-weight: bold; text-align: center;'>94.55
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
                                labels: ['วศ.คอมพิวเตอร์', 'วศ.เครื่องกล', 'วศ.โยธา', 'วศ.อาหาร'],
                                datasets: [{
                                    label: 'Tcas 1',
                                    data: [20, 15, 47, 53],
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
                                    label: 'Tcas 2',
                                    data: [64, 40, 25, 40],
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
                                    label: 'Tcas 3',
                                    data: [40, 55, 30, 40],
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
                                    label: 'Tcas 4',
                                    data: [20, 30, 49, 57],
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

                        var t1 = {
                            y: y1,
                            type: 'box',
                            name: 'วศ.คอมพิวเตอร์'
                        };
                        var t2 = {
                            y: y2,
                            type: 'box',
                            name: 'วศ.เครื่องกล'
                        };
                        var t3 = {
                            y: y3,
                            type: 'box',
                            name: 'วศ.โยธา'
                        };
                        var t4 = {
                            y: y4,
                            type: 'box',
                            name: 'วศ.อาหาร'
                        };

                        var data = [t1, t2, t3, t3, t4];
                        Plotly.newPlot('grade', data);
                        
                    </script>

                    <script>
                        var ctx = document.getElementById("percent");
                        var myChart = new Chart(ctx, {
                            //type: 'bar',
                            //type: 'line',
                            type: 'bar',
                            data: {
                                labels: ['วศ.คอมพิวเตอร์', 'วศ.เครื่องกล', 'วศ.โยธา', 'วศ.อาหาร'],
                                datasets: [{
                                    label: 'จำนวนรับเข้า',
                                    data: [50, 45, 46, 55],
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
                                    data: [43, 42, 45, 52],
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
                                labels: ['วศ.คอมพิวเตอร์', 'วศ.เครื่องกล', 'วศ.โยธา', 'วศ.อาหาร'],
                                datasets: [{
                                    label: 'จำนวนคงอยู่',
                                    data: [86, 93.33, 97.83, 94.55],
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
                                    data: [14, 6.67, 2.17, 5.45],
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