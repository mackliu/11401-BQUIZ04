<?php include_once "db.php";

$chk=$User->count($_GET);

if($chk){
    echo 1;
    $_SESSION['login']=$_GET['acc'];
}else{
    echo 0;
}