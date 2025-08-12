<?php include_once "db.php";

$_POST['regdate']=date("Y-m-d");
$User->save($_POST);
