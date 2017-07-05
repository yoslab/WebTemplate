<?php
    session_start();  // セッションの開始
    $_id = $_POST['ID'];
    $_pwd = $_POST['PWD'];
    // IDとパスワードのどちからかが空の場合はログイン失敗
    if ($_id == '' || $_pwd == '') {
        die('ログイン失敗');
    }
    $_SESSION['ID'] = $_id;
?>
<html>
<head><title>ログイン</title></head>
<body>

<p>ログイン成功しました</p>
<a href="profile.php">プロフィール</a>

</body>
</html>
