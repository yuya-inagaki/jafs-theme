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
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>css/bootstrap-4.1.3-dist/css/bootstrap.min.css">
        <!-- header.css -->
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/header.css" type="text/css">
        <!-- classroom.css -->
        <?php if ( is_page_template( 'page-classroom.php' ) || is_page_template( 'page-classroom2.php' ) || is_page_template( 'page-place.php' ) ||  is_page_template( 'page-first.php' ) ) { ?>
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/classroom.css" type="text/css">
        <?php } ?>
        <!-- fontawsome -->
        <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
        <!-- Googleのフォント？ -->
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono|Alegreya+Sans' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
        
        <!-- スライダーSlickのCSS -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/slick/slick.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/slick/slick-theme.css" type="text/css" />
        
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
        
        <!-- JavaScript読み込み -->
        <script src="<?php echo get_template_directory_uri(); ?>/js/slick/slick.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/main_func.js"></script>
        <!-- //JavaScript読み込み -->
        
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() ?>">
        
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
        <!-- PC用ヘッダーメニュー -->
        <div class="header_pc">
            <div class="top_info">
                <div class="container">
                    <!-- ヘッダーロゴ -->
                    <?php $header_image = get_header_image();
                    if (!empty($header_image)) : ?>
                        <a href="<?php echo home_url(); ?>"><img class="header_logo" src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>"></a>
                    <?php else: ?>
                        <a href="<?php echo home_url('/'); ?>"><img class="header_logo" src="<?php bloginfo('template_url'); ?>/img/JAFS-see.png" alt="JAFS logo"></a>
                    <?php endif; ?>
                    <!-- //ヘッダーロゴ -->
                    <a class="top_most_important" href="https://docs.google.com/forms/d/16DdMVnZbYBt2Zo9KU4F4HavemqDWvJCywJPgw4nn8t4/viewform"><img src="<?php bloginfo('template_url'); ?>/img/icon/info_register.png" max-width="190px" width="100%" alt="情報配信登録"></a>
                    <a class="top_most_important" href="http://global-science.or.jp/robo/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/icon/taiken_register.png" max-width="190px" width="100%" alt="体験教室"></a>
                    <a class="top_most_important_sns facebook" href="https://www.facebook.com/e.kagaku/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="top_most_important_sns twitter" href="https://twitter.com/jafs008" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
                    <a class="top_most_important_sns youtube" href="https://www.youtube.com/channel/UCajOFzv2Z-V_1WClnuoCnRA" target="_blank"><i class="fab fa-youtube fa-lg"></i></a>
                </div>
            </div>
            <nav class="top-nav">
                <div class="container">
                    <?php wp_nav_menu(array('theme_location' => 'top-menu')); ?>
                </div>
            </nav>
        </div>
        <!-- //PC用ヘッダーメニュー -->
        <!-- モバイル用ヘッダーメニュー -->
        <div class="header_mobile">
            <div class="header_cover_mobile"></div> <!-- ヘッダーカバー（青い斜め） -->
            <div class="container">
                <!-- ヘッダーロゴ -->
                <?php $header_image = get_header_image();
                if (!empty($header_image)) : ?>
                    <a href="<?php echo home_url(); ?>"><img class="header_logo" src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>"></a>
                <?php else: ?>
                    <a href="<?php echo home_url('/'); ?>"><img class="header_logo" src="<?php bloginfo('template_url'); ?>/img/JAFS-see.png" alt="JAFS logo"></a>
                <?php endif; ?>
                <!-- //ヘッダーロゴ -->
                <!-- ハンバーガーメニュー -->
                <a class="menu-trigger" href="#">
                  <span></span>
                  <span></span>
                  <span></span>
                </a>
                <!-- //ハンバーガーメニュー -->
            </div>
            <!-- メニュー本体 -->
            <div id="mobile_menu">
                <div class="container">
                    <?php wp_nav_menu(array('theme_location' => 'top-menu')); ?>
                    <div class="sns_icon">
                        <a class="top_most_important_sns facebook" href="https://www.facebook.com/e.kagaku/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="top_most_important_sns twitter" href="https://twitter.com/jafs008" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
                        <a class="top_most_important_sns youtube" href="https://www.youtube.com/channel/UCajOFzv2Z-V_1WClnuoCnRA" target="_blank"><i class="fab fa-youtube fa-lg"></i></a>
                    </div>
                </div>
                <div class="text-center">
                    <a class="top_most_important" href="https://docs.google.com/forms/d/16DdMVnZbYBt2Zo9KU4F4HavemqDWvJCywJPgw4nn8t4/viewform"><img src="<?php bloginfo('template_url'); ?>/img/icon/info_register.png" max-width="190px" width="100%" alt="情報配信登録"></a>
                    <a class="top_most_important" href="http://global-science.or.jp/robo/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/icon/taiken_register.png" max-width="190px" width="100%" alt="体験教室"></a>
                </div>
            </div>
            <!-- //メニュー本体 -->
        </div>
        <!-- //モバイル用ヘッダーメニュー -->

    </header>
    <?php endif; //サイエンスラボのページのみ非表示 ?>
    <div class="container">
        
<?php wp_head(); ?>