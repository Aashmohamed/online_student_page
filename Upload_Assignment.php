<?php

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online Student | Assigment</title>

    <link rel="icon" href="resources/tlogo4.jpg">

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">

</head>

<body background="resources/cls.jpeg">

    <div class=" container-fluid">
        <div class="row">


            <hr class="hr-break-1 bg-dark">

            <div class="row">

                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-12 mb-4 justify-content-center logo-img"></div>
                            <p class="text-center title01">Hi, Welcome to the online class.</p>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-12 order-2 order-lg-1">
                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Upload Assignment</p>
                            <div class=" align-items-center mb-4 row">
                                <i class="fa fa-circle fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0 col-12 col-lg-5">
                                    <input type="text" id="name" class="form-control" />
                                    <label class="form-label" for="name">Assignment Name</label>
                                </div>
                                <i class="fas fa-file-export fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0 col-12 col-lg-5">
                                    <input type="file" class="form-control" id="assignment" />
                                    <label class="form-label" for="assignment">Upload Assignment</label>
                                </div>
                            </div>
                            <div class=" align-items-center mb-4 row">
                                <i class="fas fa-calendar fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0 col-12 col-lg-5">
                                    <input type="date" id="startDate" class="form-control" />
                                    <label class="form-label" for="startDate">Start Date</label>
                                </div>
                                <i class="fas fa-calendar fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0 col-12 col-lg-5">
                                    <input type="date" id="endDate" class="form-control" />
                                    <label class="form-label" for="endDate">End Date</label>
                                </div>
                            </div>
                            <div class=" align-items-center mb-4 row">
                                <i class="fas fa-graduation-cap fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0 col-12 col-lg-5">
                                    <select class="form form-select" name="subject" id="subject">
                                        <option value="0">Select Subject</option>
                                        <?php
                                        $subject = Database::search("SELECT * FROM `subject`");
                                        $totalSubjects = $subject->num_rows;
                                        for ($i = 1; $i <= $totalSubjects; $i++) {
                                            $subjectDeatils = $subject->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $i; ?>">
                                                <?php echo $subjectDeatils["name"]; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label class="form-label" for="form3Example1c">Subject</label>
                                </div>
                                <i class="fas fa-user-graduate fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0 col-12 col-lg-5">
                                    <select class="form form-select" name="grade" id="grade">
                                        <option value="0">Select Grade</option>
                                        <?php
                                        $grade = Database::search("SELECT * FROM `grade`");
                                        $totalGrades = $grade->num_rows;

                                        for ($i = 1; $i <= $totalGrades; $i++) {
                                            $gradeDeatils = $grade->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $i; ?>">
                                                <?php echo $gradeDeatils["grade"]; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label class="form-label" for="form3Example1c">Grade</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <button onclick="uploadAssigment();" type="button" class="btn btn-primary col-8">Register</button>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>
    </div>

    <script src="script.js"></script>



</body>

</html>