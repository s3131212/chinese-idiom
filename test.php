<?php session_start();
include("database.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <title>開始測驗 - 成語革命</title>
        <script>
        function cheat(){
            for(i=0;i<25;i++){
             document.getElementById(i).setAttribute('value',document.getElementById('ans'+i).attributes['value'].value);
            }
            console.log("由Tingyu協助");
        }
        </script>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center" style="font-size:60px; margin-bottom:40px;">成語革命</h1>
<?php
$_SESSION["time"]=0;//重設計時器
echo '<form method="post" action="check.php" role="form"><table class="table">';
if(isset($_GET["n"])&&(!isset($_SESSION["login"]))&&($_GET["n"]=="1")) echo "<input id=\"n\" name=\"n\" type=\"hidden\" value=\"1\" />";
$res=$db->select("idiom","","rand()","50");
$i = 0;
while($i < 25){
    //$res=$db->select("idiom",array('id'=>$value));
    while(mb_strlen($res[$i]["phrase"],'UTF-8')<4){
        $k=50-$i;
        $res[$i]["phrase"]=$res[$k]["phrase"];
    }
    echo "<tr><td>";
    $phrase=$res[$i]["phrase"];
    $value=rand(1,4);
    switch ($value) {
        case '1':
            echo ' ？ '.mb_substr($phrase,1,10,"UTF-8");  
            $ans=mb_substr($phrase, 0, 1,"UTF-8");
            break;
        case '2':
            echo mb_substr($phrase, 0, 1,"UTF-8") .' ？ '. mb_substr($phrase, 2,10,"UTF-8");
            $ans=mb_substr($phrase, 1, 1,"UTF-8");
            break;
        case '3':
            echo mb_substr($phrase, 0, 2,"UTF-8") .' ？ '. mb_substr($phrase, 3,10,"UTF-8");
            $ans=mb_substr($phrase, 2, 1,"UTF-8");
            break;
        case '4':
            echo mb_substr($phrase, 0, 3,"UTF-8") .' ？ ';
            $ans=mb_substr($phrase, 3, 1,"UTF-8");
            break;
        default:
            echo "Error";
            break;
    }

    echo "</td><td><input id=\"$i\" name=\"$i\" type=\"text\" class=\"form-control\" /><input id=\"id$i\" name=\"".$res[$i]["id"]."\" type=\"hidden\" value=\"".$res[$i]["id"]."\" /><input id=\"ans$i\" name=\"ans$i\" type=\"hidden\" value=\"$ans\" /><input id=\"w$i\" name=\"w$i\" type=\"hidden\" value=\"$phrase\" /></td></tr>";
    $i++;
}
echo '</table><input type="submit" value="送出答案" class="btn btn-default" /> <a class="btn btn-default" onclick="cheat()">啟動作弊</a>  <a href="index.php" class="btn btn-link">取消測驗，回到首頁</a></br></form></br></br></br>';
$_SESSION["time"]=strtotime("now");
?>
        </div>
    </body>
</html>
