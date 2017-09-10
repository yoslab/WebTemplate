<!DOCTYPE html>
<html class="no-js" lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
  <meta name="robots" content="noindex, nofollow">
  <title>MySQL TEST</title>
  <meta name="description" content="Description">
  <meta name="author" content="Yoslab">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js">
  <?php
    // 「head内で読み込み・変数用意」「body内で出力」
    // 接続
    require_once("connect_mysql.php");
    // $rows配列を用意
    try {
        $rows = $pdo->query('SELECT * FROM table_name')
            ->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        var_dump($e->getMessage());
    }
  ?>
</head>
<body>
  <!--[if lt IE 9]>
    <p class="browerupgrade">IE9未満は非対応です．</p>
  <![endif]-->
  <!-- ************ ここからレイアウト ************ -->
  <div id="main">
    <!-- 中身を出力 -->
    <pre>
      <?php var_dump($rows) ?>
    </pre>
  </div>
  <!-- ************ ここまでレイアウト ************ -->
  <!-- JavaScript -->
  <script src="//code.jquery.com/jquery-3.1.1.slim.min.js"></script>
</body>
</html>
