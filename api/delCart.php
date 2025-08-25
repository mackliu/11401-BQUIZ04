<?php
include_once "db.php";

$id=$_POST['id'];
unset($_SESSION['cart'][$id]);


?>