# README #

This README would normally document whatever steps are necessary to get your application up and running.


### What is this repository for? ###

* Quick summary 
    * http://e-kagaku.comのためのwordpressテーマです．
* Version 
    * 1.0
* メンテナー  
    * T. Matsumoto  
    * R. Chikuma
* [Learn Markdown](https://bitbucket.org/tutorials/markdowndemo)

### How do I get set up? ###

* Summary of set up

Mac, Linux, Windows Proの人は Docker を推奨します．
Docker公式のWordpressセットアップチュートリアルを参照し，Wordpressの環境を立ち上げてください．
https://docs.docker.com/compose/wordpress/


* Configuration

### Contribution guidelines ###

Wordpressの管理画面から設定のパーマリンク設定をクリックし，カスタム構造にチェックを入れる．
カスタムのテキストボックスの中にをそのままコピペする．

```
/%category%/%year%-%monthnum%-%day%/%post_id%/
```

* Writing tests
* Code review
* Other guidelines

### Who do I talk to? ###

* Repo owner or admin
* Other community or team contact


# Docker
```
version: '2'

services:
  db:
    image: mysql:5.6
    volumes:
      - db_data:/var/lib/mysql
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: wordpress
      MYSQL_USER: wordpress
      MYSQL_PASSWORD: wordpress
  wordpress:
    image: wordpress:latest
    depends_on:
      - db
    ports:
      - "8080:80"
    restart: always
    volumes:
      - ./wp-content:/var/www/html/wp-content
    environment:
      WORDPRESS_DB_HOST: db:3306
      WORDPRESS_DB_USER: wordpress
      WORDPRESS_DB_PASSWORD: wordpress
      WORDPRESS_DB_NAME: wordpress
volumes:
  db_data:
```