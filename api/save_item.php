<?php include_once "db.php";

if(!empty($_FILES['img']['tmp_name'])){
    $_POST['img']=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_POST['img']);
}

if(!isset($_POST['id'])){
    $_POST['sh']=1;
    $_POST['no']=rand(100000,999999);
}


$Item->save($_POST);

to("../back.php?do=th");

