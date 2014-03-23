<?php 
session_start();
include("database.php");
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
            <a class="btn btn-primary btn-lg btn-block" href="<?php if(isset($_SESSION["login"])&&$_SESSION["login"]){echo "test.php"; }else{echo "sure.php";} ?>" >開始挑戰</a>
            <div class="row">
                <div class="col-md-8">
                    <h2>我的資料</h2>
                    <?php if(!isset($_SESSION["login"])||($_SESSION["login"]!==true)){
                        echo '<a href="login.php" class="btn btn-info">立刻登入</a>  <a href="reg.php" class="btn btn-success">還沒帳號，註冊一個吧</a>';
                    }else{
                        $rate=$db->select("user",array("id"=>$_SESSION["userid"]));
                        echo '<p class="lead">';
                        echo "總共測驗題數：".$rate[0]["test_total"]."</br>";
                        echo "正確題數：".$rate[0]["test_correct"]."</br>";
                        echo "正確率：".($rate[0]["test_correct_rate"]*100)." %</br>";
                        echo '</p>';
                        echo '<a href="logout.php" class="btn btn-warning">登出</a>';
                    } ?>
                </div>
                <div class="col-md-4">
                    <h2>最高正確率排名</h2>
                    <p class="lead">
                    <?php
                    $res=$db->select("user",'','test_correct_rate DESC',10);
                    if($res[0]["id"]!=NULL){
                        $a=count($res);
                        for($i=0;$i<$a;$i++){
                            echo $res[$i]["id"]." ： ".($res[$i]["test_correct_rate"]*100)."% </br>";
                        }
                    }
                    ?>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>