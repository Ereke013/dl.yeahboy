<?php
require "db.php";
addSubject($_POST['subjectName'], $_POST['credit'], $_POST['code']);
header("Location:Admin.php");
?>
