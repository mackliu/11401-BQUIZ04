 # 購物車數量提示功能實作說明

本文件說明如何在專案中加入購物車商品數量的即時提示功能。

## 專案背景

本專案為 PHP 電商網站，透過 `$_SESSION['cart']` 來記錄購物車內容。

## 功能目標

在網站頂端的導覽列中，於「購物車」連結旁顯示目前購物車內的商品總數量，並在每次頁面載入時自動更新。

## 修改步驟

### 1. 新增後端 API (`api/cart_count.php`)

首先，我們需要一個後端腳本來計算並回傳購物車中的商品總數。我們建立一個新檔案 `api/cart_count.php`。

此檔案的功能是：
- 啟動 session。
- 檢查 `$_SESSION['cart']` 是否存在。
- 如果存在，則加總所有商品的數量；如果不存在，則回傳 0。

**程式碼：**
```php
<?php
session_start();
$count = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $qt) {
        $count += $qt;
    }
}
echo $count;
```

### 2. 修改前端 JavaScript (`js/js.js`)

接下來，我們需要一個前端的 JavaScript 函式來呼叫新的 API，並將回傳的數量更新到網頁上。

我們在 `js/js.js` 中新增一個名為 `getCartCount()` 的函式。

**新增的函式：**
```javascript
function getCartCount(){
	$.get("./api/cart_count.php",(count)=>{
		$("#cart-count").text(count);
	})
}
```

### 3. 修改主頁面 (`index.php`)

最後，我們修改主頁面 `index.php` 來顯示購物車數量，並在頁面載入時呼叫我們剛剛建立的 JavaScript 函式。

#### a. 加入數量顯示元素

在導覽列的「購物車」連結旁，我們加入一個 `<span>` 元素，並給它一個 `id` 以便於 JavaScript 操作。

**原始碼：**
```html
<a href="?do=buycart">購物車</a> |
```

**修改後：**
```html
<a href="?do=buycart">購物車(<span id='cart-count'></span>)</a> |
```

#### b. 呼叫 JavaScript 函式

在 `index.php` 檔案的 `</body>` 標籤前，加入 `<script>` 區塊來呼叫 `getCartCount()` 函式，確保每次頁面載入時都會更新購物車數量。

**修改後：**
```html
<script>
getCartCount();
</script>
</body>
```

## 結論

經過以上修改，網站現在能夠在每個頁面的導覽列中，動態顯示購物車的商品總數，提供了更直觀的使用者體驗。
