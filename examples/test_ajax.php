<!DOCTYPE html>
<html lang="ja">
<head>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<!--[if lt IE 9]>
<script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<title>Ajax通信テンプレート</title>
<meta name="description" content="ページの説明">
<meta name="author" content="Tanioka">
<!-- ファビコン -->
<link rel="shortcut icon" href="">

<!-- Normalize -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">
<!-- Bootstrap -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Smoke _ Bootstrapの拡張的プラグイン -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/smokejs/2.2.4/css/smoke.min.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="../css/style.css">

</head>
<body>


<!-- メイン -->
<div id="main">
    <input type="button" id="testBtn" class="btn btn-primary" value="Ajax Test">
    <div id="resultArea">ボタンを押すとAjax通信でDOM操作を実行します</div>
</div>


<!-- Jquery, Bootstrap -->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<!-- <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- Smoke _ Bootstrapの拡張的プラグイン -->
<script src="//cdnjs.cloudflare.com/ajax/libs/smokejs/2.2.4/js/smoke.min.js"></script>
<!-- Custom JS -->
<script src="../js/main.js"></script>


<script>
    
    /* Ajax Template ここから *********************************************/
    
    // 変数の設定
    var foo = 2;
    var bar = "yos";
    
    // ボタンにクリックリスナを付加する
    $("#testBtn").bind('click', function() {
        testAjax();
    });
    
    function testAjax() {
        
        // Ajax通信の実行
        $.ajax({
            url : './get_ajax.php',
            type: 'POST',
            dataType: 'json',
            data: { "foo": foo, "bar":bar },
            async: true
        }).done(function(res){
            // 通信成功．resはjson_decode済み
            console.log(res);
            // 書き換える
            $("#resultArea").html("成功: "+res.fuge);
            
        }).fail(function(err){
            // 通信失敗
            console.log("error: " + err);
            // 書き換える
            $("#resultArea").html("失敗: "+err);
        });
        
    }
    
    /* Ajax Template ここまで *********************************************/
    
    
</script>
</body>
</html>
