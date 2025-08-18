<h2 class="ct">會員管理</h2>
<table class="all">
    <tr class="tt ct">
        <td>姓名</td>
        <td>會員帳號</td>
        <td>註冊日期</td>
        <td>操作</td>
    </tr>
    <?php 
    $mems=$User->all();
    foreach($mems as $mem):
    ?>
    <tr class="pp ct">
        <td><?=$mem['name'];?></td>
        <td><?=$mem['acc'];?></td>
        <td><?=$mem['regdate'];?></td>
        <td>
            <button class='edit-btn' data-id="<?=$mem['id'];?>">修改</button>
            <button class="del-btn" data-id="<?=$mem['id'];?>">刪除</button>
        </td>
    </tr>
    <?php
    endforeach;
    ?>
</table>


<script>
$(".del-btn").on("click",function(){
    let id=$(this).data("id");
    if(confirm(`確定要刪除這筆會員資料嗎?`)){
        $.post("./api/del.php",{id,table:'User'},()=>{
            location.reload();
        })
    }
})


$(".edit-btn").on("click",function(){
    let id=$(this).data("id");
    location.href='?do=edit_user&id='+id;
})
</script>