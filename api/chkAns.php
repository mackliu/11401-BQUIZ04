<?php include_once "db.php";

if(strtolower($_GET['chk']) == strtolower($_SESSION['ans'])){
    echo 1;
}else{
    echo 0;
}
