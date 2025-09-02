# GEMINI.md

## 專案概觀

這是一個以 PHP 開發的電子商務網站。其特色為前後端功能分離、資料庫驅動的商品目錄、使用者與管理員驗證以及訂單管理。前端由 `index.php` 和 `front/` 目錄處理，後端則透過 `back.php` 和 `back/` 目錄進行管理。`api/` 目錄包含用於使用者驗證和資料檢索等各種功能的端點。資料庫連線由 `api/db.php` 管理，該檔案使用自訂的 `DB` 類別與名為 `db11` 的 MySQL 資料庫進行互動。

### 主要技術

*   **後端：** PHP
*   **資料庫：** MySQL
*   **前端：** HTML, CSS, JavaScript (使用 jQuery)

## 功能特色

*   **使用者驗證：** 使用者可以註冊和登入網站。以 session 為基礎的驗證由 `api/login.php`、`api/logout.php` 和 `api/chkAcc.php` 處理。
*   **商品目錄：** 商品被組織成類別和子類別。`front/main.php` 檔案顯示商品，而 `back/th.php` 檔案可能用於管理商品。
*   **購物車：** 使用者可以將商品加入購物車，在 `front/buycart.php` 中查看購物車內容，並更新商品數量。
*   **結帳與訂單管理：** 結帳流程由 `front/checkout.php` 處理，訂單透過 `api/save_order.php` 儲存到資料庫。`back/order.php` 和 `back/detail.php` 檔案用於在管理後台管理訂單。
*   **管理後台：** 一個簡單的管理後台，可管理管理員、商品、訂單和網站的其他方面。`back/admin.php` 檔案用於管理管理員。

## 建置與執行

這是一個 PHP 網站專案。若要執行它，您需要一個支援 PHP 的網頁伺服器和一個 MySQL 資料庫。

1.  **設定網頁伺服器：** 安裝如 Apache 或 Nginx 等支援 PHP 的網頁伺服器。
2.  **匯入資料庫：** 專案包含數個 `.sql` 檔案 (`admin.sql`, `item.sql`, `orders.sql`, `type.sql`, `user.sql`)。這些檔案包含資料庫結構和初始資料。您需要將它們匯入到名為 `db11` 的 MySQL 資料庫中。
3.  **設定資料庫連線：** 資料庫連線在 `api/db.php` 中設定。預設設定如下：
    *   **DSN：** `mysql:host=localhost;charset=utf8;dbname=db11`
    *   **使用者：** `root`
    *   **密碼：** (無)
    您可能需要更新這些設定以符合您的環境。
4.  **執行應用程式：** 將專案檔案放置在您伺服器的網站根目錄中，並在瀏覽器中存取 `index.php` 檔案。

## 開發慣例

*   專案遵循基於 `do` 查詢參數的簡單路由機制。
*   資料庫互動由 `api/db.php` 中的自訂 `DB` 類別處理。
*   前端和後端分別位於 `front/` 和 `back/` 目錄中。
*   API 端點位於 `api/` 目錄中。
*   JavaScript 程式碼位於 `js/` 目錄中，並使用 jQuery 進行 DOM 操作和 AJAX 請求。
*   CSS 程式碼位於 `css/` 目錄中。

## 資料庫結構

資料庫包含以下資料表：

*   **`admin`**：儲存管理員帳號。
*   **`user`**：儲存使用者帳號。
*   **`type`**：儲存商品類別。
*   **`item`**：儲存商品資訊。
*   **`orders`**：儲存訂單資訊。