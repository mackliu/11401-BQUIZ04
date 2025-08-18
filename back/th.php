<h2 class="ct">商品分類</h2>
<!-- div.ct>input:text+button -->
<div class="ct">
    新增大分類
    <input type="text" name="big" id="big">
    <button onclick="addBig()">新增</button>
</div>
<!-- div.ct>select+input:text+button -->
 <div class="ct">
    新增中分類
    <select name="selBig" id="selBig"></select>
    <input type="text" name="mid" id="mid">
    <button onclick="addMid()">新增</button>
</div>

<!-- table.all>(tr.tt>td+td.ct>button*2) -->
 <table class="all">
    <?php 
    $bigs=$Type->all(['big_id'=>0]);
    foreach($bigs as $big):
    ?>
    <tr class="tt">
        <td><?=$big['name'];?></td>
        <td class="ct">
            <button class="edit-btn" data-id="<?=$big['id'];?>">修改</button>
            <button class='del-btn' data-id="<?=$big['id'];?>">刪除</button>
        </td>
    </tr>
    <?php 
    if($Type->count(['big_id'=>$big['id']])>0):
        $mids=$Type->all(['big_id'=>$big['id']]);
        foreach($mids as $mid):
    ?>
    <tr class="pp ct">
        <td><?=$mid['name'];?></td>
        <td>
            <button class="edit-btn" data-id="<?=$mid['id'];?>">修改</button>
            <button class="del-btn" data-id="<?=$mid['id'];?>">刪除</button>
        </td>
    </tr>
    <?php
    endforeach;
    endif;
    endforeach;

    ?>
 </table>

 <script>
getBigs();    
function addBig(){
    let name=$("#big").val();
    $.post("./api/save_type.php",{name,big_id:0},()=>{
        $("#big").val("");
        getBigs();
    })
}    
function addMid(){
    let name=$("#mid").val();
    let big_id=$("#selBig").val();
    $.post("./api/save_type.php",{name,big_id},()=>{
        location.reload()
        
    })
}    

function getBigs(){
    $.get("./api/get_bigs.php",(options)=>{
        $("#selBig").html(options);
    })
}

$(".del-btn").on("click",function(){
    let id=$(this).data("id");
    if(confirm(`確定要刪除這筆分類資料嗎?`)){
        $.post("./api/del.php",{id,table:'Type'},()=>{
            location.reload();
        })
    }
})

$(".edit-btn").on("click",function(){
    let id=$(this).data("id");
    let name=$(this).parent().prev().text();
    let newName=prompt("請輸入新的分類名稱",name);
    if(newName != null){
        $.post("./api/save_type.php",{id,name:newName},()=>{
            $(this).parent().prev().text(newName);
            //location.reload();
        })
    }

})

 </script>

<h2 class="ct">商品管理</h2>
<div class="ct">
    <button onclick="location.href='?do=add_item'">新增商品</button>
</div>
 <table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <tr class="pp ct">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <button>修改</button>
            <button>刪除</button>
            <button>上架</button>
            <button>下架</button>
        </td>
    </tr>
 </table>