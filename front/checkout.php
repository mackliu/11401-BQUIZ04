<?php 
$user=$User->find(['acc'=>$_SESSION['login']]);

?>

<h2 class="ct">填寫資料</h2>
<form action="./api/save_order.php" method="post" id="orderForm">
    <table class="all">
        <tr>
            <td class="tt ct">登入帳號</td>
            <td class="pp"><?=$user['acc'];?></td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" name="name" id="name" value="<?=$user['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="text" name="email" id="email" value="<?=$user['email'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">聯絡地址</td>
            <td class="pp"><input type="text" name="addr" id="addr" value="<?=$user['addr'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">聯絡電話</td>
            <td class="pp"><input type="text" name="tel" id="tel" value="<?=$user['tel'];?>"></td>
        </tr>
    </table>
    <table class="all">
        <tr class="tt ct">
            <td>商品名稱</td>
            <td>編號</td>
            <td>數量</td>
            <td>單價</td>
            <td>小計</td>
        </tr>
        <?php
        $sum=0;
        foreach($_SESSION['cart'] as $id => $qt):
            $item=$Item->find($id);
        ?>
        <tr class="pp ct">
            <td><?=$item['name'];?></td>
            <td><?=$item['no'];?></td>
            <td><?=$qt;?></td>
            <td><?=$item['price'];?></td>
            <td><?=$item['price']*$qt;?></td>
        </tr>
        <?php
            $sum+=$item['price']*$qt;
        endforeach;
        ?>
    </table>
    <div class="all tt ct">總價:<?=$sum;?></div>
    <input type="hidden" name="total" value="<?=$sum;?>">
    <div class="ct">
        <!-- <input type="button" value="確定送出" onclick="submitForm()"> -->
        <input type="submit" value="確定送出">
        <input type="button" value="返回修改訂單" onclick="location.href='?do=buycart'">
    </div>
</form>

<script>

$("#orderForm").on("submit",function(e){
    e.preventDefault();
    alert("訂購成功\n感謝你的選購")
    $("#orderForm").submit();
})
    
/* function submitForm(){
    alert("訂購成功\n感謝你的選購")
    $("#orderForm").submit();
} */


</script>