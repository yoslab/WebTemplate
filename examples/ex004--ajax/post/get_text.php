<?php
header('Content-Type: application/json; charset=utf-8');

// ここでデータべースに接続して，SELECTしたりUPDATEしたりも可
// ...


// 出力結果は文字列や配列など，json形式にできるものは何でもOK．
$text = array("hoge"=>3, "fuge"=>"hint", "time"=> date("Y/m/d H:i:s"));
// JSON形式で出力
echo json_encode($text);
