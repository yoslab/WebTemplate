
# basic_auth
- **ログイン・パスワードFormを設置する** 例です．
    - クッキーによるセッション管理を行います．
    - index.phpで情報を入力し，my.phpへPOSTします．

> <cite>[体系的に学ぶ安全なWebアプリケーションの作り方](http://www.amazon.co.jp/dp/4797361190) - p.44</cite>

---
#### Q. GETとPOSTの使い分けは？
> 以下が1つでも当てはまる場合にPOSTメソッドを用い、1つも当てはまらない場合にはGETメソッドを利用するとよいでしょう。
>
> - データ更新など副作用を伴うリクエストの場合
> - 秘密情報を送信する場合
> - 送信するデータの総量が多い場合
>
> <cite>[体系的に学ぶ安全なWebアプリケーションの作り方](http://www.amazon.co.jp/dp/4797361190) - p.35</cite>
