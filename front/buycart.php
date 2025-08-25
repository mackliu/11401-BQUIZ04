<?php
 
if(isset($_GET['id'])){
    $_SESSION['cart'][$_GET['id']]=$_GET['qt'];
}

if(!isset($_SESSION['login'])){
    to("?do=login");
}
?>



<h2 class="ct"><?=$_SESSION['login'];?>的購物車</h2>

<?php
if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
    dd($_SESSION['cart']);
}else{
    
    echo "購物車是空的";
}    
    

?>