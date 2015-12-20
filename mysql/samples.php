<!DOCTYPE html>
<html>
<body>
<?php

// PDOを用いた安全なMySQL処理

header('Content-Type: text/html; charset=utf-8');
$array = array();


// 接続方法は参照先を参考に
require_once("connect_mysql.php");


/* ****************************************************
** SELECT文（探索）の例 : 全レコードを取得する
*/
try {
    // ユーザ入力のない静的クエリ → queryメソッド
    $rows = $pdo->query('SELECT name FROM people')
        ->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    var_dump($e->getMessage());
}

// 行数チェック
if(count($rows) > 0) {
    // 1件ずつを出力する
    foreach($rows as $row) {
        // その場で出力する場合
        echo implode(", ", h($row));
        // 配列に溜める場合
        array_push($array, $row["name"]);
    }
    echo h($array[0]);
} else {
    // 0件だった
    echo "No rows matched the query.";
}


/* ****************************************************
** SELECT文（探索）の例 : 任意条件のレコードを取得する
*/
try {
    // ユーザ入力のある動的クエリ → prepare．プレースホルダを利用する
    $stmt = $pdo->prepare('SELECT * FROM people WHERE gender = :gender AND age = :age');
    $stmt->bindValue("gender", $gender);
    $stmt->bindValue("age", $age, PDO::PARAM_INT); // 数字やBoolの場合
    // $stmt->bindValue("date", $date, PDO::PARAM_STR); // 日付の場合
    $stmt->execute();
} catch(PDOException $e) {
    var_dump($e->getMessage());
}

// 1件ずつを出力する
while($row = $stmt->fetchObject()) {
    echo implode(", ", h($row->name));
}


/* ****************************************************
** SELECT文（探索）の例 : 特殊例
*/

// ソート: ORDER句．以下は，名前の昇順，名前が同じ場合はIDの降順
$stmt = $pdo->prepare('SELECT * FROM people WHERE name = :name ORDER BY name, id desc');
// 個数制限: LIMIT句．以下は，条件に当てはまる1行のみを取得
$stmt = $pdo->prepare('SELECT * FROM people WHERE name = :name LIMIT 1');

// 部分検索： LIKE式．上記とは違い，プレースホルダが使用可
$stmt = $pdo->prepare('SELECT * FROM people WHERE name LIKE ?');
$stmt->bindValue(1, '%'.addcslashes($name, '\_%').'%', PDO::PARAM_STR);


/* ****************************************************
** INSERT文（追加）の例
*/
try {
    $stmt = $pdo->prepare("INSERT INTO people (name, value, created) VALUES (:name, :value, NOW())");
    // bindValueで変数を用意する
    $stmt->bindValue('value', 1, PDO::PARAM_INT);
    $name = 'one';
    $stmt->execute();
} catch(PDOException $e) {
    var_dump($e->getMessage());
}


/* ****************************************************
** UPDATE文（更新）の例
*/
try {
    $stmt = $pdo->prepare("UPDATE people SET name =:name WHERE city = :city LIMIT 1");
    // 数字がない場合は，下記のように配列でbindできる
    $stmt->execute(array('name'=>$_GET['name'], 'city'=> "tokyo"));
} catch(PDOException $e) {
    var_dump($e->getMessage());
}

// 全員の年齢を+1し，その対象となった人数を取得する例
$count = $pdo->exec('UPDATE people SET age = age + 1');


?>

</body>
</html>
