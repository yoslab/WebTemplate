<?php

// 入手データをMySQLに入れるサンプル
// 

// POSTデータを受け取る ($value0, $value1, ... の順に格納される)
if(isset($_POST)) {
    foreach($_POST as $key => $val) {
        if($key == "value".preg_match("\d+")) {
            $$key = htmlspecialchars($val);
        }
    }
} else {
    echo "post error\n";
}



// MySQLに接続する (ホスト名，ユーザ名，パスワード，データベース名の順)
$mysqli = new mysqli("localhost", "tanioka", "PASS", "tanioka");
if($mysqli->connect_error) {
    echo "connection error: ".$mysqli->connect_error;
    exit();
}

// UTF-8エンコーディング
$mysqli->mysql_set_charset("utf8");

// クエリ(SQL文)の作成: データベースに行を追加する
$query = "INSERT INTO test_table ( col0, col1 ) VALUES ( $value0, $value1 )";

// クエリの実行
if($mysqli->query($query)) {
    echo "succees!";
} else {
    echo "insert error";
}
$mysqli->close();
