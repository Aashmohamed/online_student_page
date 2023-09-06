<?php

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online Student|Student Marks</title>

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

                                        <div class="col-10 offset-1 mt-5">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Assignment ID</th>
                                                        <th scope="col">Student Name</th>
                                                        <th scope="col">Subject</th>
                                                        <th scope="col">Marks</th>
                                                        <th scope="col">Result</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $user_type = $_SESSION["user_type"];
                                                    $uid = $_SESSION["userDetails"]["id"];
                                                    $query = "";
                                                    $rowCount = "";
                                                    if ($user_type == 1) {
                                                        $query = "SELECT a.*,b.`fname` FROM `exam_marks` a INNER JOIN `student` b ON a.`student_id` = b.`id` ";
                                                    } else if ($user_type == 2) {
                                                        $query = "SELECT a.*,b.`fname` FROM `exam_marks` a INNER JOIN `student` b ON a.`student_id` = b.`id`";
                                                    } else if ($user_type == 4) {
                                                        $query = "SELECT a.*,b.`fname` FROM `exam_marks` a INNER JOIN `student` b ON a.`student_id` = b.`id`";
                                                    }
                                                    $details = Database::search($query);

                                                    if ($details !== false && $details->num_rows > 0) {
                                                        $rowCount = $details->num_rows;
                                                    }
                                                    for ($i = 0; $i < $rowCount; $i++) {
                                                        $detailsRow = $details->fetch_assoc();
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $detailsRow["id"]; ?></th>
                                                            <td><?php echo $detailsRow["fname"] . " " . $detailsRow["lname"]; ?></td>
                                                            <td><input class="form-control" type="text" value="<?php echo $detailsRow["marks"]; ?>" id="marks"></td>
                                                            <td><input class="form-control" type="text" value="<?php echo $detailsRow["result"]; ?>" id="result"></td>
                                                            <td><input class="form-control" type="text" value="<?php echo $detailsRow["comment"]; ?>" id="comment"></td>
                                                            <td><button class="btn btn-primary" onclick="submitAnswer(<?php echo $detailsRow['id']; ?>,<?php echo $detailsRow['id']; ?>);">Submit</button></td>

                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
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