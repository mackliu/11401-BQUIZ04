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
?>

<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>
    <?php
    foreach($_SESSION['cart'] as $id => $qt):
        $item=$Item->find($id);
    ?>
    <tr class="pp ct">
        
        <td><?=$item['no'];?></td>
        <td><?=$item['name'];?></td>
        <td><?=$qt;?></td>
        <td><?=$item['stock'];?></td>
        <td><?=$item['price'];?></td>
        <td><?=$item['price']*$qt;?></td>
        <td>
            <img src="./icon/0415.jpg" class='del-btn' data-id="<?=$id;?>">
        </td>
    </tr>
    <?php 
    endforeach;
    ?>
</table>


<div  class='ct'>
    <a href="index.php">
        <img src="./icon/0411.jpg" alt="">
    </a>
    <a href="?do=checkout">
        <img src="./icon/0412.jpg" alt="">
    </a>
</div>

<?php    
}else{
    
    echo "購物車是空的";
}    
    

?>


<script>
$(".del-btn").on("click",function(){
    let id=$(this).data("id");
    $.post("./api/delCart.php",{id},()=>{
        location.reload();
    })
})
</script>