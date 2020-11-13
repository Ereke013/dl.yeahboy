<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in</title>
    <?php
    require_once "header.php";
    ?>
</head>
<body class="bg-secondary animate-bottom">
<!--<form class="form-signin">-->
    <div class="col-sm-4 offset-4">
        <div class="card"
             style="margin-top: 40%;box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.19);">
            <h3 class="card-header" style="text-align: center">dl.yeahboy.kz </h3>
            <div class="card-body">
                <form action="Authorization.php" method="post">
                    <div class="form-group">
                        <label> Login: </label>
                        <input type="email" name="email" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label> Password: </label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                        <!--                    <a href="Welcome.html"><button class="btn btn-primary" type="submit"> Sign in</button></a>-->
<!--                        <a href="helloPage.php" class="btn btn-secondary float-right"> < Main page</a>-->
                        <!--                    <a href="register.html" class="mr-1 btn btn-success float-right">Sign up</a>-->
                    </div>
                </form>
                <!--            <div class="form-group">-->
                <!--                <a href="#" class="btn btn-secondary"> < Main page</a>-->
                <!--            </div>-->
            </div>
        </div>

    </div>
<!--</form>-->
</body>
</html>
