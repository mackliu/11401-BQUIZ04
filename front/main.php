<?php 
$type=$_GET['type']??0;
$nav='全部商品';

if($type!=0){
    $row=$Type->find($type);
    if($row['big_id']==0){
        $nav=$row['name'];
        $items=$Item->all(['big'=>$type,'sh'=>1]);
    }else{
        $big=$Type->find($row['big_id']);
        $nav=$big['name']." > ".$row['name'];
        $items=$Item->all(['mid'=>$type,'sh'=>1]);
    }

}else{
    $items=$Item->all(['sh'=>1]);
}

?>

<h2><?=$nav;?></h2>

<?php  foreach($items as $item): ?>
<div style="display:flex;width:65%;margin:5px auto;height:150px;">
    <div class="pp ct" style="padding:20px">
        <a href="?do=detail&id=<?=$item['id'];?>">
        <img src="./image/<?=$item['img'];?>" style="width:150px;height:100px;">
        </a>
    </div>
    <div>
        <table style="height:100%;">
            <tr>
                <td class="tt ct"><?=$item['name'];?></td>
            </tr>
            <tr class="pp">
                <td>價錢:<?=$item['price'];?>
                <a href="?do=buycart&id=<?=$item['id'];?>&qt=1">
                <img src="./icon/0402.jpg" style="float:right">
                </a>
            </td>
            </tr>
            <tr class="pp">
                <td>規格:<?=$item['spec'];?></td>
            </tr>
            <tr class="pp">
                <td>
                    簡介:<?=mb_substr($item['intro'],0,20);?>...
                </td>
            </tr>
        </table>
    </div>
</div>





<?php endforeach; ?>
