<!------------------------------------

    トップページスライダーテンプレート

------------------------------------->
<div class="top-slider">
    <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1 ; //ページの判定
        $args =	array(
            'posts_per_page'   => 6, //表示件数
            'post_type' => 'pickup',   //投稿タイプの指定
            'orderby'          => 'modified', //ソートの基準
            'order'            => 'DESC', //DESC降順　ASC昇順
            'post_status'      => 'publish', //公開状態
            'caller_get_posts' => 1, //取得した記事の何番目から表示するか
            'has_password' => false, //パスワード付きの記事は表示させない
        );
        $wp_query = new WP_Query($args);
        while ($wp_query->have_posts()) : $wp_query->the_post();
        $thumbnail_id = get_post_thumbnail_id();
        $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'large' );
    ?>
        <a href="<?php echo get_post_meta($post->ID, "pickup_link", true); ?>" target="_blank"><div class="contents slick-slide"><div class="contents_img" style="background:url('<?php echo $eye_img[0]; ?>'); background-position:center center; background-size:cover;"></div><div class="text"><div class="text_large"><span><?php echo get_post_meta($post->ID, "pickup_title", true); ?></span></div><div class="text_small"><span><?php echo get_post_meta($post->ID, "pickup_description", true); ?></span></div></div></div></a>
    <?php endwhile; ?>
</div>