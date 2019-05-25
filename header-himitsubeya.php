<?php
/*
Template Name: ヘッダー秘密部屋
*/
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="content-language" content="ja">
		<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.15.0/build/cssreset-context/cssreset-context-min.css">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style-himitsubeya.css">
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono|Alegreya+Sans' rel='stylesheet' type='text/css'>
		<!-- jQuery library (served from Google) -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script>
		$(function(){
			$('.children').hide();
			$('.page_item_has_children a').click(function(){
				if (($('+ul.children',this).length) > 0) {
					$('+ul.children',this).slideToggle();
					return false;
				} else {
					return true;
				}
			})
		});

		$(function(){
			$('.menu-item a').click(function(){
				if (($('+ul.sub-menu',this).length) > 0) {
					$('+ul.sub-menu',this).slideToggle();
					return false;
				} else {
					return true;
				}
			})
		});
		</script>
	</head>
	<body>
		<header class="container">
			<!--
			<a href="<?php echo home_url('/'); ?>"><img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt=""></a>
			-->
			<a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" width="40%" class="left"></a>
		<div class="header-comment left">
			<p><?php
			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo "$site_description";?></p>
		</div>
		</header>
<?php wp_head(); ?>