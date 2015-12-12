<?php
    session_start();  // セッションの開始
?>
<html>
<head><title>ログインしてください</title></head>
<body>

<form action="login.php" method="POST">
    <div>ユーザ名<input type="TEXT" name="ID"></div>
    <div>パスワード<input type="PASSWORD" name="PWD"></div>
    <div><input type=SUBMIT value="ログイン"></div>
</form>

</body>
</html>
