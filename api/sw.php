<?php include_once "db.php";


$item=$Item->find($_POST['id']);
$item['sh']=$_POST['sh'];
$Item->save($item);