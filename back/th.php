<h2 class="ct">商品分類</h2>
<!-- div.ct>input:text+button -->
<div class="ct">
    新增大分類
    <input type="text" name="big" id="big">
    <button>新增</button>
</div>
<!-- div.ct>select+input:text+button -->
 <div class="ct">
    新增中分類
    <select name="selBig" id="selBig"></select>
    <input type="text" name="mid" id="mid">
    <button>新增</button>
</div>

<!-- table.all>(tr.tt>td+td.ct>button*2) -->
 <table class="all">
    <tr class="tt">
        <td>fafdsaf</td>
        <td class="ct">
            <button>修改</button>
            <button>刪除</button>
        </td>
    </tr>
    <tr class="pp ct">
        <td>12312</td>
        <td>
            <button>修改</button>
            <button>刪除</button>
        </td>
    </tr>
 </table>


<h2 class="ct">商品管理</h2>
<div class="ct">
    <button>新增商品</button>
</div>
 <table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操</td>
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