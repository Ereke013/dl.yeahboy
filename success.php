<?php
session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Success</title>
</head>
<body>
<h1> SUCCESS ADD</h1>
<h1><?php echo $_SESSION['name'] ?></h1>
<h1><?php echo  $_SESSION['surname'] ?></h1>
<h1><?php echo $_SESSION['level'] ?></h1>
<h1><?php echo $_SESSION['email'] ?></h1>
<h1><?php echo  $_SESSION['teachID'] ?></h1>

</body>
</html>
