<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'dl_yeahboy') or die(mysqli_error($mysqli));
if(isset($_POST['update'])){
    $id = $_POST['teacherId'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $level = $_POST['level'];
    $mysqli->query("UPDATE teachers SET name = '$name', surname = '$surname', email = '$email', level = '$level' where id = $id") or die($mysqli->error);
    $_SESSION['message'] = "Record has been updated!!!";
    $_SESSION['msg_type'] = "warning";
    header('location:Admin.php');
}

if(isset($_POST['updateSubj'])){
    $id = $_POST['id'];
    $name = $_POST['nameSubj'];
    $credit = $_POST['credit'];
    $code = $_POST['code'];
    $mysqli->query("UPDATE subjects SET nameOfSubject = '$name', credit = '$credit', code = '$code' where id = $id") or die($mysqli->error);
    $_SESSION['message'] = "Record has been updated!!!";
    $_SESSION['msg_type'] = "warning";
    header('location:Admin.php');
}

if(isset($_POST['updateStudent'])){
    $id = $_POST['studId'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $bday = $_POST['bday'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $speciality = $_POST['speciality'];
    $gr_id = $_POST['gr_id'];
    $mysqli->query("UPDATE students SET name = '$name', surname = '$surname', birthday = '$bday', phoneNumber = '$phone', email='$email', speciality = '$speciality', group_id = $gr_id where id = $id") or die($mysqli->error);
    $_SESSION['message'] = "Record has been updated!!!";
    $_SESSION['msg_type'] = "warning";
    header('location:Admin.php');
}

if(isset($_POST['AddStud'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $bday = $_POST['bday'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $speciality = $_POST['speciality'];
    $gr_id = $_POST['gr_id'];
    $login = $_POST['login'];
    $password = $_POST['password'];


    $mysqli->query("INSERT INTO students (name,surname,birthday,phoneNumber,email,speciality,group_id,login,password) 
VALUES ('$name', '$surname', $bday, '$phone', '$email', '$speciality', $gr_id, '$login', '$password')") or die($mysqli->error);
    $_SESSION['message'] = "Record has been updated!!!";
    $_SESSION['msg_type'] = "warning";
    header('location:Admin.php');
}

//require "db.php";
//if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['level']) && isset($_POST['email']) && isset($_POST['teacherId'])) {
//
//    $_SESSION['name'] = $_POST['name'];
//    $_SESSION['surname'] = $_POST['surname'];
//    $_SESSION['level'] =$_POST['level'];
//    $_SESSION['email'] = $_POST['email'];
//    $_SESSION['teachID'] = $_POST['teacherId'];
//    if(saveTeachers($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['level'], $_POST['id'])) {
//        header("Location:success.php");
//    }
//    else{
//        header("Location:SignIn.php");
//    }
//}
//else{
//    header("Location:error.php");
//}
?>
