<?php
require "db.php";
if(isset($_POST['login']) && isset($_POST['password'])){
    addStudent($_POST["name"] , $_POST["surname"], $_POST["bday"], $_POST["phone"] , $_POST["email"] , $_POST["speciality"] , $_POST["gr_id"] , $_POST["login"] , $_POST["password"]);
    header("Location: Admin.php");
}
?>
