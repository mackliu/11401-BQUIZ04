<div class="ct"><button onclick="location.href='?do=add_admin'">新增管理員</button></div>
<!-- table.all>(tr.tt.ct>td*3)+(tr.pp.ct>td*3) -->
 <table class="all">
    <tr class="tt ct">
        <td>帳號</td>
        <td>密碼</td>
        <td>管理</td>
    </tr>
    <?php 
    $admins=$Admin->all();
    foreach($admins as $admin):
    ?>
    <tr class="pp ct">
        <td><?=$admin['acc'];?></td>
        <td><?=str_repeat("*",mb_strlen($admin['pw']));?></td>
        <td>
           <?php if($admin['acc']!='admin'):?>
            <button data-id="<?=$admin['id'];?>" onclick="location.href='?do=edit_admin&id=<?=$admin['id'];?>'">修改</button>
            <button data-id="<?=$admin['id'];?>">刪除</button>
            <?php else: ?>
                此帳號為最高權限
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
 </table>

 <div class="ct"><button onclick="location.href='index.php'">返回</button></div>