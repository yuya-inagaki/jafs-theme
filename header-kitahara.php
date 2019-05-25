<?php
/*
Template Name: HD, kitahara
*/
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta name="keywords" content="子ども,理科,科学,ロボット,北原達正,子どもの理科離れ,科学実験,グローバル,科学を通した人間教育">
		<meta name="description" content="子どもの理科離れをなくす会は、科学を通した人間教育・グローバル人材の育成を目指します。 理系・文系の枠を超え、科学教育の機会均等化・継続的学習環境の整備に取組みます 。">
		<meta http-equiv="content-language" content="ja">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
		<!-- bootstrap 3.3.6 -->
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap-3.3.6/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.15.0/build/cssreset-context/cssreset-context-min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() ?>">
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono|Alegreya+Sans' rel='stylesheet' type='text/css'>
		<!-- jQuery library (served from Google) -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
			<header>
				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<a style="text-align: center" href="<?php echo home_url('/').'kitahara-cafe'; ?>"><img width="250px" src="http://e-kagaku.com/wordpress/wp-content/uploads/2016/08/logo_kitaharacafe.png"></a>

					</div>
					<div class="col-sm-8 col-xs-12">
<?php
$current_user = wp_get_current_user();
echo ($current_user->ID) === 0 ? "" : 'Username: ' . $current_user->user_login ."<br>";
echo ($current_user->ID) === 0 ? "" : '会員番号: ' . $current_user->member_code ."<br>";
echo ($current_user->ID) === 0 ? "" : "<a href='/?a=logout'>ログアウト</a>";
?>
					</div>
				</div>
			</header>
<?php wp_head(); ?>