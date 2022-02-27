# 概要
laravel の勉強です。

* PHP 8.1
* Laravel 8.81.0


## 1. 環境構築
| app        | url / other |
|------------|-------------|
| git bash   | https://gitforwindows.org/ |
| php(xampp) | https://www.apachefriends.org/download.html <br> 7.4.27 / PHP 7.4.27 |
| Composer   | https://getcomposer.org/download/ <br> 上記でインストールした php を指定、後はデフォルト |
| VSCode     | https://azure.microsoft.com/ja-jp/products/visual-studio-code/ |

### 1-1.各種設定
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

## Laravelプロジェクト作成

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

## アーキ

* ドキュメント

https://readouble.com/laravel/8.x/ja/

公式リファレンスもそうだが、以下Qiitaはよくまとまっていて勉強になる！

https://qiita.com/minato-naka/items/095f2a1beec1d09f423e


* memcached

1. windows 向け dll設定は以下を参考にする。
https://github.com/lifenglsf/php_memcached_dll

php.ini の ext も要追記。

~ここからDLして、php.ini へ。extension=php_memcache.dll を追加。~
~ https://pecl.php.net/package/memcache/4.0.5.2/windows ~

2. exeの実行（資材）

```
どこかに memcache exe が
```


## 開発
* アプリ起動（ローカル動作＝apacheなし）
```
php artisan serve

http://localhost:8000/
http://localhost:8000/hello
```

* リリース（apache動作）
```
xampp で、apache の START を押下

https://rinsaka.com/laravel/apache.html


http://localhost:8000/
http://localhost:8000/hello
```

* Controller生成
```
php artisan make:controller xxxController
```

* PHPUnit
```
php artisan make:test xxxControllerTest

php artisan test

php artisan test --filter xxxControllerTest
```

# TODO

* .env切り替え

500エラーで画面に全部出ちゃうのを抑える。

```
APP_DEBUG=true
```

```
.env
Laravel例外
config
php.ini
log
httpd.cdonf 6->9
git cicd
```