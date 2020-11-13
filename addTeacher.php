<?php
require "db.php";
    addTeacher($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['level']);
    header("Location:Admin.php");
?>
