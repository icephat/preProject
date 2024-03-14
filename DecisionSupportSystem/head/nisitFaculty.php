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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<?php

session_start();

require_once '../function/teacherFunction.php';
require_once '../function/departmentFunction.php';



$teacher = getTeacherByUsernameTeacher($_SESSION["access-user"]);





?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include('../layout/head/nisit_faculty.php'); ?>
                <hr>
                <div class="row">
                    <div class="col-12 mx-auto">
                        <br>
                        <h4 style="color: green;">รายชื่อนิสิตในคณะวิศวกรรมศาสตร์ กำแพงแสน</h4>
                        <div class="card">
                            <div class="col-12 mx-auto">
                                <form action="./nisitFacultySearch.php" method="POST">
                                    <div class=" text-center">
                                    <br>
                                        <h5 style="margin-left: 20px;">โปรดระบุรหัสนิสิตหรือชื่อนิสิต</h3>
                                            <br>
                                            <input type="text" class="form-control" name="search"
                                                placeholder="รหัสนิสิต กรือ ชื่อนิสิต" required>
                                            <br>

                                            <button class="btn btn-primary" style="font-size: 20px;">Search</button>
                                            
                                    </div>
                                </form>
                                <br>
                            </div>

                        </div>
                        <br>
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
    <script src="../js/demo/datatables-demo.js"></script>




</body>

</html>