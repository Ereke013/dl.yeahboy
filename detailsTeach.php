<?php
require "db.php";

if (isset($_GET['id'])) {
    $teach = getTeachById($_GET['id']);
    if ($teach != null) {

        ?>

        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            <?php require "header.php" ?>
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
        <div class="container">
            <div class="col-sm-6 mt-4 offset-1">
                <form action="save.php" method="post">
                    <input type="hidden" name="teachId" value="<?php echo $teach['id'] ?>">
                    <div class="form-group">
                        <label>Teacher:</label>
                        <select class="form-control" name="teacher_id">
                            <?php
                            $teachers = getAllTeachers();
                            if($teachers!=null){
                                foreach ($teachers as $teacher){

                                    ?>
                                    <option value="<?php echo $teacher['id'] ?>" <?php echo ($teach['teacherID']==$teacher['id'])? 'selected':'' ?> ><?php echo $teacher['name'] .' '.$teacher['surname']  ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Subject:</label>
                        <select class="form-control" name="subj_id">
                            <?php
                            $subjects = getAllSubjects();
                            if($subjects!=null){
                                foreach ($subjects as $subj){

                                    ?>
                                    <option value="<?php echo $subj['id'] ?>" <?php echo ($teach['subID']==$subj['id'])? 'selected':'' ?> ><?php echo $subj['nameOfSubject'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
<!--                    <div class="form-group">-->
<!--                        <label>Surname:</label>-->
<!--                        <input class="form-control" name="surname" type="text"-->
<!--                               value="--><?php //echo $teach['surname'] ?><!--">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label>Email:</label>-->
<!--                        <input class="form-control" name="email" type="email" value="--><?php //echo $teach['nameOfSubject'] ?><!--">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label>Level:</label>-->
<!--                        <input class="form-control" name="level" type="text" value="--><?php //echo $teach['level'] ?><!--">-->
<!--                    </div>-->
                    <div>
                        <button type="submit" name="updateTeach" class="btn btn-success btn-sm">SAVE</button>
                        <button type="button" onclick="deletePost(<?php echo $teach['id'] ?>)"
                                class="btn btn-danger float-right btn-sm" data-toggle="modal"
                                data-target="#exampleModal">
                            DELETE
                        </button>
                    </div>
                </form>

            </div>
        </div>
        <form action="deleteTeacher.php" method="post" id="deleteModal">
            <input type="hidden" name="id" id="deleteId">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                            <button type="submit" class="btn btn-danger">YES</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script type="text/javascript">
            const deletePost = (id) => {
                document.getElementById("deleteId").value = id;
            }
        </script>
        </body>
        </html>
        <?php
    }
}
?>