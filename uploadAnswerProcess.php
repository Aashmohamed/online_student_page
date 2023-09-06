<?php

session_start();
require "../connection/connection.php";

$assignmentID = $_POST["aid"];
$userID = $_SESSION["userDetails"]["id"];

if (!isset($_FILES["as"])) {

    echo "Please Upload Assignment before the submit";
} else {

    $assignment = $_FILES["assignment"];
}

if (!isset($assignment)) {
    echo " File";
} else {

    if (isset($assignment)) {

        $allowed_image_extension = array("application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document");

        $file_extension = $assignment["type"];

        if (!in_array($file_extension, $allowed_image_extension)) {
            echo "Please Upload a PDF or Word Document";
        } else {

            $sname =  $assignment["name"];
            $path = "answer/".uniqid() . "$sname";
            $fileName = "../" . $path;

            move_uploaded_file($assignment["tmp_name"], $fileName);
            Database::iud("INSERT INTO `studentmanagement`.`exam_marks` (`student_id`, `assignment_id`, `marks`, `comment`, `result`, `submit_status_id`) 
            VALUES ('$userID', '$assignmentID', '0', '-', 'Not Released', '1');
            ");
            echo "success";
        }
    } else {
        echo "Please Select Upload A File";
    }
}
