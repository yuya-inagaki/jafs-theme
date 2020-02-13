<?php
/*
Template Name: HD, HOME
*/
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="keywords" content="子ども,理科,科学,ロボット,北原達正,子どもの理科離れ,科学実験,グローバル,科学を通した人間教育,e-Gadget,プログラミング">
    <meta name="description" content="子どもの理科離れをなくす会は、科学を通した人間教育・グローバル人材の育成を目指します。 理系・文系の枠をえ、科学教育の機会均等化・継続的学習環境の整備に取組みます 。">
    <meta http-equiv="content-language" content="ja">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
        
    <!-- bootstrap 4.1.3 -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap4/bootstrap-grid.min.css">
    <!-- header.css -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/header.css?ver=20200214" type="text/css" >
    <!-- top-page.css -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/top-page.css?ver=20200214" type="text/css">
    <!-- fontawsome -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/fontawesome-free-5.12.1-web/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/fontawesome-free-5.12.1-web/css/brands.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/fontawesome-free-5.12.1-web/css/solid.css">
    <!-- Googleのフォント？ -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono|Alegreya+Sans' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">

    <!-- Vue.js -->
    <?php $url = esc_url( home_url() ); if(strstr($url,'ekagaku.local')==true): ?>
      <script src="<?php echo get_template_directory_uri(); ?>/js/vue/vue.js"></script>
    <?php else: ?>
      <script src="<?php echo get_template_directory_uri(); ?>/js/vue/vue.min.js"></script>
    <?php endif; ?>
    <!-- スライダーSlickのCSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/slick/slick.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/slick/slick-theme.css" type="text/css" />
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    
    <!-- JavaScript読み込み -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/slick/slick.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/main_func.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/common.js"></script>
    <!-- //JavaScript読み込み -->
    
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() ?>">

    <?php wp_head(); ?>
  </head>
<body>
  <header>
    <div id="header">
      <!-- PC用ヘッダーメニュー -->
      <div class="header-box">
        <a href="<?php echo home_url() ?>">
          <img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo-mini.jpg" alt="e-kagaku">
        </a>
        <!-- pc only menu -->
        <div class="pc-only f-right">
          <div class="menu-box">
            <!-- メニューの表示 -->
            <?php wp_nav_menu(array('theme_location' => 'top-menu')); ?>
          </div>
        </div>
        <!-- sm only menu -->
        <div class="sm-only f-right">
          <div class="menu-btn" :class="{ active: smMenuActive }" @click="triggerSmMenu">
            <div class="btn-trigger">
              <span></span>
              <span></span>
            </div>
          </div>
        </div>
      </div>
      <!-- sm/tablet menu -->
      <div class="sm-menu-box" :class="{ active: smMenuActive }">
        <div class="sm-menu-box-inner">
          <h2 class="title">Menu</h2>
          <!-- メニューの表示 -->
          <?php wp_nav_menu(array('theme_location' => 'top-menu')); ?>
          <div style="display: flex;">
              <a class="btn-img" href="https://docs.google.com/forms/d/16DdMVnZbYBt2Zo9KU4F4HavemqDWvJCywJPgw4nn8t4/viewform">
                <img src="<?php bloginfo('template_url'); ?>/img/icon/info_register.png" alt="情報配信登録">
              </a>
              <a class="btn-img" href="http://global-science.or.jp/robo/" target="_blank">
                <img src="<?php bloginfo('template_url'); ?>/img/icon/taiken_register.png" alt="体験教室">
              </a>
          </div>
        </div>
      </div>
    </div>
  </header>

    <?php get_template_part('template/hello2020'); ?>
    <!-- トップページメインスライダー -->
    <?php get_template_part('template/top-slider'); ?>
    <!-- //トップページメインスライダー -->
    <?php get_template_part('template/message2020'); ?>
    
    <!-- トップページ最重要ニュース -->
    <div class="top_news">
      <div class="container">
        <?php if($news_title=get_option('topnews_title')): ?>
          <?php if($news_url=get_option('topnews_url')): ?>
          <div class="oshirase"><div class="oshirase-left">お知らせ</div><div class="oshirase-right"><a href="<?php echo $news_url; ?>" target="_blank"><?php echo $news_title; ?></a></div><div class="oshirase-bottom"></div></div>
          <?php else: ?>
          <div class="oshirase"><div class="oshirase-left">お知らせ</div><div class="oshirase-right"><?php echo $news_title; ?></div><div class="oshirase-bottom"></div></div>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
    <!-- //トップページ最重要ニュース -->
  <!-- 協会へのリンク -->
  <div class="top_agse">
    <a href="http://global-science.or.jp/" target="_blank">
      <div class="container">
        <p>体験教室、科学合宿、スペースロボットコンテストなどはこちら</p>
      </div>
    </a>
  </div>
  <?php wp_head(); ?>