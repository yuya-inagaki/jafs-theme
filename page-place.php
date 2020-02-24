<?php
/*
Template Name: 教室一覧
*/
get_header(); ?>
<article>
	<div class="container">
		<?php
		if (have_posts()) :
			while (have_posts()) :
				the_post();
		?>
				<div id="post">
					<div class="post-header">
						<?php if (function_exists('rdfa_breadcrumb')) {
							rdfa_breadcrumb();
						} ?>
						<h1><?php the_title(); ?></h1>
					</div>





					<div class="post-content placement_main">

						<?php the_content(); ?>
						<?php edit_post_link('このページを編集', '<p>', '</p>'); ?>

						<?php
						// 子ページ出力のための関数
						$children = get_children(array(
							"post_parent"   => get_the_id(), // このページを親ページとする
							"post_type"     => "page",
							"post_status"   => "publish",
							"order"         => "ASC"
						));
						echo ('<h2>北海道地方</h2><div class="row">');
						foreach ($children as $child) {
							if (get_post_meta($child->ID, "class_region", true) == '北海道地方') :
								$url = get_permalink($child->ID);
								$address = get_post_meta($child->ID, "class_address", true);
								echo ('<div class="col-sm-4"><a href="' . $url . '"><div class="place_detail"><div class="place_detail_title hokkaidou">' . $child->post_title . '</div><p>' . $address . '</p></div></a></div>');
							endif;
						}
						echo ('</div>');
						echo ('<hr><h2>東北地方</h2><div class="row">');
						foreach ($children as $child) {
							if (get_post_meta($child->ID, "class_region", true) == '東北地方') :
								$url = get_permalink($child->ID);
								$address = get_post_meta($child->ID, "class_address", true);
								echo ('<div class="col-sm-4"><a href="' . $url . '"><div class="place_detail"><div class="place_detail_title touhoku">' . $child->post_title . '</div><p>' . $address . '</p></div></a></div>');
							endif;
						}
						echo ('</div><hr><h2>関東地方</h2><div class="row">');
						foreach ($children as $child) {
							if (get_post_meta($child->ID, "class_region", true) == '関東地方') :
								$url = get_permalink($child->ID);
								$address = get_post_meta($child->ID, "class_address", true);
								echo ('<div class="col-sm-4"><a href="' . $url . '"><div class="place_detail"><div class="place_detail_title kantou">' . $child->post_title . '</div><p>' . $address . '</p></div></a></div>');
							endif;
						}
						echo ('</div><hr><h2>中部地方</h2><div class="row">');
						foreach ($children as $child) {
							if (get_post_meta($child->ID, "class_region", true) == '中部地方') :
								$url = get_permalink($child->ID);
								$address = get_post_meta($child->ID, "class_address", true);
								echo ('<div class="col-sm-4"><a href="' . $url . '"><div class="place_detail"><div class="place_detail_title chuubu">' . $child->post_title . '</div><p>' . $address . '</p></div></a></div>');
							endif;
						}
						echo ('</div><hr><h2>近畿地方</h2><div class="row">');
						foreach ($children as $child) {
							if (get_post_meta($child->ID, "class_region", true) == '近畿地方') :
								$url = get_permalink($child->ID);
								$address = get_post_meta($child->ID, "class_address", true);
								echo ('<div class="col-sm-4"><a href="' . $url . '"><div class="place_detail"><div class="place_detail_title kinki">' . $child->post_title . '</div><p>' . $address . '</p></div></a></div>');
							endif;
						}
						//echo ('</div></div><div id="sec5-6" class="chihou_box"></div>');
						//echo ('<div id="sec6" class="chihou_box"><h2>中国地方</h2><div class="row">');
						//foreach($children as $child){
						//    if( get_post_meta($child->ID, "class_region", true)=='中国地方' ):
						//        $url=get_permalink( $child->ID );
						//        echo ('<div class="col-sm-6"><a href="'.$url.'"><div class="place_detail">'.$child->post_title.'</div></a></div>');
						//    endif;
						//}
						//echo ('</div></div><div id="sec6-7" class="chihou_box"></div>');
						//echo ('<div id="sec7" class="chihou_box"><h2>四国地方</h2><div class="row">');
						//foreach($children as $child){
						//    if( get_post_meta($child->ID, "class_region", true)=='四国地方' ):
						//        $url=get_permalink( $child->ID );
						//        echo ('<div class="col-sm-6"><a href="'.$url.'"><div class="place_detail">'.$child->post_title.'</div></a></div>');
						//    endif;
						//}
						echo ('</div><hr><h2>九州地方</h2><div class="row">');
						foreach ($children as $child) {
							if (get_post_meta($child->ID, "class_region", true) == '九州地方') :
								$url = get_permalink($child->ID);
								$address = get_post_meta($child->ID, "class_address", true);
								echo ('<div class="col-sm-4"><a href="' . $url . '"><div class="place_detail"><div class="place_detail_title kyushu">' . $child->post_title . '</div><p>' . $address . '</p></div></a></div>');
							endif;
						}
						echo ('</div><hr>');
						?>

						<a href="https://goo.gl/forms/zUYm9IcidqmUrGBJ3" target="_blank" class="btn_apply btn_apply_hoshu">欠席・振替・補習のお申込みはこちら</a>

					</div>
				</div><!-- /post -->
			<?php
			endwhile;
		else : ?>
			<p>no page</p>
		<?php
		endif; ?>
	</div>
</article>
<?php get_footer(); ?>