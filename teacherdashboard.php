<?php

require "connection.php";
session_start();

if (isset($_SESSION["u"])) {
    $user = $_SESSION["u"];
    $pageno;
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>eShop | My Products</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

        <link rel="icon" href="resources/logo.svg" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body style="background-color: #E9EBEE;">

        <div class="container-fluid">
            <div class="row">

                <!-- Header -->
                <div class="col-12 bg-primary">
                    <div class="row">

                        <div class="col-4">
                            <div class="row">

                            </div>
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12 mt-5 my-lg-3">
                                    <h1 class="offset-6 offset-lg-2 fw-bold text-white fs-1">Teacher Home Page</h1>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Header -->
                <!-- body -->

                <div class="col-12">
                    <div class="row">
                        <!-- filter -->

                        <div class="col-11 col-lg-2 mx-3 my-3 rounded border border-primary">
                            <div class="row">

                                <div class="col-12 mt-3 fs-5">
                                    <div class="row">

                                        <div class="col-12 col-lg-12 mt-1 mb-1 text-center">
                                            <?php

                                            $profileImage = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $user["email"] . "'");
                                            $pn = $profileImage->num_rows;


                                            if ($pn == 1) {
                                                $prl = $profileImage->fetch_assoc();
                                            ?>
                                                <img src="<?php echo $prl["code"]; ?>" class="rounded-circle" width="90px" height="90px" />
                                            <?php
                                            } else {
                                            ?>
                                                <img src="resources/demoProfileImg.jpg" class="rounded-circle" width="90px" height="90px" />
                                            <?php
                                            }

                                            ?>
                                        </div>
                                        <div class="col-12 col-lg-12">
                                            <div class="row">
                                                <div class="col-12 mt-0 mt-lg-3">
                                                    <span class="fw-bold"><?php echo $user["name"] ?></span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="text-white"><?php echo $user["email"] ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 text-center mt-3 mb-3">
                                            <a href="teacherProfile.php" class="btn button3 text-white py-2 rounded border border-1 fs-6">
                                                <i class="bi bi-person-circle fs-2 pe-2"></i>MY Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- filter -->

                    <!-- products -->

                    <div class="col-12 col-lg-9 mt-3 mb-3 bg-white">
                        <div class="row">

                            <div class="col-4 d-grid bg-light text-center">
                                <a href="home.php" class="btn button2 text-white py-2 rounded border border-1 fs-6">
                                    <i class="bi bi-house-fill fs-2 pe-2"></i>Home</a>
                            </div>

                            <div class="col-4 d-grid bg-light text-center">
                                <a href="userProfile.php" class="btn button2 text-white py-2 rounded border border-1 fs-6">
                                    <i class="bi bi-person-circle fs-2 pe-2"></i>Add Lesson Notes</a>
                            </div>

                            <div class="col-4 d-grid bg-light text-center">
                                <a href="addproduct.php" class="btn button2 py-2 text-white rounded border border-1 fs-6">
                                    <i class="bi bi-cart-fill fs-2 pe-2"></i>Add Assignments</a>
                            </div>

                            <div class="col-4 d-grid bg-light text-center">
                                <a href="marks.php" class="btn button2 py-2 text-white rounded border border-1 fs-6">
                                    <i class="bi bi-cart-fill fs-2 pe-2"></i>Aasiment Marks</a>
                            </div>


                            <div class=" bg-light"></div>



                        </div>


                    </div>
                </div>

                <!-- products -->

            </div>
        </div>

        </div>
        </div>


        <!-- body -->

        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {

?>

    <script>
        alert("You have to Sign In ");
        window.location = "teacherSignin.php";
    </script>

<?php
}

?>