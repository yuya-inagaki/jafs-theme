# README #

This README would normally document whatever steps are necessary to get your application up and running.


### What is this repository for? ###

* Quick summary 
    * [https://e-kagaku.com](https://e-kagaku.com)のためのwordpressテーマです．
* Version 
    * 2.0
* メンテナー  
    * Yuya Inagaki
    * Motohashi Masatoshi

### How do I get set up? ###

* Summary of set up

Dockerを使用してWordpressの環境を立ち上げる. 作業ディレクトリにて以下の内容で`docker-compose.yml`を作成.

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
      - ./html:/var/www/html
    environment:
      WORDPRESS_DB_HOST: db:3306
      WORDPRESS_DB_USER: wordpress
      WORDPRESS_DB_PASSWORD: wordpress
      WORDPRESS_DB_NAME: wordpress
volumes:
  db_data:
```

以下のコマンドでwordpress寛容を立ち上げ
```
docker-compose up -d
```
以下のWordpressテンプレート格納ディレクトリに移動して`html/wp-content/themes/`本テンプレートをクローンする

## 作業コマンド
- wordpress環境立ち上げ
```
docker-compose up -d
```
- wordpress環境クローズ
```
docker-compose down
```
