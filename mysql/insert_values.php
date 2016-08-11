<?php

// C#からpostされたデータをMySQLに入れるサンプル
//

// value0, value1, ... の順に挿入するフィールド名を定義する
$FIELDS = array("col0", "col1");
// value0, value1, ... の順に型を定義する（0:String/Date 1:Int/Bool 2:現在日時）
$TYPES = array(0, 1);

// 触らない
$array = array();
$values = array();
$DEF_TYPES = [PDO::PARAM_STR, PDO::PARAM_INT, PDO::PARAM_STR];

// POSTデータを受け取る (value0, value1, ==> $array[0], $array[1])
if(isset($_POST)) {
    foreach($_POST as $key => $val) {
        $num = substr($key, 6); // 数字を切り取る
        if(ctype_digit($num)) {
            $n = intval($num);
            if($TYPES[$n] != 2) {
                $array[$key] = $val;
            }
        }
    }
} else {
    die('post error');
}

// MySQLに接続する
require_once("connect_mysql.php");

try {
    // SQL文を生成する
    $sql = 'INSERT INTO tablename ( '.implode(', ', $FIELDS);
    for($i = 0; $i < count($array); $i++) {
        if($TYPES[$i] == 2) {
            $values[$i] = "NOW()";
        } else {
            $values[$i] = ":".$key;
        }
    }
    $sql .= ' ) VALUES ( '.implode(', ', $values).' )';
    $stmt = $pdo->prepare($sql);
    $stmt->execute($array);
} catch(PDOException $e) {
    var_dump($e->getMessage());
}
