<?php
    session_start();  // セッションの開始
    $_id = $_SESSION['ID'];
    if ($_id == '') {
      die('ログインしてください');
    }

    // HTML上に出力させたい場合は必ずhtmlspecialcharsしたものを使用する
    $id = htmlspecialchars($_id, ENT_NOQUOTES, 'UTF-8');
?>
<html>
<head><title>プロフィール</title></head>
<body>

ユーザID: <?php echo $id; ?>

</body>
</html>
