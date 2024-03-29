<?php
/******************************

    標準ヘッダー【header.php】

******************************/
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="keywords" content="子ども,理科,科学,ロボット,北原達正,子どもの理科離れ,科学実験,グローバル,科学を通した人間教育,e-Gadget,プログラミング">
    <meta name="description"
          content="子どもの理科離れをなくす会は、科学を通した人間教育・グローバル人材の育成を目指します。 理系・文系の枠を超え、科学教育の機会均等化・継続的学習環境の整備に取組みます 。">
    <meta http-equiv="content-language" content="ja">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right');
      bloginfo('name'); ?></title>
        
    <!-- bootstrap 4.1.3 -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap4/bootstrap.min.css">
    <!-- header.css -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/header.css?ver=20200214-4" type="text/css">
    <!-- classroom.css -->
    <?php if ( is_page_template( 'page-classroom.php' ) || is_page_template( 'page-classroom2.php' ) || is_page_template( 'page-place.php' ) ||  is_page_template( 'page-first.php' ) ) { ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/classroom.css?ver=20200222" type="text/css">
    <?php } ?>
    <?php if ( is_page_template( 'page-academy.php' ) ) : ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/academy.css" type="text/css">
    <script src="https://ssense.github.io/vue-carousel/js/vue-carousel.min.js"></script>
    <?php endif; ?>
    <!-- fontawsome -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/fontawesome-free-5.12.1-web/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/fontawesome-free-5.12.1-web/css/brands.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/fontawesome-free-5.12.1-web/css/solid.css">
    <!-- Googleのフォント？ -->
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans+Mono|Alegreya+Sans' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    
    <!-- Vue.js -->
    <?php $url = esc_url( home_url() ); if(strstr($url,'ekagaku.local')==true): ?>
      <script src="<?php echo get_template_directory_uri(); ?>/js/vue/vue.js"></script>
    <?php else: ?>
      <script src="<?php echo get_template_directory_uri(); ?>/js/vue/vue.min.js"></script>
    <?php endif; ?>
    
    <!-- JavaScript読み込み -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/slick/slick.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/main_func.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/common.js?ver=20200214-2"></script>
    <!-- //JavaScript読み込み -->
    
    <!-- 教室案内ページでのみ読み込み -->
    <?php if ( is_page_template( 'page-place.php' ) ) : ?>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.rwdImageMaps.min.js"></script>
    <?php endif; ?>
    
    <!-- サポーター募集ページでのみ読み込み -->
    <?php if ( is_page_template( 'page-supporter.php' ) ) : ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/supporter.css" type="text/css" />
    <?php endif; ?>

    <?php wp_head(); ?>

  </head>
<body>
<?php if ( !is_page_template( 'page-slabo.php' ) ) : //サイエンスラボのページのみ非表示  ?>
  <header>
    <div id="header">
      <div class="global-menu" v-if="isPc">
        <?php wp_nav_menu(array('theme_location' => 'global-menu')); ?>
      </div>
      <div class="header-box-wrapper" :class="{ top: isTop && isPc }">
        <div class="header-box" :class="{ hidemenu: !pcMenuActive && isPc }">
          <?php if(is_page('academy') || page_is_ancestor_of('academy')): ?>
          <a href="<?php echo home_url() ?>/academy">
            <img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo-academy.jpg" alt="e-kagaku">
          </a>
          <?php else: ?>
          <a href="<?php echo home_url() ?>">
            <img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo-mini.jpg" alt="e-kagaku">
          </a>
          <?php endif; ?>
          <!-- pc only menu -->
          <div class="pc-only f-right">
            <div class="menu-box">
              <!-- メニューの表示 -->
              <?php if(is_page('academy') || page_is_ancestor_of('academy')): ?>
              <?php wp_nav_menu(array('theme_location' => 'academy-menu')); ?>
              <?php else: ?>
              <?php wp_nav_menu(array('theme_location' => 'top-menu')); ?>
              <?php endif; ?>
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
      </div>
      <!-- sm/tablet menu -->
      <div class="sm-menu-box" :class="{ active: smMenuActive }">
        <div class="sm-menu-box-inner">
          <!-- メニューの表示 -->
          <div class="sm-global-menu">
          <?php wp_nav_menu(array('theme_location' => 'global-menu')); ?>
          </div>
          <?php if(is_page('academy') || page_is_ancestor_of('academy')): ?>
          <h2 class="title">e-kagaku Academy</h2>
          <?php wp_nav_menu(array('theme_location' => 'academy-menu')); ?>
          <?php endif; ?>
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
  <?php endif; //サイエンスラボのページのみ非表示 ?>
