<h2 class="ct">編輯會員資料</h2>
<?php $user=$User->find($_GET['id']); ?>
<!-- table.all>tr*6>td.tt.ct+td.pp>input:text -->
<form>
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><?=$user['acc'];?></td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><?=str_repeat("*", strlen($user['pw']));?></td>
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
        <td class="tt ct">地址</td>
        <td class="pp"><input type="text" name="addr" id="addr" value="<?=$user['addr'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel" value="<?=$user['tel'];?> "></td>
    </tr>
</table>
<div class="ct">
    <input type="button" value="編輯" onclick="editUser()">
    <input type="reset" value="重置">
    <input type="button" value="取消" onclick="location.href='?do=mem'">
</div>
</form>
<script>
function editUser(){
    let form={
        id:<?=$user['id'];?>,
        name:$("#name").val(),
        email:$("#email").val(),
        addr:$("#addr").val(),
        tel:$("#tel").val()
    }
    $.post("./api/reg.php",form,()=>{
        location.href='?do=mem';
    })
}
</script>