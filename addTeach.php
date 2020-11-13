<?php
require "db.php";
addTeach($_POST['teacherID'], $_POST['subjID']);
header("Location:success.php");
?>