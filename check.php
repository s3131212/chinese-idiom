<?php session_start();
include("database.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <style>.bold {font-weight:900;color:red;} p{font-size:20px;}</style>
        <title>測驗結果 - 成語革命</title>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center" style="font-size:60px; margin-bottom:40px;">成語革命</h1>
<?php 
echo "<table class='table'><thead><td>題目</td><td>答題狀況</td><td>正確答案</td><td>您的答案</td></thead>";
$w=0;
for( $i = 0 ; $i < 25 ; $i++){
    $a="ans".$i;
    $k="w".$i;
    $b=$i+1;
    if((htmlspecialchars($_POST[$i])==$_POST[$a])&&($_POST[$i]!=NULL)){
        echo "<tr><td>第".$b."題</td><td>正確</td><td>".$_POST[$k]."</td><td>".htmlspecialchars($_POST[$i])."</td></tr>";
        $w++;
    }elseif($_POST[$i]!=NULL){
        echo "<tr class='warning'><td>第".$b."題</td><td>錯誤</td><td>".$_POST[$k]."</td><td>".htmlspecialchars($_POST[$i])."</td></tr>";
    }else{
    	echo "<tr class='danger'><td>第".$b."題</td><td>錯誤</td><td>".$_POST[$k]."</td><td>您未輸入任何答案</td></tr>";
    }
}
if(isset($_GET["n"])&&($_POST["n"]!="1")){
$res=$db->select("user",array("id"=>$_SESSION["userid"]));
$total=$res[0]["test_total"]+25;
$correct=$res[0]["test_correct"]+$w;
$correct_rate=round(($correct/$total),2);
$db->update("user", array("test_total"=>$total,"test_correct"=>$correct,"test_correct_rate"=>$correct_rate), array("id"=>$_SESSION["userid"]));
}
?>
</table>
<?php
echo "<p>您共花了<span class=\"bold\">".(strtotime("now")-$_SESSION["time"])."</span>秒，答對<span class=\"bold\"> $w </span>題，<span class=\"bold\">".($w*4)."</span>分</p>";
?>
<a href="index.php" class="btn btn-default">回到首頁</a></br>
</div></br></br></body></html>