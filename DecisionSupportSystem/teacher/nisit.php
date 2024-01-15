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
     <!-- Custom styles for this template -->
     <link href="../css/sb-admin-2.min.css" rel="stylesheet">

     <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php include('../layout/teacher/nisit.php'); ?>
                
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 mx-auto">
                            <h4 style="color: green;">รายชื่อนิสิตในที่ปรึกษา คณะวิศวกรรมศาสตร์ กำแพงแสน</h4>
                            <div class="card">
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="dataTable" cellspacing="0" style="color: black;  ">
                                        <thead>
                                            <tr>
                                                <th >รหัสนิสิต</th>
                                                <th >ชื่อ-นามสกุล</th>
                                                <th class="text-center">ประเภทหลักสูตร</th>
                                                <th class="text-center">หน่วยกิตที่ลงทะเบียน<br>
                                                    (ทั้งหมด/ผ่าน/ไม่ผ่าน)
                                                </th>
                                                <th class="text-center">ผลการเรียน</th>
                                                <th class="text-center">รายละเอียด</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td >612xxxxxxx</td>
                                                <td>นายxxxxx xxxxxx</td>
                                                <td class="text-center">วศ.คอม(ปกติ)</td>
            
                                                <td class="text-center"><span style='color:green;'>169</span>
                                                    <span style='color:green;'>/169</span>
                                                    <span style='color:red;'>/9</span>
                                                </td>
                                                <td class="text-center"><span style='color:green;'>2.05</span> <br>
                                                    <span >(ปกติ)</span>
                                                </td>
            
                                                <td class="text-center">
                                                    <form action="./student_info.php">
                                                        <!--<input type="hidden" name="std_num" value="<?php echo $row["studentid"];?>" />-->
                                                        <!--<a type="button" name="std_info">
                                <span class="glyphicon glyphicon-user"></span></a>-->
                                                        <button type="submit" name="submit" class="btn btn-info btn-md"><span
                                                                class="glyphicon glyphicon-user"></span> รายละเอียด</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td >622xxxxxxx</td>
                                                <td>นายxxxxx xxxxxx</td>
                                                <td class="text-center">วศ.คอม(ปกติ)</td>
            
                                                <td class="text-center"><span style='color:green;'>145</span>
                                                    <span style='color:green;'>/145</span>
                                                    <span style='color:red;'>/4</span>
                                                </td>
                                                <td class="text-center"><span style='color:green;'>2.66</span> <br>
                                                    <span >(ปกติ)</span>
                                                </td>
            
                                                <td class="text-center">
                                                    <form action="./student_info.php">
                                                        <!--<input type="hidden" name="std_num" value="<?php echo $row["studentid"];?>" />-->
                                                        <!--<a type="button" name="std_info">
                                <span class="glyphicon glyphicon-user"></span></a>-->
                                                        <button type="submit" name="submit" class="btn btn-info btn-md"><span
                                                                class="glyphicon glyphicon-user"></span> รายละเอียด</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>632xxxxxxx</td>
                                                <td>ภัทรพร ปัญญาอุดมพร</td>
                                                <td class="text-center">วศ.คอม(ปกติ)</td>
            
                                                <td class="text-center"><span style='color:green;'>128</span>
                                                    <span style='color:green;'>/128</span>
                                                    <span style='color:red;'>/0</span>
                                                </td>
                                                <td class="text-center"><span style='color:green;'>3.38</span> <br>
                                                    <span >(ปกติ)</span>
                                                </td>
            
                                                <td class="text-center">
                                                    <form action="./student_info.php">
                                                        <!--<input type="hidden" name="std_num" value="<?php echo $row["studentid"];?>" />-->
                                                        <!--<a type="button" name="std_info">
                                <span class="glyphicon glyphicon-user"></span></a>-->
                                                        <button type="submit" name="submit" class="btn btn-info btn-md"><span
                                                                class="glyphicon glyphicon-user"></span> รายละเอียด</button>
                                                    </form>
                                                </td>
                                            </tr>
            
                                            <tr>
                                                <td >632xxxxxxx</td>
                                                <td>ภานุวัฒน์ จั่นจินดา</td>
                                                <td class="text-center">วศ.คอม(ปกติ)</td>
            
                                                <td class="text-center"><span style='color:green;'>124</span>
                                                    <span style='color:green;'>/124</span>
                                                    <span style='color:red;'>/0</span>
                                                </td>
                                                <td class="text-center"><span style='color:green;'>3.65</span> <br>
                                                    <span>(เกียรตินิยม)</span>
                                                </td>
            
                                                <td class="text-center">
                                                    <form method="post" action="student_info.php">
                                                        <!--<input type="hidden" name="std_num" value="<?php echo $row["studentid"];?>" />-->
                                                        <!--<a type="button" name="std_info">
                                <span class="glyphicon glyphicon-user"></span></a>-->
                                                        <button type="submit" name="submit" class="btn btn-info btn-md"><span
                                                                class="glyphicon glyphicon-user"></span> รายละเอียด</button>
                                                    </form>
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

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#grade').DataTable({
                        responsive: true,
                        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "ทั้งหมด"]]
                    });
                    $('#table1').DataTable({
                        responsive: true,
                        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "ทั้งหมด"]],
            
                    });
                    $('#table2').DataTable({
                        responsive: true,
                        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "ทั้งหมด"]]
            
                    });
                });
            </script>


</body>

</html>