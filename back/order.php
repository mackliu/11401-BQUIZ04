<h2 class="ct">訂單管理</h2>

<table class="all">
    <tr class="tt ct">
        <td>訂單編號</td>
        <td>金額</td>
        <td>會員帳號</td>
        <td>姓名</td>
        <td>下單時間</td>
        <td>操作</td>
    </tr>
    <tr class="pp ct">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <button class='del-btn' data-id="">刪除</button>
        </td>
    </tr>
</table>

<script>
    $(".del-btn").on("click",function(){
    let id=$(this).data("id");
    if(confirm(`確定要刪除這筆訂單資料嗎?`)){
        $.post("./api/del.php",{id,table:'Order'},()=>{
            location.reload();
        })
    }
})
</script>