<?php
if($_SERVER['REQUEST_METHOD']==='POST') {
    if(isset($_POST['id'])) {
        require_once "db.php";
        if(deleteTeacher($_POST['id'])){
            header("Location:success.php");
        }
        else
            header("Location:error.php");

    }
//    header("Location:adminEmployers.php");
}
?>
