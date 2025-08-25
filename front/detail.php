<?php
$item=$Item->find($_GET['id']);
?>

<h2 class="ct"><?=$item['name'];?></h2>
<div style="display:flex;width:80%;margin:5px auto;">
    <div class="pp ct" style="padding:10px;width:65%">
        <a href="?do=detail&id=<?=$item['id'];?>">
        <img src="./image/<?=$item['img'];?>" style="width:100%;height:100%;">
        </a>
    </div>
    <div style="width:35%;">
        <table style="height:100%;">
            <tr>
                <td class="pp">分類：</td>
            </tr>
            <tr class="pp">
                <td>編號:<?=$item['no'];?></td>
            </tr>
            <tr class="pp">
                <td>價錢:<?=$item['price'];?>
            </td>
        </tr>
            <tr class="pp">
                <td>
                    詳細說明:<?=$item['intro'];?>
                </td>
            </tr>
            <tr class="pp">
                <td>
                    庫存:<?=$item['stock'];?>
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="tt ct" style="width:80%;margin:auto;">
    購買數量：
    <input type="number" name="qt" value="1" id="qt">
    <a href="javascript:order(<?=$item['id'];?>)">
        <img src="./icon/0402.jpg" alt="">
    </a>
</div>

<script>
function order(id){
   let qt=$("#qt").val();
   location.href=`?do=buycart&id=${id}&qt=${qt}`;
}
</script>