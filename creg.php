<?php
session_start();
include("database.php");
if($_SESSION["login"]) header("location:index.php");
$res=$db->select("user",array('id'=>$_POST["id"]));
if (($res[0]["id"]==NULL)&&($_POST["id"]!=NULL)&&($_POST["pass"]!=NULL)&&($_POST["pass2"]!=NULL)&&($_POST["pass"]==$_POST["pass2"])) {
    $db->insert(array('id'=>htmlspecialchars($_POST["id"]),'pass'=>md5(htmlspecialchars($_POST["pass"]))),"user");
    header("location:reg.php?s=3");
}elseif(($_POST["id"]==NULL)||($_POST["pass"]==NULL||$_POST["pass2"]==NULL)){
    header("location:reg.php?s=1");
}elseif($_POST["pass"]!=$_POST["pass2"]){
	header("location:reg.php?s=4");
}elseif($res[0]["id"]!=NULL){
    header("location:reg.php?s=2");
}