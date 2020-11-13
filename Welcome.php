<?php
session_start();
$name = $_SESSION['name'];
$surname = $_SESSION['surname'];
require_once "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <?php
    require_once "header.php";
    ?>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light"
     style="box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.19);">
    <a class="navbar-brand ml-5" href="Welcome.php">dl.yeahboy.kz</a>

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
                        <?php echo $name  ." ". $surname?>
                        <img src="https://dl.iitu.kz/theme/image.php/classic/core/1602665137/u/f2"
                             width="35" height="35" aria-hidden="true">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <div class="card">
                            <div class="list-group list-group-flush">
                                <a href="MyProfile.php" class="list-group-item">My profile</a>
                                <a href="#" class="list-group-item">My mark</a>
                                <a href="#" class="list-group-item">Settings</a>
                                <a href="helloPage.php" class="list-group-item">Exit</a>
                            </div>

                        </div>
                    </div>
                </li>
            </ul>
        </form>
    </div>
</nav>

<div class="m-3">
    <div class="card">
        <div class="card-body">
            <p class="card-title" style="font-size: 35px">dl.yeahboy.kz</p>
            <a class="card-text" href="Welcome.php">В начало</a>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm-2 mt-3">
            <div class="card">
                <div class="card-body">
                    <p class="card-title" style="font-size: 20px"> Навигация</p>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#" aria-current="page">В начало</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-sm-10 mt-3 d-flex flex-column">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex" style="">
                        <label class="mr-2 mt-1"> Search subject</label>
                        <input class="form-control col-sm-2" type="text" size="12" value="">
                        <button class="btn btn-secondary ml-2" type="submit">Search</button>
                    </div>
                    <label class="mt-5" style="font-size: 35px;">Мои Курсы</label>

                        <?php
                        $subjects = getAllSubjectsByID($_SESSION["id"]);
//                        $subjects = $_SESSION['allSubj'];
                        if($subjects!=null) {
                            $n = 1;
                            foreach ($subjects as $em){
                                if($n%2!=0) {

                                    ?>
                                    <div class="clearfix p-2">
                                    <div class="info"><h3 class="coursename"><a class=""
                                                                                href="subjects.html"><?php echo $em['nameOfSubject'] . "(" . $em['code'] . ")" ?> 2020-2021/1</a>
                                        </h3>
                                    </div>
                                        <div class="content">
                                            <ul>
                                                <li>Teacher: <a href="#"><?php echo $em['name'] . " " . $em['surname'] ?></a></li>
                                        </div>

                                    </div>
                                    <?php
                                }
                                else{

                                    ?>
                                    <div class="clearfix p-2" style="background-color: #F2F2F2">
                                        <div class="info"><h3 class="coursename"><a class=""
                                                                                    href="subjects.html"><?php echo $em['nameOfSubject'] . "(" . $em['code'] . ")" ?> 2020-2021/1</a>
                                            </h3>
                                        </div>
                                        <div class="content">
                                            <ul>
                                                <li>Teacher: <a href="#"><?php echo $em['name'] . " " . $em['surname'] ?> </a></li>
                                        </div>
                                     </div>
                        <?php
                                }
                                $n++;
                            }
                        }

                        ?>

<!--                    </div>-->
<!--                    <div class="clearfix p-2">-->
<!--                        <div class="info"><h3 class="coursename"><a class="" href="subjects.html">11645-->
<!--                                    OperatIng Systems (Сапакова С.З.) 2020-2021/1</a></h3>-->
<!--                        </div>-->
<!--                        <div class="content">-->
<!--                            <ul>-->
<!--                                <li>Teacher: <a href="#">Zhansaya-->
<!--                                        Bekaulova</a></li>-->
<!--                                <li>Teacher: <a href="#">Saya-->
<!--                                        Sapakova</a></li>-->
<!--                                <li>Teacher: <a href="#">Karakoz-->
<!--                                        Teshebayeva</a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="clearfix p-2" style="background-color: #F2F2F2">-->
<!--                        <div class="info"><h3 class="coursename"><a class="" href="#">11647 Web-technologIes (Мукажанов-->
<!--                                    Н.К.) 2020-2021/1</a></h3>-->
<!--                        </div>-->
<!--                        <div class="content">-->
<!--                            <ul>-->
<!--                                <li>Teacher: <a href="#">Nursultan Alpysbay</a></li>-->
<!--                                <li>Teacher: <a href="#">Nurzhan Mukazhanov</a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="clearfix p-2">-->
<!--                        <div class="info"><h3 class="coursename"><a class="" href="#">11667 ArchItecture and-->
<!--                                    OrganIzatIon of Computer Systems (Coursera КИИБ) 2020-2021/1</a></h3>-->
<!--                        </div>-->
<!--                        <div class="content">-->
<!--                            <ul>-->
<!--                                <li>Teacher: <a href="#">Madina Ipalakova</a></li>-->
<!--                                <li>Teacher: <a href="#">Nurgul Nalgozhina</a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>

    </div>
</div>

<footer style="background-color: #383d41">
    <div class="footer-copyright text-center py-3">
        <p style="color: #ffffff">Copyright: <i class="far fa-copyright"></i> dl.yeahboy.kz 2020</p>
    </div>
</footer>

</body>
</html>
