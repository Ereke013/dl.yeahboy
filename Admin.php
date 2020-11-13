<?php
require "db.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <?php
    require_once "header.php";
    ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light"
     style="box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.19);">
    <a class="navbar-brand ml-5" href="Admin.php">dl.yeahboy.kz</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button"
                   data-toggle="dropdown">
                    Русский(ru)
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Русский(ru)</a>
                    <a class="dropdown-item" href="#">English(en)</a>
                    <a class="dropdown-item" href="#">Қазақша(kk)</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 mr-5">
            <!--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
            <!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
            <ul class="navbar-nav mr-auto mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                        <img src="https://dl.iitu.kz/theme/image.php/classic/core/1602665137/u/f2"
                             width="35" height="35" aria-hidden="true">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <div class="card">
                            <div class="list-group list-group-flush">
                                <a href="helloPage.php" class="list-group-item">Exit</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </form>
    </div>
</nav>


<div class="container ">
    <div class="row mt-5">
        <div class="col-6 offset-3">
            <form method="post">
                <div class="d-flex">
                <select class="form-control" name="search">
                    <option value="1">Teachers</option>
                    <option value="2">Subjects</option>
                    <option value="3">Students</option>
                    <option value="4">Teach</option>
                </select>
                <button class="btn btn-primary ml-3">Search</button>
                </div>
            </form>
        </div>
    </div>

    <?php

    $select = 1;
    if(isset($_POST['search'])){
        $select = $_POST['search'];
    }
    if( $select == 1){
    ?>
    <div class="row mt-5 text-center">
        <h1 style="margin-left: auto;margin-right: auto">Teachers</h1>
    </div>
    <div class="row mt-2 text-center">
        <button type="button" class="btn btn-primary" style="" data-toggle="modal"
                data-target="#staticBackdrop">
            +ADD NEW
        </button>
    </div>
    <div class="row mt-4">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>SURNAME</th>
                    <th>EMAIL</th>
                    <th>LEVEL</th>
                    <th>DETAILS</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $teachers = getAllTeachers();
                if ($teachers != null) {
                    foreach ($teachers as $tch) {
                        ?>
                        <tr>
                            <td><?php echo $tch['id']; ?></td>
                            <td><?php echo $tch['name'] ?></td>
                            <td><?php echo $tch['surname'] ?></td>
                            <td><?php echo $tch['email']; ?></td>
                            <td><?php echo $tch['level']; ?></td>
                            <td><a href="detailsTeacher.php?id=<?php echo $tch['id'] ?>" class="btn btn-info btn-sm">DETAILS</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<form action="addTeacher.php" method="post">
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">New Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Surname:</label>
                        <input type="text" name="surname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Level:</label>
                        <input type="text" name="level" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Teacher</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
    }
    else if($select==2){
    ?>

<div class="container ">
    <div class="row mt-5 text-center">
        <h1 style="margin-left: auto;margin-right: auto">Subjects</h1>
    </div>
    <div class="row mt-2 text-center">
        <button type="button" class="btn btn-primary" style="" data-toggle="modal"
                data-target="#staticBackdrop">
            +ADD NEW
        </button>
    </div>
    <div class="row mt-4">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME OF SUBJECT</th>
                    <th>CREDIT</th>
                    <th>CODE</th>
                    <th>DETAILS</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $subjects = getAllSubjects();
                if ($subjects != null) {
                    foreach ($subjects as $subject) {
                        ?>
                        <tr>
                            <td><?php echo $subject['id']; ?></td>
                            <td><?php echo $subject['nameOfSubject'] ?></td>
                            <td><?php echo $subject['credit'] ?></td>
                            <td><?php echo $subject['code']; ?></td>
                            <td><a href="detailsSubject.php?id=<?php echo $subject['id'] ?>"
                                   class="btn btn-info btn-sm">DETAILS</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<form action="addSubject.php" method="post">
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">New Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name of subject:</label>
                        <input type="text" name="subjectName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Credit:</label>
                        <input type="number" name="credit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Code:</label>
                        <input type="text" name="code" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Subject</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
}
    else if($select==3){
?>
<div class="container ">
    <div class="row mt-5 text-center">
        <h1 style="margin-left: auto;margin-right: auto">Students</h1>
    </div>
    <div class="row mt-2 text-center">
        <button type="button" class="btn btn-primary" style="" data-toggle="modal"
                data-target="#staticBackdrop">
            +ADD NEW
        </button>
    </div>
    <div class="row mt-4">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>FULL NAME</th>
                    <th>BIRTHDAY</th>
                    <th>PHONE NUMBERS</th>
                    <th>EMAIL</th>
                    <th>SPECIALITY</th>
                    <th>GROUP</th>
                    <th>DETAILS</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $students = getAllStudents();
                if ($students != null) {
                    foreach ($students as $student) {
                        ?>
                        <tr>
                            <td><?php echo $student['id']; ?></td>
                            <td><?php echo $student['name'] ." ". $student['surname'] ?></td>
                            <td><?php echo $student['birthday'] ?></td>
                            <td><?php echo $student['phoneNumber']; ?></td>
                            <td><?php echo $student['email']; ?></td>
                            <td><?php echo $student['speciality']; ?></td>
                            <td><?php echo $student['group_name']; ?></td>
                            <td><a href="detailsStudent.php?id=<?php echo $student['id'] ?>"
                                   class="btn btn-info btn-sm">DETAILS</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<form action="save.php" method="post">
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Surname:</label>
                        <input type="text" name="surname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Birthday:</label>
                        <input type="date" name="bday" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Phone Number:</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Speciality:</label>
                        <input type="text" name="speciality" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Group:</label>
                        <select class="form-control" name="gr_id">
                            <?php
                                $groups = getAllGroups();
                                if($groups!=null){
                                    foreach ($groups as $group){

                            ?>
                            <option value="<?php echo $group['id'] ?>"><?php echo $group['group_name']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Login:</label>
                        <input type="text" name="login" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="text" name="password" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name = "AddStud" class="btn btn-primary">Add Student</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php }
else if($select==4){
?>
<div class="container ">
    <div class="row mt-5 text-center">
        <h1 style="margin-left: auto;margin-right: auto">Teach</h1>
    </div>
    <div class="row mt-2 text-center">
        <button type="button" class="btn btn-primary" style="" data-toggle="modal"
                data-target="#staticBackdrop">
            +ADD NEW
        </button>
    </div>
    <div class="row mt-4">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Teacher FULL NAME</th>
                    <th>Subject Name</th>
                    <th>DETAILS</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $teach = getAllTeach();
                if ($teach != null) {
                    foreach ($teach as $tch) {
                        ?>
                        <tr>
                            <td><?php echo $tch['id']; ?></td>
                            <td><?php echo $tch['name'] ." ". $tch['surname'] ?></td>
                            <td><?php echo $tch['nameOfSubject'] ?></td>
                            <td><a href="detailsTeach.php?id=<?php echo $tch['id'] ?>"
                                   class="btn btn-info btn-sm">DETAILS</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<form action="addTeach.php" method="post">
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Teacher:</label>
                        <select class="form-control" name="teacherID">
                            <?php
                            $teachers = getAllTeachers();
                            if($teachers!=null){
                                foreach ($teachers as $teacher){

                                    ?>
                                    <option value="<?php echo $teacher['id'] ?>"><?php echo $teacher['name'] ." ". $teacher['surname'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Subject:</label>
                        <select class="form-control" name="subjID">
                            <?php
                            $subjects = getAllSubjects();
                            if($subjects!=null){
                                foreach ($subjects as $subject){

                                    ?>
                                    <option value="<?php echo $subject['id'] ?>"><?php echo $subject['nameOfSubject'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Student</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php }?>

</body>
</html>
