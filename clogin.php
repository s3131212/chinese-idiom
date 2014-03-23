<?php 
session_start();
include("database.php");
$res=$db->select("user",array('id'=>$_POST["id"]));
if ($res[0]["pass"]==md5($_POST["pass"])) {
	$_SESSION["login"]=true;
	$_SESSION["userid"]=$_POST["id"];
	header("location:index.php");
}else{
	header("location:login.php?s=1");
}
