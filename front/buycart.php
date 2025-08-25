<?php 
if(!isset($_SESSION['login'])){
    to("?do=login");
}
?>



<h2 class="ct"><?=$_SESSION['login'];?>的購物車</h2>