<?php
$DB_HOST = "localhost";
$DB_PORT = "80";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME = "midproj";
mysql_query("SET NAMES 'utf8'");

// 建立資料庫連線
$link = mysql_connect('localhost', $DB_USERNAME, $DB_PASSWORD);
if (!$link) {
　die(' 連線失敗，輸出錯誤訊息 : ' . mysql_error());
}

// 選擇資料庫
mysql_select_db($DB_NAME, $link);
?>