<?php include_once "db.php";
$table=$_GET['table'];
unset($_GET['table']);

$chk=$$table->count($_GET);

if($chk){
    echo 1;
    switch($table){
        case 'User':
            $_SESSION['login']=$_GET['acc'];
            break;
        case 'Admin':
            $_SESSION['admin']=$_GET['acc'];
            break;
    }
    
}else{
    echo 0;
}