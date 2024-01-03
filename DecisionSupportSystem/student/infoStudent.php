<!-- Content Row -------------------------------------------------------BOX----------------------->
<div class="row">
                        <div class="col-6 text-left">
                            <h4 style="color: black;">ข้อมูลสมาชิก : <?php echo $student["titleTh"].$student["fisrtNameTh"]." ",$student["lastNameTh"] ?></h4>
                        </div>
                        <div class="col-6 text-right">
                            <h4 style="color: black;">GPA <?php echo round($student["gpax"],2)?></h4>
                        </div>
                    </div>
                    <hr>
                    <!-- Content Row -------------------------------------------------------BOX----------------------->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: black;">รหัสนิสิต: </p>
                                </div>
                                <div class="col-sm-6">
                                    <p style="color: gray;"><?php echo $student["studentId"] ; ?></p>
                                </div>
                               
                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: black;">ชื่อ - นามสกุล:</p>
                                </div>
                                <div class="col-sm-6 ">
                                    <p style="color: gray;"><?php echo $student["fisrtNameTh"]." ",$student["lastNameTh"] ?></p>
                                </div>
                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: black;"></p>
                                </div>
                                <div class="col-sm-6 ">
                                    <p style="color: gray;"><?php echo $student["fisrtNameEng"]." ",$student["lastNameEng"] ?></p>
                                </div>
                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: black;">เบอร์โทรศัพท์: </p>
                                </div>
                                <div class="col-sm-6 ">
                                    <p style="color: gray;"><?php echo $student["tell"]?></p>
                                </div>
                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: black;">อีเมล: </p>
                                </div>
                                <div class="col-sm-6 ">
                                    <p style="color: gray;"><?php echo $student["email"]?></p>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6 text-left">
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: black;">คณะ: </p>
                                </div>
                                <div class="col-sm-6 ">
                                    <p style="color: gray;"><?php echo $student["department"]["faculty"]?></p>
                                </div>
                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: black;">สาขาวิชา: </p>
                                </div>
                                <div class="col-sm-6 ">
                                    <p style="color: gray;"><?php echo $student["department"]["departmentName"]?></p>
                                </div>
                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: black;">หลักสูตร: </p>
                                </div>
                                <div class="col-sm-6 ">
                                    <p style="color: gray;"><?php echo $student["program"]["langProgram"]." (".$student["program"]["nameProgram"].")" ;?></p>
                                </div>
                            </div>
                            <div class="row" style="margin-left: 20px; padding: auto; ">
                                <div class="col-sm-6">
                                    <p style="color: black;">อาจารย์ที่ปรึกษา: </p>
                                </div>
                                <div class="col-sm-6 ">
                                    <p style="color: gray;"><?php echo $student["teacher"]["titleTecherTh"].$student["teacher"]["fisrtNameTh"]." ".$student["teacher"]["lastNameTh"] ; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>