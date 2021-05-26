<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <h1> Congratulation <?php  echo $_SESSION['username'];?> <br> You are member of our family now</h1>
    <h3>Now we have your Data:</h3>
    <h2><?php $_SESSION['fullname'] ;?></h2>
    <h2><?php echo $_SESSION['username']; ?></h2>
    <h2><?php echo $_SESSION['email']; ?></h2>
    <h2><?php echo $_SESSION['phone']; ?></h2>
    <h2><?php echo $_SESSION['dob'] ;?></h2>
    <h2><?php echo $_SESSION['scn']; ?></h2>
    <?php exit();?>
</body>
</html>
