
# **mysql**
データベースのMySQLを導入する際のテンプレート集です．

----
## PHPでMySQLを利用する
- 参考は以下の2ファイルです．
    - [connect_mysql.php](https://github.com/yoslab/WebTemplate/examples/ex003--mysql/connect_mysql.php)
    - [index.php](https://github.com/yoslab/WebTemplate/examples/ex003--mysql/index.php)
    - [cheat_sheet.php](https://github.com/yoslab/WebTemplate/examples/ex003--mysql/cheat_sheet.php)
- セキュリティ面から，PDO（またはMySQLi）を利用してください．PHP 5.5.0以上で使用できます．
- 詳細: http://php.net/manual/ja/mysqlinfo.api.choosing.php

----

## C#プロジェクトでMySQLを利用する
- [PostDataSample](https://github.com/yoslab/WebTemplate/examples/ex003--mysql/PostDataSample)
    - C#のFormプロジェクト (Visual Studio 2015)
    - 重要なのは，Form1.csの **postPhp()** です．
    - 新規または既存のプロジェクトへコピペするほうが早いかもしれません．
    - HttpClientクラスの利用には，System.Webを参照追加してください．
- [insert_value.php](https://github.com/yoslab/WebTemplate/examples/ex003--mysql/insert_value.php)
    - 上記のC#プロジェクトの送信先の例です．任意のURLに置いてください．
    - 送られたvalueからMySQLにデータを追加(insert)します．
