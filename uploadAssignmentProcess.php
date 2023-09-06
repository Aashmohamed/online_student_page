<?php
session_start();
require "connection.php";

$name = $_POST["name"];
$sdate = $_POST["sDate"];
$edate = $_POST["eDate"];
$subject = $_POST["subject"];
$grade = $_POST["grade"];
$teacherID = $_SESSION["userDetails"]["id"];

if (empty($name)) {
    echo "Please Enter Name";
} else if (empty($sdate)) {
    echo "Please Select Start Date";
} else if (empty($edate)) {
    echo "Please Select End Date";
} else if ($subject == 0) {
    echo "Please Select a Subject";
} else if ($grade == 0) {
    echo "Please Select a Grade";
} else {

    if (!isset($_FILES["assignment"])) {

        echo "Please Upload a PDF or Word Document";
    } else {

        $assignment = $_FILES["assignment"];
    }

    if (isset($assignment)) {

        $allowed_image_extension = array("application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document");

        $file_extension = $assignment["type"];

        if (!in_array($file_extension, $allowed_image_extension)) {
            echo "Please Upload a PDF or Word Document";
        } else {

            $sname =  $assignment["name"];
            $path = "assignment/" . uniqid() . "$sname";
            $fileName = "../" . $path;

            move_uploaded_file($assignment["tmp_name"], $fileName);
            Database::iud(" INSERT INTO `studentmanagement`.`assignment` (`assignment_name`, `grade_id`, `subject_id`, `teacher_id`, `s_date`, `e_date`, `path`) 
    VALUES ('" . $name . "', '" . $grade . "', '" . $subject . "', '" . $teacherID . "', '" . $sdate . "', '" . $edate . "', '" . $path . "');
    ");
            echo "success";
        }
    } else {
        echo " [ Upload Error ] ";
    }
}
?>