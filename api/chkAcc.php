<?php include_once "db.php";

echo $User->count(['acc'=>$_GET['acc']]);

/* $chk=$User->count(['acc'=>$_GET['acc']]);

if($chk){
    echo 1;
}else{
    echo 0;
} */