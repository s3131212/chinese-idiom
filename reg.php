<?php 
session_start();
include("database.php");
if(isset($_SESSION["login"])&&$_SESSION["login"]) header("location:index.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <title>註冊 - 成語革命</title>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center" style="font-size:60px; margin-bottom:40px;">成語革命</h1>
            <p class="lead">
            <?php 
            if(isset($_GET["s"])&&($_GET["s"]=="1")) echo '<div class="alert alert-warning" style="font-size:20px;">帳號或密碼不可為空白</div>';
            if(isset($_GET["s"])&&($_GET["s"]=="2")) echo '<div class="alert alert-warning" style="font-size:20px;">帳號已存在</div>';
            if(isset($_GET["s"])&&($_GET["s"]=="3")) echo '<div class="alert alert-success" style="font-size:20px;">註冊完成，<a href="login.php">點此登入</a></div>';
            if(isset($_GET["s"])&&($_GET["s"]=="4")) echo '<div class="alert alert-warning" style="font-size:20px;">兩次輸入的密碼不同</div>';
            ?>
            <h2>註冊帳號</h2>
            <form action="creg.php" method="post" role="form">
                <div class="input-group input-group-lg">
                    <span class="input-group-addon">帳號</span>
                    <input type="text" required class="form-control input-lg" id="id" name="id" placeholder="帳號">
                </div></br>

                <div class="input-group input-group-lg">
                    <span class="input-group-addon">密碼</span>
                    <input type="password" required class="form-control input-lg" id="pass" name="pass" placeholder="密碼">
                </div></br>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon">重新輸入密碼</span>
                    <input type="password" required class="form-control input-lg" id="pass2" name="pass2" placeholder="密碼">
                </div></br>
                <input type="submit" value="註冊" class="btn btn-info" />  <a href="index.php" class="btn btn-default">回到首頁</a>
            </form></p>
        </div>
    </body>
</html>