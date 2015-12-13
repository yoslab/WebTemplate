<?php

// test_ajax.php からAjax通信で呼び出すファイル
// JSON形式で出力すればOK

// 外部変数の取得
if(isset($_POST)) {
    foreach($_POST as $key => $val) {
        if(ctype_digit($key[0])) $key[0] = "_";
        $$key = htmlspecialchars($val, ENT_NOQUOTES, 'UTF-8');
    }
} else {
    echo "post error\n";
}

// $keyが使用できる

// 色々実行
$foo++;
$bar .= "hino";

// 出力結果は文字列や配列など，json形式にできるものは何でもOK．
$text = array("hoge"=>$foo, "fuge"=>$bar);

echo json_encode($text);
