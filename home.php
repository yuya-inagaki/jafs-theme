<?php
/*
Template Name: トップページ　home.php

*/
get_header('top'); ?>

<!-- //協会へのリンク -->

<div id="top-sec1">
	<div class="container relative">
		<span class="title">News</span>
		<a class="news-all" href="<?php echo home_url('/'); ?>gallery/info/"><span><i class="fas fa-plus"></i> 全ての記事</span></a>
		<?php
		$args = array('posts_per_page' => 5, 'orderby' => 'date', 'category_name' => news);
		$postslist = get_posts($args);
		foreach ($postslist as $post) :
			setup_postdata($post); ?>

			<a href="<?php the_permalink(); ?>">
				<div class="news-box">
					<div class="date">
						<?php the_time("Y.m.d"); ?>
					</div>
					<div class="title">
						<?php the_title(); ?>
					</div>
				</div>
			</a>

		<?php
		endforeach;
		wp_reset_postdata();
		?>
	</div>
</div>

<div id="top-sec2">
	<div class="container">
		<span class="title">Key Point</span>
		<div class="row">
			<div class="col-md-6">
				<div class="advantage-box">
					<div class="num"><i class="fas fa-thumbs-up"></i><span style="font-size:1.5em; margin-left:5px;">1</span></div>
					<div class="title">2020年からのプログラミング教育に対応</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="advantage-box">
					<div class="num"><i class="fas fa-thumbs-up"></i><span style="font-size:1.5em; margin-left:5px;">2</span></div>
					<div class="title">15年間の教育実績 多数の難関校でも採用</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="advantage-box">
					<div class="num"><i class="fas fa-thumbs-up"></i><span style="font-size:1.5em; margin-left:5px;">3</span></div>
					<div class="title">日本初の実機型STEAM-eスポーツ</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="advantage-box">
					<div class="num"><i class="fas fa-thumbs-up"></i><span style="font-size:1.5em; margin-left:5px;">4</span></div>
					<div class="title">世界初 誰でも宇宙にチャレンジできるプロジェクト</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="top-sec-temp">
	<div class="container">
		<div class="row row-eq-height">
			<div class="col-sm-6 col-md-4">
				<a href="https://e-kagaku.com/academy/classroom/">
					<div class="box">
						<img src="<?php bloginfo('template_url'); ?>/img/toppage/06.jpg">
						<p>全国の教室のご案内</p>
					</div>
				</a>
			</div>
			<div class="col-sm-6 col-md-4">
				<a href="https://e-kagaku.com/supporter/">
					<div class="box">
						<img src="<?php bloginfo('template_url'); ?>/img/toppage/01.jpg">
						<p>リクルート・アルバイト</p>
					</div>
				</a>
			</div>
			<div class="col-sm-6 col-md-4">
				<a href="https://e-kagaku.com/index/top_education/">
					<div class="box">
						<img src="<?php bloginfo('template_url'); ?>/img/toppage/02.jpg">
						<p>企業自治体の方へ</p>
					</div>
				</a>
			</div>
			<div class="col-sm-6 col-md-4">
				<a href="https://e-kagaku.com/index/shcool-top/">
					<div class="box">
						<img src="<?php bloginfo('template_url'); ?>/img/toppage/03.jpg">
						<p>学校・塾関係者の方へ</p>
					</div>
				</a>
			</div>
			<div class="col-sm-6 col-md-4">
				<a href="http://e-kagaku.com/activities/">
					<div class="box">
						<img src="<?php bloginfo('template_url'); ?>/img/toppage/04.jpg">
						<p>活動実績</p>
					</div>
				</a>
			</div>
			<div class="col-sm-6 col-md-4">
				<a href="https://e-kagaku.com/gallery/all_gallery/">
					<div class="box">
						<img src="<?php bloginfo('template_url'); ?>/img/toppage/05.jpg">
						<p>ギャラリー</p>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

<?php
	get_template_part('template/hello2020');
	get_template_part('template/message2020');
?>

<div id="top-sns" class="d-none d-md-block" style="padding-top:30px; padding-bottom:30px;">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-sm-10 text-center">
						<span class="title">Facebook</span>
						<div style="width:100%; max-width: 500px;">
							<div class="fb-page" data-href="https://www.facebook.com/e.kagaku/" data-tabs="timeline" data-width="750" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false">
								<blockquote cite="https://www.facebook.com/e.kagaku/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/e.kagaku/">子どもの理科離れをなくす会</a></blockquote>
							</div>
						</div>
					</div>
					<div class="col-sm-2"></div>
				</div>

			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-10 text-center">
						<span class="title">Twitter</span>
						<a class="twitter-timeline" data-width="500" data-chrome="noheader nofooter" data-height="300" href="https://twitter.com/jafs008?ref_src=twsrc%5Etfw">Tweets by jafs008</a>
						<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="top-sns" class="d-block d-md-none" style="padding-top:30px; padding-bottom:30px;">
	<div class="container top-sns-sm">
		<div class="row">
			<div class="col-6 text-center">
				<a href="https://www.facebook.com/e.kagaku/" target="_blank">
					<img src="<?php bloginfo('template_url'); ?>/img/icon/facebook.png">
					<span class="sns-btn">Facebook</span>
				</a>
			</div>
			<div class="col-6 text-center box-center">
				<a href="https://twitter.com/jafs008" target="_blank">
					<img src="<?php bloginfo('template_url'); ?>/img/icon/twitter.png">
					<span class="sns-btn">Twitter</span>
				</a>
			</div>
		</div>
	</div>
</div>
<!-- Facebook用のJavascript -->
<div id="fb-root"></div>
<script>
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s);
		js.id = id;
		js.src = 'https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v3.2';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<!-- //Facebook用のJavascript -->


<?php get_footer(); ?>