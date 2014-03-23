<?php
include("sql.class.php");
//include('config.php');

//資料庫名稱
$config['sql']['dbname'] = '   ';
//MySQL用戶名
$config['sql']['username'] = '   ';
//MySQL密碼
$config['sql']['password'] = '   ';
//MySQL伺服器
$config['sql']['host'] = '   ';

$db = new MySQL($config['sql']['dbname'], $config['sql']['username'], $config['sql']['password'], $config['sql']['host']);
$GLOBALS['db'] = $db;