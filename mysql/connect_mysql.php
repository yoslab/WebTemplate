<?php

// MySQLに接続する．require_onceで読み込む

// 以下，指定
$dsn = 'mysql:dbname=testdb;host=localhost;charset=utf8';
$username = 'user';
$password = 'pass';
$driver_options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // エラー報告
    PDO::ATTR_EMULATE_PREPARES => false, // 静的プレースホルダ
);

try {
    // MySQLサーバへ接続
    $pdo = new PDO($dsn, $username, $password, $driver_options);
} catch(PDOException $e) {
    var_dump($e->getMessage());
}


// $_GET を安全に取得する
function getParam($key) {
    $val = isset($_GET[$key]) ? $_GET[$key] : '';
    if(!mb_check_encoding($val, 'Shift_JIS')) {
        die('文字エンコーディングが不正です');
    }
    $val = mb_convert_encoding($val, 'UTF-8', 'Shift_JIS');
    if(preg_match('/\A[[:^cntrl:]]{1,20}\z/', $val) == 0) {
        die('GETパラメータに制御文字が使われています');
    }
    return $val;
}
// $_GET やDBから取り出したものを安全に出力する
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
