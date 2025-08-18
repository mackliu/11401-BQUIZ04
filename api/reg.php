<?php include_once "db.php";

if(!isset($_POST['id'])){
    $_POST['regdate']=date("Y-m-d");
}
$User->save($_POST);
