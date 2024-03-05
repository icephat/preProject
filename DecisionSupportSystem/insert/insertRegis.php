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

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper">

            <!-- Main Content -->
            <div id="content">

                <?php include('./layout.php'); ?>
                <hr>
                <div class="row">
                    <div class="col-12 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h5>อัพโหลดไฟล์</h5>

                            </div>
                            <div class="card-body">
                                <form action="insert_regis.php" method="post" enctype="multipart/form-data">
                                    <div class="col-sm-6 mb-3  mx-auto">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="text-center">
                                                    <h5 style="color: black;">ปีการศึกษา<span
                                                            style="color: red;">*</span>
                                                    </h5>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="text-center">
                                                    <input type="number" class="form-control" name="semesterYear"
                                                        id="semesterYear" required>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-6 mb-3  mx-auto">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="text-center">
                                                    <h5 style="color: black;">ภาคการศึกษา<span
                                                            style="color: red;">*</span>
                                                    </h5>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="text-center">
                                                    <select class="form-control" width="500px" data-live-search="true"
                                                        name="semesterPart" required>
                                                        <option value="1">ภาคต้น</option>
                                                        <option value="2">ภาคปลาย</option>
                                                        <option value="3">ภาคฤดูร้อน</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3  mx-auto">

                                        <input type="file" class="form-control" accept=".csv" name="file" id="file" required>
                                    </div>


                                    <div class="col-sm-6 mx-auto text-center">
                                        <button type="submit" class="btn btn-primary ">Submit</button>
                                    </div>

                                </form>
                            </div>

                        </div>



                    </div>
                </div>
            </div>
        </div>






</body>

</html>