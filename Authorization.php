<?php
//echo "hello";
require "db.php";
session_start();
if($_POST['email'] == "admin@admin.kz" && $_POST['password'] == "admin"){
    header('Location: Admin.php');
}
else {
    $student = authorization($_POST['email'], $_POST['password']);
    if ($student != null) {
        $_SESSION['id'] = $student['id'];
        $_SESSION['name'] = $student['name'];
        $_SESSION['surname'] = $student['surname'];
        $_SESSION['birthday'] = $student['birthday'];
        $_SESSION['email'] = $student['email'];
        $_SESSION['speciality'] = $student['speciality'];
//    $_SESSION['group_name'] = $student['group_name'];
        $subjects = getAllSubjectsByID($student['id']);
        $_SESSION['allSubj'] = $subjects;
        require "Welcome.php";
    }
}
//header("Location: helloPage.php");
?>