## MySQL Template

MySQLを導入する際のテンプレート集です．

----

### PHPでMySQLを利用する際の注意
- MySQLiまたはPDOを利用してください．(PHP 5.5.0 ～)
- 詳細: http://php.net/manual/ja/mysqlinfo.api.choosing.php

----

#### Q. C#からPHPを叩いてMySQLに保存する
- PostDataSample
    - C#のFormプロジェクト (Visual Studio 2015)
    - 重要なのは，Form1.csの **postPhp()** です．
    - 新規または既存のプロジェクトへコピペするほうが早いかもしれません．
    - HttpClientクラスの利用には，System.Webを参照追加してください．
- insert_value.php
    - 上記のC#プロジェクトの送信先の例です．任意のURLに置いてください．
    - 送られたvalueからMySQLにデータを追加(insert)します．
