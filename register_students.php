<?php

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online Student| Student Registation</title>

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
                        <div class="col-lg-12 col-xl-11">
                            <div class="card text-black" style="border-radius: 25px;">
                                <div class="card-body p-md-5">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 col-lg-6 col-xl-12 order-2 order-lg-1">
                                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Student Registration</p>
                                            <div class=" align-items-center mb-4 row">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0 col-12 col-lg-5">
                                                    <input type="text" id="fname" class="form-control" />
                                                    <label class="form-label" for="form3Example1c">First Name</label>
                                                </div>
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0 col-12 col-lg-5">
                                                    <input type="text" id="lname" class="form-control" />
                                                    <label class="form-label" for="form3Example1c">NIC no</label>
                                                </div>
                                            </div>

                                            <div class=" align-items-center mb-4 row">
                                                <i class="fas fa-address-book fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0 col-12 col-lg-5">
                                                    <input type="date" id="bday" class="form-control" />
                                                    <label class="form-label" for="form3Example1c">Birthday</label>
                                                </div>
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0 col-12 col-lg-5">

                                                    <label class="form-label">Gender</label>
                                                    <?php

                                                    $gid = $_SESSION["u"]["gender"];
                                                    $g = Database::search("SELECT * FROM `gender` WHERE `id`='" . $gid . "' ");
                                                    $gf = $g->fetch_assoc();

                                                    ?>
                                                    <input readonly type="text" class="form-control" placeholder="gender" value="<?php echo $gf["name"] ?>" />

                                                    </select>

                                                </div>
                                            </div>

                                            <div class=" align-items-center mb-4 row">

                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0 col-12 col-lg-5">
                                                    <select class="form form-select" name="grade" id="grade">
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

                                            <div class=" align-items-center mb-4 row">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0 col-12 col-lg-5">
                                                    <input type="text" id="email" class="form-control" />
                                                    <label class="form-label" for="form3Example1c">Email</label>
                                                </div>
                                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0 col-12 col-lg-5">
                                                    <input type="text" id="password" class="form-control" />
                                                    <label class="form-label" for="form3Example1c">Password</label>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button onclick="studentRegistration();" type="button" class="btn btn-primary col-8">Register</button>
                                            </div>
                                        </div>
                                    </div>
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