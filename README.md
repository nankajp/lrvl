# 概要
laravel の勉強です。

## 環境構築
| app        | url / other |
|------------|-------------|
| git bash   | https://gitforwindows.org/ |
| php(xampp) | https://www.apachefriends.org/download.html <br> 7.4.27 / PHP 7.4.27 |
| Composer   | http://laravel.jp/ <br> Composerで動く -> Download -> "Download and run Composer-Setup.exe ～" <br> (1)でインストールした php を指定、あとはデフォルトで next... -> Finish |
| laravel    | https://readouble.com/laravel/4.2/ja/quick.html <br> composer global require "laravel/installer" |
| VSCode     | https://azure.microsoft.com/ja-jp/products/visual-studio-code/ |

### カスタマイズ
* 環境変数Pathに、php と composerが通っていることを確認する

* php.ini 編集（C:\xampp\php）
```
date.timezone=Asia/Tokyo
```

* .gitconfig 編集（C:\Users\xxx）
```
[user]
    name  = Gitアカウント
    email = Gitメールアドレス
[core]
    ignorecase = false
    quotepath  = false
    autocrlf   = false
```

* VSCode Plugin

| plugin name            | summary     |
|------------------------|-------------|
| 日本語パック            | 初回起動後オススメされるので、インストールする。 |
| PHP Intelephense       | インテリセンス   |
| Bracket Pair Colorizer | カッコ強調表示   |
| Highlight Matching Tag | htmlタグ強調表示 |
| Indent-Rainbow         | インデントをカラフル表示 |
| Trailing Spaces        | 行末の無駄スペース検知 |
| Laravel Blade Snippets | ※現行に合わせるため使用しない |
| PHP DEBUG              | ※デバッガ。今回は使用しない |

* Laravelプロジェクト作成

```
cd c:\xxx
composer create-project --prefer-dist laravel/laravel lrvl
                        (1)^^^^^^^^^^ (2)^^^^^^^^^^^^ (3)^
(1):zipでダウンロードするという意味。--prefer-source で git cloneだが当然面倒。
(2):[vendor]/[package]
(3):プロジェクト名

※ファイル編集
.gitattributes
  * text=auto eol=lf
  *.{cmd,[cC][mM][dD]} text eol=crlf
  *.{bat,[bB][aA][tT]} text eol=crlf
  *.ps1 eol=lf
  *.sh eol=lf

/config/app.php
  'timezone' => 'Asia/Tokyo'
  'locale'   => 'ja'

※デバッガ
composer require barryvdh/laravel-debugbar
```

* アプリ起動
```
1. xampp で、apache の START を押下
2. アプリケーション起動コマンド実行
   php artisan serve
3. 表示確認
   http://localhost:8000/
```

## アーキ
* Redis, memcached, cassandra, DB....

* memcached

https://pecl.php.net/package/memcache/4.0.5.2/windows

ここからDLして、php.ini へ。extension=php_memcache.dll を追加。

```
失敗メモ
http://spench.net/drupal/software/tokyocabinet
32bitだから無理だった。64bit化するにもエラーがいろいろ出てきつい。
memcachedに差し替えて動作確認すればよいか...

https://pecl.php.net/package/memcached
server資材？
https://github.com/nono303/PHP-memcache-dll/blob/master/vc15/x64/ts/php-7.4.x_memcache.dll
dll代理？
```

* 500エラーで画面に全部出ちゃうのを抑える。.env

```
APP_DEBUG=true
```

error画面への制御は？

* test方法

