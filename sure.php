<?php 
session_start();
include("database.php");
if(isset($_SESSION["login"])&&$_SESSION["login"]) header("location:test.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <title>成語革命</title>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center" style="font-size:60px; margin-bottom:40px;">成語革命</h1>
            <p class="lead">您好，由於您尚未登入帳號，請問您是否要登入帳號，或是以不記名不計分的方式進行測驗？</p>
            <a class="btn btn-default" href="login.php">登入</a>  <a class="btn btn-default" href="test.php?n=1">不計分測驗</a>
        </div>
    </body>
</html>